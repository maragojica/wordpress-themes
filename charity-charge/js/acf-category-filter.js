document.addEventListener('DOMContentLoaded', function() {
    
    function initializeCategoryFilter() {
        const categoryField = document.querySelector('[data-name="resource_category"]');
        const resourceField = document.querySelector('[data-name="featured_resource"]');
        
        if (!categoryField || !resourceField) {
            return;
        }
        
        const categorySelect = categoryField.querySelector('select');
        const resourceSelect = resourceField.querySelector('select');
        
        if (!categorySelect || !resourceSelect) {
            return;
        }
        
        // Function to update featured resource dropdown
        function updateFeaturedResources() {
            const categoryId = categorySelect.value;
            const currentResourceId = resourceSelect.value;
            
            if (!categoryId) {
                resourceSelect.innerHTML = '<option value="">First select a category...</option>';
                resourceSelect.disabled = true;
                return;
            }
            
            // Show loading state
            resourceSelect.innerHTML = '<option value="">Loading resources...</option>';
            resourceSelect.disabled = true;
            
            // Prepare form data
            const formData = new FormData();
            formData.append('action', 'filter_resources_by_category');
            formData.append('category_id', categoryId);
            formData.append('current_resource_id', currentResourceId);
            formData.append('nonce', ajax_object.nonce);
            
            // Fetch API call to get filtered resources
            fetch(ajax_object.ajax_url, {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then(data => {
                resourceSelect.innerHTML = data;
                resourceSelect.disabled = false;
            })
            .catch(error => {
                resourceSelect.innerHTML = '<option value="">Error loading resources. Please refresh and try again.</option>';
                resourceSelect.disabled = false;
                console.error('AJAX request failed for filtering resources:', error);
            });
        }
        
        // Listen for category changes
        categorySelect.addEventListener('change', updateFeaturedResources);
        
        // Initialize on page load
        const initialCategoryId = categorySelect.value;
        if (initialCategoryId) {
            updateFeaturedResources();
        } else {
            resourceSelect.innerHTML = '<option value="">First select a category...</option>';
            resourceSelect.disabled = true;
        }
    }
    
    // Initialize when ACF is ready (for ACF 5+)
    if (typeof acf !== 'undefined') {
        acf.addAction('ready', initializeCategoryFilter);
        acf.addAction('append', initializeCategoryFilter);
    }
    
    // Additional fallbacks for different scenarios
    setTimeout(initializeCategoryFilter, 500);
    setTimeout(initializeCategoryFilter, 1000);
    
    // MutationObserver to handle dynamically loaded ACF fields
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.type === 'childList') {
                mutation.addedNodes.forEach(function(node) {
                    if (node.nodeType === Node.ELEMENT_NODE) {
                        const categoryField = node.querySelector ? node.querySelector('[data-name="resource_category"]') : null;
                        const resourceField = node.querySelector ? node.querySelector('[data-name="featured_resource"]') : null;
                        
                        if (categoryField || resourceField) {
                            setTimeout(initializeCategoryFilter, 100);
                        }
                    }
                });
            }
        });
    });
    
    // Start observing
    observer.observe(document.body, {
        childList: true,
        subtree: true
    });
});