jQuery(document).ready(function ($) {
    let currentPage = blogInfo.current_page || 1;
    let currentSearch = '';  
    let currentCategory = ''; 
    let totalPosts = 0; 

    function getQueryParams() {
        let params = new URLSearchParams(window.location.search);
        return {
            page: params.get('page') || 1,
            category: params.get('category') || '',
            search: params.get('search') || ''
        };
    }

    function updateUrl(page, categoryId = '', searchQuery = '') {
        let state = { page: page, category: categoryId, search: searchQuery };
        let title = '';
        let url = `${location.pathname}?page=${page}`;
        if (categoryId) url += `&category=${categoryId}`;
        if (searchQuery) url += `&search=${encodeURIComponent(searchQuery)}`;
        history.pushState(state, title, url);
    }

    function fetchPosts(page = currentPage, categoryId = '', searchQuery = '') {
        updateUrl(page, categoryId, searchQuery);
        let queryArgs = `?page=${page}&per_page=${blogInfo.posts_per_page}`;
        if (categoryId) queryArgs += `&category=${categoryId}`;
        if (searchQuery) queryArgs += `&search=${encodeURIComponent(searchQuery)}`;

        $.ajax({
            url: `${blogInfo.rest_url}laz-blog-block/v1/get-posts/${queryArgs}`,
            method: 'GET',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-WP-Nonce', blogInfo.nonce);
            },
            success: function (response, status, xhr) {
                const totalCount = parseInt(xhr.getResponseHeader('X-WP-Total'));
                totalPosts = totalCount;

                if (page === 1) $('.blog-items').html('');

                response.forEach(post => {
                    const postHtml = `
                    <div class="${blogInfo.col_class} m-b2 blog-item wow fadeIn" data-wow-duration="0.8s" data-wow-delay="0.5s">                      
                        <div class="box-card h-100">
                            <div class="card-media">      
                                <a href="${post.permalink}" tabindex="0" aria-label="${post.title}" title="${post.title}" class="w-100 h-100 cl-blue cl-black-h">   
                                    <img width="456" height="300" src="${post.featured_image_src}" class="img-fluid wp-post-image" alt="${post.title}"> 
                                </a> 
                            </div>
                            <div class="card-footer bg-navy">                            
                                <h3 class="cl-white text-uppercase m-t0 m-b0 text-center"><a class="cl-white cl-white-h" href="${post.permalink}" aria-label="${post.title}" title="${post.title}" tabindex="0">${post.title}</a></h3>
                            </div> 
                        </div> 
                    </div>`;
                    $('.blog-items').append(postHtml);
                });

                if ($('.blog-items .blog-item').length >= totalPosts) {
                    $('#load-more').hide();
                } else {
                    $('#load-more').show();
                }

                if (response.length === 0 && page === 1) {
                    const noPostsHtml = '<div class="col-xs-12"><p>It looks like nothing was found</p></div>';
                    $('.blog-items').append(noPostsHtml);
                }
            },
        });
    }

    window.onpopstate = function (event) {
        if (event.state) {
            currentPage = event.state.page;
            currentCategory = event.state.category;
            currentSearch = event.state.search;
            fetchPosts(event.state.page, event.state.category, event.state.search);
        } else {
            let initialParams = getQueryParams();
            currentPage = parseInt(initialParams.page);
            currentCategory = initialParams.category;
            currentSearch = initialParams.search;
            fetchPosts(currentPage, currentCategory, currentSearch);
        }
    };

    $('#load-more').on('click', function () {
        fetchPosts(++currentPage, currentCategory, currentSearch);
    });

    $('.category-filter').on('click', function () {
        currentCategory = $(this).data('category-id');
        currentPage = 1;
        currentSearch = ''; 
        fetchPosts(currentPage, currentCategory, currentSearch);
        $(".category-filter").removeClass("active-cat");
        $(this).addClass("active-cat");
    });

    $('#search-posts').on('submit', function (e) {
        e.preventDefault();
        currentSearch = $('#search-input').val();
        currentPage = 1;
        currentCategory = ''; 
        fetchPosts(currentPage, currentCategory, currentSearch);
    });

    function loadInitialPosts() {
        let params = getQueryParams();
        currentPage = parseInt(params.page);
        currentCategory = params.category;
        currentSearch = params.search;
        fetchPosts(currentPage, currentCategory, currentSearch);
    }

    loadInitialPosts();
});