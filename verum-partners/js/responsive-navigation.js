jQuery(document).ready(function($) {
    $('#menu-button').click(function() {
      responsiveMenu(!$(this).hasClass('open'));
    });
    $('.menu-close').click(function() {
      responsiveMenu(false);
    });
    $('#responsive-menu a').click(function(e) {
      if (!$(this).parent().hasClass('menu-item-has-children')) {
        responsiveMenu(false);
      } else {
        e.preventDefault();
        subMenu($(this));
      }
    });
  
    function responsiveMenu(bool) {    
      if (bool === true) {
        $('#responsive-menu').addClass('open');
        $('#menu-button').addClass('open');
        $('body').addClass('responsive-menu-open');
      } else {
        $('#responsive-menu').removeClass('open');
        $('#menu-button').removeClass('open');
        $('body').removeClass('responsive-menu-open');
      }
    }
  
    function subMenu(object) {
      const next = object.next();
      const parent = object.parent();
      if (next.hasClass('active')) {
        next.slideUp().removeClass('active');
        parent.removeClass('open');
        return;
      }
      parent.siblings().each(function() {
        if ($(this).hasClass('open')) {
          $(this).removeClass('open');
          $(this).find('.sub-menu.active').slideUp().removeClass('active');
        }
      });
      next.slideDown().addClass('active');
      parent.addClass('open');
    }
  });
  
