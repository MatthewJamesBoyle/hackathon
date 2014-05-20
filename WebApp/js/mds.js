define([
  'jquery',
  'masonry',
  'jqueryui-sortable-amd',
  'carousel',
  'ge-bootstrap',
  'jquery-backstretch',
  'responsive-emitter',
  'mds-navbar',
  'jumpnav',
  'backtotop',
  'scrolly',
  'modules',
  'responsive-tables',
  'collapsible-list'
], function($, Masonry, Mapping) {
  // Send a function full of our code to jQuery, which is executed on ready.
  $(function() {

    var isTouchDevice = 'ontouchstart' in document.documentElement;

    // Register tooltips but only on non-mobile devices
    if (!isTouchDevice) {
      $('[rel=tooltip]').tooltip({ container: 'body' });
    }

    // Register popovers. Trigger on click.
    $('[rel=popover]').popover({ trigger: 'click' }).on('click', function(e) {
      e.preventDefault();
    });

    /**
     * MDS Navbar
     * -----------
     */
    $('.navbar').navbar();

    /**
     * uniform feature module height
     * -----------
     * Certain pages that display features (i.e. content index, lightbox)
     * enforce a rule that all feature boxes are the same height.
     * This is accomplished via the 'uniform' class, which is applied to the 'content' div
     * <div class="content uniform">
     *   <div class="content-inner">
     *     ...
     *   </div>
     * </div>
     */

      /*$('.uniform').each( function(i, el) {
          var maxHeight = 0;
          $('.feature').each(function() {
              var $feature = $(this);
              if ($feature.height() > maxHeight) {
                  maxHeight = $feature.height();
              }
          });
          $('.feature').css({ height: maxHeight, position: 'relative' });
          $('.feature a').parent('p').css({ position: 'absolute', left: 20, bottom: 15 });
      }); */
    /**
     * Masonry (http://masonry.desandro.com/)
     * ---------
     * Enable the jQuery Masonry plugin for columns within a '.masonry'
     * container. The plugin will arrange all immediate children of each
     * '.row' to fit snuggly as documented by Masonry. The expected HTML
     * structure of a page using this plugin would be, at a minimum:
     *
     * <div class="masonry">
     *   <div class="row">
     *     <div class="spanX">...</div>
     *     <div class="spanX">...</div>
     *     ...
     *   </div>
     * </div>
     */

    if ($( '.masonry > .row' ).length ) {
      $( '.masonry > .row' ).masonry();
    }

    /**
     * special home page feature behavior
     * -----------
     * 1) on hover, title turns blue and image is shaded
     * 2) entire feature area is clickable
     */
    $('.feature.home').each(
      function( i, el ) {
        $feature = $( el );
        $feature
        .on('mouseenter mouseleave', function(e) {
          $(this).find("h3").toggleClass("active");
          $(this).find("img").toggleClass("shaded");
        })
        .on('click', function(e) {
          window.location = $(this).find("a:first").attr('href');
        });
      }
    );

    ///////////////////////////////////////////////////////////////////
    //
    // Stateful button variants
    //
    ///////////////////////////////////////////////////////////////////


    /**
     * Ratings button icon swap, this should eventually
     * be moved to it's own section within ge-bootstrap.
     */
    $('.btn-ratings').click( function(e) {
      var currentRating = parseInt($('.ratings-counter', this).text(), 10);

      //Swap Icon
      if ($(this).hasClass('active')) {
        currentRating--;

        $('.ratings-counter', this).text(currentRating);

        $(this).find('i').removeClass('icon-ico_star_lg');
        $(this).find('i').addClass('icon-ico_starempty_lg');
      }
      else {
        currentRating++;

        $('.ratings-counter', this).text(currentRating);
        $(this).find('i').removeClass('icon-ico_starempty_lg');
        $(this).find('i').addClass('icon-ico_star_lg');
      }

      if (currentRating === 0) {
        $('.ratings-counter', this).hide();
      }
      else {
        $('.ratings-counter', this).show();
      }

    });


    /**
     * Follow button, this should eventually
     * be moved to it's own section within ge-bootstrap.
     */
    $('.btn-follow').click( function(e) {

      //Swap Icon
      if ($(this).hasClass('active')) {
        $(this).text('Follow on Colab');
      }
      else {
        $(this).text('Followed On Colab');
      }

    });
    


    /**
     * Favorite button, this should eventually
     * be moved to it's own section within ge-bootstrap.
     */
    $('.btn-favorite').click( function(e) {

      //Swap Icon
      if ($(this).hasClass('active')) {
        $(this).text('Add to Favorites');
      }
      else {
        $(this).text('Added to Favorites');
      }

    });

    //// End stateful button section


    // Initialize collapisble
    $('.module.collapsible').collapsible();

    // jQuery UI sortable
    $('.ui-sortable').sortable({
      handle:          '.module-header',
      helper:          'clone',
      items:           'section',
      forceHelperSize: true,
      revert:          200,
      tolerance:       'pointer'
    });


    // Hide/Show Elements for EDE Settings Screen

    // Hide/Show Change Image Button on Settings 
    $('.settings-banner').hover(function() {
      $('#backgroundImage').fadeIn(250);
    }, function() {
      $('#backgroundImage').fadeOut(250);
    });

    // Swap Profile Thumbnail image on hover
    $('.banner-thumbnail').hover(function() {
      $(this).attr('src', '../../assets/images/ede-stewart-hover.png').fadeIn(250);
    }, function() {
      $(this).attr('src', '../../assets/images/ede-thumb-stewart.png').fadeIn(250);
    });


    // Bootstrap Modal fix

    $('.modal').bind('shown', function() {
      $('html').addClass('modal-open');
    });

    $('.modal').bind('hidden', function() {
      $('html').removeClass('modal-open');
    });

    // Disable zoom only on start for iOS.  Zooming still works post load -- still don't like this
    if (navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i)) {
      var viewportmeta = document.querySelector('meta[name="viewport"]');
      if (viewportmeta) {
        viewportmeta.content = 'width=device-width, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0';
        document.body.addEventListener('gesturestart', function () {
          viewportmeta.content = 'width=device-width, minimum-scale=0.25, maximum-scale=1.6';
        }, false);
      }
    }






  });
});
