(function($) { 
    "use strict";
    
    $(document).ready(function() {
        let currentPage = insightInfo.current_page || 1;
        let currentCategory = '';
        let currentPostType = insightInfo.default_postype || 'post';
        let currentTaxonomy = insightInfo.taxonomy || 'category';
        let totalPosts = 0;

        function getQueryParams() {
            let params = new URLSearchParams(window.location.search);
            return {
                page: params.get('page') || 1,
                category: params.get('category') || '',
                postype: params.get('postype') || currentPostType
            };
        }

        function updateUrl(page, categoryId = '', postType = '') {
            let state = { 
                page: page, 
                category: categoryId, 
                postype: postType
            };
            let title = '';
            let url = `${location.pathname}?page=${page}`;
            if (categoryId) url += `&category=${categoryId}`;
            if (postType) url += `&postype=${postType}`;
            history.pushState(state, title, url);
        }

        function fetchPosts(page = currentPage, categoryId = '', postType = '') {
            updateUrl(page, categoryId, postType);
            
            let queryArgs = `?page=${page}&per_page=${insightInfo.posts_per_page}`;
            if (categoryId) queryArgs += `&category=${categoryId}`;
            if (postType) queryArgs += `&postype=${postType}`;

            $.ajax({
                url: `${insightInfo.rest_url}laz-news-block/v1/get-news/${queryArgs}`,
                method: 'GET',
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('X-WP-Nonce', insightInfo.nonce);
                },
                success: function(response, status, xhr) {
                    const totalCount = parseInt(xhr.getResponseHeader('X-WP-Total'));
                    totalPosts = totalCount;

                    // Clear items only on first page
                    if (page === 1) {
                        $('.news-items').html('');
                    }

                    // Append posts
                    response.forEach(post => {
                        // Format categories excluding "All"
                        let categoriesHtml = '';
                        if (post.categories && post.categories.length > 0) {
                            const filteredCategories = post.categories.filter(cat => cat.toLowerCase() !== 'all');
                            if (filteredCategories.length > 0) {
                                categoriesHtml = `
                                    <div class="post-categories mb-[10px] flex flex-wrap gap-2">
                                        <span class="eyebrow text-secondary eyebrow">${filteredCategories.join(', ')}</span>
                                    </div>
                                `;
                            }
                        }
                        
                        const postHtml = `
                            <div class="news-card">
                                <div class="event-image relative overflow-visible">
                                    <a class="block w-full h-full relative z-[2]" href="${post.permalink}" tabindex="0" aria-label="${post.title}" title="${post.title}">
                                        <img src="${post.featured_image_src}" class="w-full h-full transition-all duration-500" alt="${post.title}">
                                    </a>
                                </div>
                                <div class="event-content group">
                                    ${categoriesHtml}
                                    <h4 class="event-title text-primary">
                                        <a class="group-hover:text-secondary" href="${post.permalink}" tabindex="0" aria-label="${post.title}" title="${post.title}">
                                            ${post.title}
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        `;
                        $('.news-items').append(postHtml);
                    });

                    // Show/hide load more button
                    if ($('.news-items .news-card').length >= totalPosts) {
                        $('#load-more').hide();                  
                    } else {
                        $('#load-more').show();                  
                    }

                    // Show no results message
                    if (response.length === 0 && page === 1) {
                        const noPostsHtml = '<div class="w-full text-center text-primary mt-6"><p class="text-[20px] font-bold">It looks like nothing was found</p></div>';
                        $('.news-items').append(noPostsHtml);
                        $('#load-more').hide();
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching posts:', error);
                }
            });
        }

        // Mobile Dropdown Functionality
        $('.news-dropdown-button').on('click', function(e) {
            e.preventDefault();
            const $menu = $('.news-dropdown-menu');
            const $icon = $('.news-dropdown-icon');
            
            $menu.toggleClass('hidden');
            $icon.toggleClass('rotate-180');
        });

        // Close dropdown when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.news-dropdown-wrapper').length) {
                $('.news-dropdown-menu').addClass('hidden');
                $('.news-dropdown-icon').removeClass('rotate-180');
            }
        });

        // Handle category filter clicks (both desktop and mobile)
        $('.select-category-blog .blog-link').on('click', function(e) {
            e.preventDefault();
            
            const categoryId = $(this).data('category-id') || '';
            const postType = $(this).data('postype');
            const categoryName = $(this).text().trim();
            
            // Update current values
            currentCategory = categoryId;
            currentPostType = postType;
            currentPage = 1;
            
            // Fetch posts
            fetchPosts(currentPage, currentCategory, currentPostType);
            
            // Update active states for desktop tabs
            $('.select-category-blog .blog-link').removeClass('active text-primary').addClass('text-accent-dark');
            $(this).removeClass('text-accent-dark').addClass('active text-primary');
            
            // Update mobile dropdown
            $('.news-dropdown-selected').text(categoryName);
            $('.news-dropdown-menu').addClass('hidden');
            $('.news-dropdown-icon').removeClass('rotate-180');
        });

        // Handle browser back/forward
        window.onpopstate = function(event) {
            if (event.state) {
                currentPage = event.state.page;
                currentCategory = event.state.category;
                currentPostType = event.state.postype;
            } else {
                let initialParams = getQueryParams();
                currentPage = parseInt(initialParams.page);
                currentCategory = initialParams.category;
                currentPostType = initialParams.postype;
            }
            fetchPosts(currentPage, currentCategory, currentPostType);
        };

        // Load More button
        $('#load-more').on('click', function(e) {
            e.preventDefault();
            currentPage++;
            fetchPosts(currentPage, currentCategory, currentPostType);
        });

        // Initialize - load posts based on URL params
        function loadInitialPosts() {
            let params = getQueryParams();
            currentPage = parseInt(params.page);
            currentCategory = params.category;
            currentPostType = params.postype;
            
            // Update active tab if category is in URL
            if (currentCategory) {
                $('.select-category-blog .blog-link').removeClass('active text-primary').addClass('text-accent-dark');
                $(`.select-category-blog .blog-link[data-category-id="${currentCategory}"]`).removeClass('text-accent-dark').addClass('active text-primary');
                
                // Update dropdown text
                const categoryName = $(`.select-category-blog .blog-link[data-category-id="${currentCategory}"]`).text().trim();
                if (categoryName) {
                    $('.news-dropdown-selected').text(categoryName);
                }
            }
            
            // Uncomment this if you want to load posts via AJAX on page load
            // fetchPosts(currentPage, currentCategory, currentPostType);
        }

        loadInitialPosts();
    });
    
})(jQuery);