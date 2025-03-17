(function($) { "use strict";
    $(document).ready(function ($) {
    let currentPage = blogInfo.current_page || 1;
    let currentSearch = '';
    let currentCategory = '';
    let currentPostType = '';
    let totalPosts = 0;

    function getQueryParams() {
        let params = new URLSearchParams(window.location.search);
        return {
            page: params.get('page') || 1,
            category: params.get('category') || '',
            postype: params.get('postype') || '',
            search: params.get('search') || ''
        };
    }

    function updateUrl(page, categoryId = '', postType = '', searchQuery = '') {
        let state = { page: page, category: categoryId, postype: postType, search: searchQuery };
        let title = '';
        let url = `${location.pathname}?page=${page}`;
        if (categoryId) url += `&category=${categoryId}`;
        if (postType) url += `&postype=${postType}`;
        if (searchQuery) url += `&search=${encodeURIComponent(searchQuery)}`;
        history.pushState(state, title, url);
    }

    function fetchPosts(page = currentPage, categoryId = '', postType = '', searchQuery = '') {
        updateUrl(page, categoryId, postType, searchQuery);
        let queryArgs = `?page=${page}&per_page=${blogInfo.posts_per_page}`;
        if (categoryId) queryArgs += `&category=${categoryId}`;
        if (postType) queryArgs += `&postype=${postType}`;
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
                        <div class="${blogInfo.col_class} px-3 mb-4 blog-item content-post">                      
                            <div class="flex flex-col h-full justify-between w-full p-[20px] lg:p-[40px] rounded-[6px] shadow-[0px_4px_14px_2px_rgba(12,35,64,0.09)]" >
                                <div class="flex-wrap mb-[20px]">
                                    <div class="text-primary subtext mb-[5px]">${new Date(post.date).toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' })}</div>
                                    <h3 class="text-secondary mb-[20px]">${post.title}</h3>
                                    <div class="text-secondary style-disc">
                                        ${post.excerpt}
                                    </div>
                                </div>
                                <a href="${post.permalink}" tabindex="0" aria-label="${post.title}" title="${post.title}" class="max-w-max sm btn btn_primary_navy">
                                Read more
                                
                              </a>   
                               
                            </div> 
                        </div>`;
                    $('.blog-items').append(postHtml);
                });

                if ($('.blog-items .blog-item').length >= totalPosts) {
                    $('#load-more').hide();
                    $('#load-more-line').hide();
                } else {
                    $('#load-more').show();
                    $('#load-more-line').show();
                }

                if (response.length === 0 && page === 1) {
                    const noPostsHtml = '<div class="w-full text-center text-secondary"><p>It looks like nothing was found</p></div>';
                    $('.blog-items').append(noPostsHtml);
                }
            },
        });
    }

    window.onpopstate = function (event) {
        if (event.state) {
            currentPage = event.state.page;
            currentCategory = event.state.category;
            currentPostType = event.state.postype;
            currentSearch = event.state.search;
            fetchPosts(currentPage, currentCategory, currentPostType, currentSearch);
        } else {
            let initialParams = getQueryParams();
            currentPage = parseInt(initialParams.page);
            currentCategory = initialParams.category;
            currentPostType = initialParams.postype;
            currentSearch = initialParams.search;
            fetchPosts(currentPage, currentCategory, currentPostType, currentSearch);
        }
    };

    $('#load-more').on('click', function (e) {
        e.preventDefault();
        fetchPosts(++currentPage, currentCategory, currentPostType, currentSearch);
    });

    $('.select-category-blog .blog-link').on('click', function (e) {
        e.preventDefault();
        currentCategory = $(this).data('category-id');
        currentPostType = $(this).data('postype');
        currentPage = 1;
        currentSearch = ''; 
        fetchPosts(currentPage, currentCategory, currentPostType, currentSearch);
        $(".select-category-blog .blog-link").removeClass("active");
        $(this).addClass("active");
    });

    $('#search-posts').on('submit', function (e) {
        e.preventDefault();
        currentSearch = $('#search-input').val();
        currentPage = 1;
        currentCategory = ''; 
        fetchPosts(currentPage, currentCategory, currentPostType, currentSearch);
    });

    function loadInitialPosts() {
        let params = getQueryParams();
        currentPage = parseInt(params.page);
        currentCategory = params.category;
        currentPostType = params.postype;
        currentSearch = params.search;
        fetchPosts(currentPage, currentCategory, currentPostType, currentSearch);
    }

    //loadInitialPosts();
});
    // eslint-disable-next-line no-undef
})(jQuery); 