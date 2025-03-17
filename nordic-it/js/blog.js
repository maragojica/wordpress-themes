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
                            <div class="flex flex-col h-full justify-between p-[28px] rounded-[12px] border-4 border-solid" style="border-color: ${blogInfo.border_color}">
                                <div class="flex-wrap">
                                    <h3 class="text-primary mb-[10px]">${new Date(post.date).toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' })}</h3>
                                    <div class="text-heading font-secondary-font uppercase mb-3 ${blogInfo.headline_color}">${post.title}</div>
                                    <div class="font-text-font bodysmall ${blogInfo.description_color}">
                                        ${post.excerpt}
                                    </div>
                                </div>
                                <a href="${post.permalink}" tabindex="0" aria-label="${post.title}" title="${post.title}" class="mt-[32px] group ${blogInfo.button_style}">
                                Read More
                                <div class="relative">
                                    <svg class="absolute top-1/2 left-0 transform -translate-x-0 -translate-y-1/2 transition-all duration-300 opacity-[1] origin-left scale-100 group-hover:opacity-0 group-hover:scale-0" xmlns="http://www.w3.org/2000/svg" width="27" height="16" viewBox="0 0 27 16" fill="none">
                                        <path d="M0 8H24" stroke="${blogInfo.arrow_color}" stroke-width="3"/>
                                        <path d="M18 2L24 8L18 14" stroke="${blogInfo.arrow_color}" stroke-width="3"/>
                                    </svg>
                                    <svg class="absolute top-1/2 left-0 transform -translate-x-0 -translate-y-1/2 transition-all duration-300 opacity-0 origin-left scale-0 group-hover:opacity-[1] group-hover:scale-100" xmlns="http://www.w3.org/2000/svg" width="39" height="16" viewBox="0 0 39 16" fill="none">
                                    <path d="M0 8H36" stroke="${blogInfo.arrow_color}" stroke-width="3"/>
                                    <path d="M30 2L36 8L30 14" stroke="${blogInfo.arrow_color}" stroke-width="3"/>
                                    </svg>
                                </div>
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
                    const noPostsHtml = '<div class="w-full text-center"><p>It looks like nothing was found</p></div>';
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