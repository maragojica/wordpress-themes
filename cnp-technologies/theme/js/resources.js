document.addEventListener("DOMContentLoaded", function () {
    let currentPostType = "all";  // Start with 'all' so that all posts are displayed
    let currentTaxonomy = "";
    let currentTerm = "";
    let currentPage = 1;
    const postsPerPage = 3;  // Set to display 3 posts at a time

    const resourceBtn = document.getElementById("resource-btn");
    const solutionBtn = document.getElementById("solution-btn");
    const resourceOptions = document.getElementById("resource-options");
    const solutionOptions = document.getElementById("solution-options");
    const postsContainer = document.getElementById("posts-container");
    const loadMoreBtn = document.getElementById("load-more");

    // Fetch initial posts based on the selected options
    function fetchPosts(reset = true) {
        if (reset) {
            postsContainer.innerHTML = "";
            currentPage = 1;
        }

        let url = `${custom_filter_data.rest_url}?paged=${currentPage}&posts_per_page=${postsPerPage}`;
        if (currentPostType && currentPostType !== "all") url += `&post_type=${currentPostType}`;
        if (currentTaxonomy && currentTerm) url += `&taxonomy=${currentTaxonomy}&term=${currentTerm}`;

        fetch(url)
            .then(res => res.json())
            .then(posts => {
                if (reset) postsContainer.innerHTML = "";
                if (posts && posts.length > 0) {
                    posts.forEach(post => {
                        postsContainer.innerHTML += `  
                         <div class="post-item w-full md:w-1/2 lg:w-1/3 px-3 mt-4 bottom-shape-card-r">
                           <div class="w-full h-full flex flex-col group relative">   
                               <div class="post-category absolute z-[2] bg-secondary pl-[28px] pr-[15px] py-[2px] text-white left-0 top-[30px]">
                                    <p class="mb-0 text-white font-medium">${post.category}</p>
                                </div> 
                                <div class="overflow-hidden post-image flex w-full relative z-[1] h-[260px] 2xl:h-[275px]">
                                    <a href="${post.link}" aria-label="${post.title}" title="${post.title}" tabindex="0" class="w-full h-[260px] 2xl:h-[275px] block"><img src="${post.image}" alt="${post.title}"></a>
                                </div>                                                   
                            <div class="post-content flex-grow bg-black p-[35px] flex flex-col gap-y-[15px]">
                                <div class="post-date text-white">${post.date}</div>
                                <h4 class="post-title text-white hover:text-secondary"><a href="${post.link}" aria-label="${post.title}" title="${post.title}" tabindex="0">${post.title}</a></h4>
                            </div>  
                         </div>   
                    </div>`;
                    });

                    // Show Load More if there are more posts to load
                    if (posts.length === postsPerPage) {
                        loadMoreBtn.style.display = "block";
                    } else {
                        loadMoreBtn.style.display = "none";
                    }
                } else {
                    // If no posts are found
                    postsContainer.innerHTML = "<p>No posts found.</p>";
                    loadMoreBtn.style.display = "none";  // Hide Load More if no posts are found
                }
            })
            .catch(() => {
                postsContainer.innerHTML = "<p>Error loading posts.</p>";
                loadMoreBtn.style.display = "none";  // Hide Load More on error
            });
    }

    // Fetch taxonomies based on the selected post type
    function fetchTaxonomies(postType) {
        currentTaxonomy = custom_filter_data.taxonomy_map[postType] || "";
        solutionOptions.innerHTML = "";

        console.log("Fetching taxonomies for post type:", postType);  // Debugging: Check selected post type

        if (postType === "all") {
            solutionBtn.disabled = true;
            
            // Safely update the dropdown text for "By Solution"
            const dropdownText = solutionBtn.querySelector(".dropdown-text");
            if (dropdownText) {
                dropdownText.textContent = "By Solution";
            }
            
            return fetchPosts(true); // Fetch all posts if "All" is selected
        }

        // Fetch categories for 'post' type
        if (postType === "post") {
            fetch(`/wp-json/wp/v2/categories`)
                .then(res => res.json())
                .then(data => {
                    console.log("Categories fetched:", data);  // Debugging: Check the categories data
                    populateSolutionOptions(data);
                });
        } else if (currentTaxonomy) {
            // Fetch custom taxonomies for resource or case-study types
            fetch(`/wp-json/wp/v2/${currentTaxonomy}`)
                .then(res => res.json())
                .then(data => {
                    console.log(`Custom taxonomy ${currentTaxonomy} fetched:`, data);  // Debugging: Check custom taxonomy data
                    populateSolutionOptions(data);
                });
        } else {
            solutionBtn.disabled = true;
        }
    }

    // Populate options for the "By Solution" dropdown
    function populateSolutionOptions(data) {
        data.forEach(term => {
            let div = document.createElement("div");
            div.textContent = term.name;
            div.dataset.value = term.slug;
            div.addEventListener("click", function () {
                if (solutionBtn.querySelector(".dropdown-text")) {
                    solutionBtn.querySelector(".dropdown-text").textContent = term.name;  // Update only .dropdown-text
                }
                currentTerm = term.slug;
                fetchPosts(); // Fetch posts after selection
                closeDropdown(solutionOptions, solutionBtn.querySelector(".arrow"));  // Close dropdown and rotate arrow
            });
            solutionOptions.appendChild(div);
        });
        solutionBtn.disabled = false;
    }

    // Handle the selection from the By Resource dropdown
    if (resourceOptions) {
        resourceOptions.querySelectorAll("div").forEach(option => {
            option.addEventListener("click", function () {
                if (resourceBtn.querySelector(".dropdown-text")) {
                    resourceBtn.querySelector(".dropdown-text").textContent = this.textContent;  // Update only .dropdown-text
                }
                currentPostType = this.dataset.value;
                currentTerm = "";
                if (solutionBtn.querySelector(".dropdown-text")) {
                    solutionBtn.querySelector(".dropdown-text").textContent = "By Solution";  // Reset the text for By Solution dropdown
                }
                fetchTaxonomies(currentPostType);
                fetchPosts(); // Fetch posts based on the selected post type

                // Ensure resourceOptions and resourceBtn exist before calling closeDropdown
                if (resourceOptions && resourceBtn) {
                    closeDropdown(resourceOptions, resourceBtn.querySelector(".arrow"));  // Close dropdown and rotate arrow
                }
            });
        });
    }

    // Handle the Load More functionality
    loadMoreBtn.addEventListener("click", function (event) {
        currentPage++;
        event.preventDefault();
        fetchPosts(false);  // Load next set of posts
    });

    // Initial fetch when page loads
    fetchPosts();

   // Dropdown logic for By Resource and By Solution dropdowns
const dropdowns = document.querySelectorAll('.dropdown');

dropdowns.forEach(dropdown => {
    const button = dropdown.querySelector('.dropdown-btn');
    const buttonText = dropdown.querySelector('.dropdown-text');
    const options = dropdown.querySelector('.dropdown-content');
    const arrow = dropdown.querySelector('.arrow');

    // When the dropdown button is clicked
    button.addEventListener("click", function (e) {
        e.stopPropagation(); // Prevent document click from closing dropdown
        toggleDropdown(options, arrow, dropdown);
    });

    // Close dropdowns if click outside of them
    window.addEventListener("click", function (e) {
        if (!e.target.closest('.dropdown')) {
            closeDropdown(options, arrow, dropdown);
        }
    });

    // When an option is clicked
    options.querySelectorAll("div").forEach(option => {
        option.addEventListener("click", function () {
            buttonText.textContent = this.textContent; // Change button text
            closeDropdown(options, arrow, dropdown); // Close the dropdown
        });
    });
});

function toggleDropdown(dropdown, arrow, parentDropdown) {
    const isVisible = dropdown.classList.contains("show");

    // Close all dropdowns before opening a new one
    document.querySelectorAll(".dropdown-content").forEach((d) => d.classList.remove("show"));
    document.querySelectorAll(".arrow").forEach((a) => a.style.transform = "rotate(0deg)");

    // Close the "open" class for all dropdowns before toggling the specific one
    document.querySelectorAll(".dropdown").forEach((d) => d.classList.remove("open"));

    if (!isVisible) {
        dropdown.classList.add("show");
        parentDropdown.classList.add("open"); // Add the "open" class to the dropdown
        if (arrow) {
            arrow.style.transform = "rotate(180deg)"; // Rotate the arrow
        }
    } else {
        closeDropdown(dropdown, arrow, parentDropdown);
    }
}

function closeDropdown(dropdown, arrow, parentDropdown) {
    if (dropdown) {
        dropdown.classList.remove("show");
    }
    if (arrow) {
        arrow.style.transform = "rotate(0deg)"; // Reset the arrow to its original state
    }
    if (parentDropdown) {
        parentDropdown.classList.remove("open"); // Remove the "open" class
    }
}

});
