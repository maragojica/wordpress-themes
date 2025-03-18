// This section makes the search work.

(function() {
  var searchTerm, panelContainerId;
  jQuery('#accordion_search_bar').on('change keyup', function() {
    searchTerm = jQuery(this).val();
    jQuery('#accordion > .panel').each(function() {
      panelContainerId = '#' + jQuery(this).attr('id');

      // Makes search to be case insesitive
      $.extend($.expr[':'], {
        'contains': function(elem, i, match, array) {
          return (elem.textContent || elem.innerText || '').toLowerCase()
            .indexOf((match[3] || "").toLowerCase()) >= 0;
        }
      });

      // END Makes search to be case insesitive

      // Show and Hide Triggers
      jQuery(panelContainerId + ':not(:contains(' + searchTerm + '))').hide(); //Hide the rows that done contain the search query.
      jQuery(panelContainerId + ':contains(' + searchTerm + ')').show(); //Show the rows that do!

    });
  });
}());
// End Show and Hide Triggers

// END This section makes the search work.

jQuery(document).ready(function(){
    jQuery('#bar-menu').click(function (){
        jQuery('.menu').toggle();
    });
});


/*
jQuery(window).load(function(){
    var w;
    w = jQuery(window).width();
    if(w <= 1200){
        jQuery("#menu-main-menu .menu-item-has-children").prepend("<span class='icon'></span>");
        jQuery("#menu-main-menu .menu-item-has-children .icon").click(function(){
            jQuery(this).closest( ".menu-item" ).find('.sub-menu').first().slideToggle();
            jQuery(this).toggleClass('open');
        });
    }

    if(w <= 991){
        jQuery("#sidebar-image-questions").appendTo("#wrap-responsive-sidebar-image-questions");
    }
});

jQuery(window).load(function(){
    var w;
    w = jQuery(window).width();
    if(w <= 1200){
        jQuery(".menu-top-menu-container a").click(function() {
            var link = jQuery(this);
            var closest_ul = link.closest("ul");
            var parallel_active_links = closest_ul.find(".active")
            var closest_li = link.closest("li");
            var link_status = closest_li.hasClass("active");
            var count = 0;

            closest_ul.find("ul").slideUp(function() {
                if (++count == closest_ul.find("ul").length)
                    parallel_active_links.removeClass("active");
            });

            if (!link_status) {
                closest_li.children("ul").slideDown();
                closest_li.addClass("active");
            }
        });
    }
});*/


jQuery(document).ready(function() {

    //jQuery(".breadcrumb").prepend('<span id="bread-init" class="post post-page"><a href="/">Home</a> <span class="breacrumb-separate">/</span></span>');
    //alert('3');
    //jQuery("body.parent-pageid-136 .breadcrumb #bread-init, body.parent-pageid-371 .breadcrumb #bread-init").remove();

    jQuery(".sidebar-categories .page_item_has_children").prepend("<span class='icon'></span>");
    jQuery(".sidebar-categories .current_page_item > .icon, .sidebar-categories .current_page_parent > .icon, .sidebar-categories .current_page_ancestor > .icon").addClass("open");

    jQuery(".sidebar-categories .page_item_has_children .icon").click(function(){
        jQuery(this).closest( ".page_item" ).find('.children').first().slideToggle();
        jQuery(this).toggleClass('open');
    });
});

