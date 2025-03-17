(function($) { "use strict";
    $(document).ready(function ($) {
    let currentPage = productInfo.current_page || 1;
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
        let queryArgs = `?page=${page}&per_page=${productInfo.posts_per_page}`;
        if (categoryId) queryArgs += `&category=${categoryId}`;
        if (postType) queryArgs += `&postype=${postType}`;
        if (searchQuery) queryArgs += `&search=${encodeURIComponent(searchQuery)}`;

        $.ajax({
            url: `${productInfo.rest_url}laz-product-block/v1/get-products/${queryArgs}`,
            method: 'GET',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-WP-Nonce', productInfo.nonce);
            },
            success: function (response, status, xhr) {
                const totalCount = parseInt(xhr.getResponseHeader('X-WP-Total'));
                totalPosts = totalCount;

                if (page === 1) $('.product-items').html('');

                response.forEach(post => {
                    const postHtml = `
                        <div class="sm:px-[10px] 2xl:px-[15px] mb-[20px] xl:mb-[88px] ${productInfo.col_class} product-item content-product">     
                          <div class="w-full h-full group cursor-pointer modal-trigger" data-modal-id="modal-product-${post.id}">
                            <div class="w-full h-[300px] 2xl:h-[412px] 4k:h-[550px] relative overflow-hidden group rounded-[0px_50px_0px_50px]" >     
                                <img width="1500" height="1001" src="${post.featured_image_src}" class="w-full h-full transition-all duration-500 object-cover object-center z-[1] rounded-[0px_50px_0px_50px] hover:scale-110 group-hover:scale-110" alt="${post.title}">                               
                                <div class="bg-white text-right rounded-tl-[50px] absolute bottom-0 right-0 z-[2] w-fit -mb-[1px] pl-[30px] 2xl:pl-[60px] pr-[20px] pt-[20px] 2xl:pt-[30px]">                                    
                                        <div class="text-secondary text-[26px] xl:text-[32px] font-[800] font-primary-font leading-[1]">${post.title}</div>                                    
                                        <div class="text-primary text-[20px] xl:text-[24px] font-bold font-primary-font leading-[1.2] mt-1">${post.brand}</div>                                        
                                </div>                                
                            </div>
                           </div>    
                        </div>`;
                    $('.product-items').append(postHtml);
                });

                if ($('.product-items .product-item').length >= totalPosts) {
                    $('#load-more').hide();                  
                } else {
                    $('#load-more').show();                  
                }

                if (response.length === 0 && page === 1) {
                    const noPostsHtml = '<div class="w-full text-center text-primary mt-6"><p class="text-[20px] font-bold">It looks like nothing was found</p></div>';
                    $('.product-items').append(noPostsHtml);
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