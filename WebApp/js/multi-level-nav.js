'use strict';

define([
  'jquery',
  'ge-bootstrap'
],

function($) {

  /* JUMPNAV PUBLIC CLASS DEFINITION
  * =============================== */

  var MultiLevelNav = function(element, options) {
    this.init('multilevelnav', element, options);
  };

    MultiLevelNav.prototype = {
        constructor: MultiLevelNav,

        init: function(type, element, options) {
            // the initial offset of the multilevelnav from the top of the page
            var jumpNavStartPosition = $(".multi-level-nav").position();

            this.$jumpOffsetTop = jumpNavStartPosition.top;

            // upon clicking a multilevelnav link, this is the top offset applied to the target section
            // so that it lands in the right place relative to the multilevelnav
            this.$scrollOffset = $(".multi-level-nav").outerHeight(true); // + parseInt($(".jumpcontent .block").css("padding-top")); //
             // Enabled ScrollSpy on multilevelnav.
            $('body').scrollspy({
                offset: this.$scrollOffset*2,
                target: '.multilevelnav'
            });

            $( window ).on('scroll', $.proxy(this.updateJumpScroll, this));
            $( window ).on('hashchange', $.proxy(this.jumpScrollHashChange, this));
            $( window ).on('load', $.proxy(this.initJumpScroll, this));

            $('.multi-level-nav a').on('click', $.proxy(function( event ) {
                if (!$(event.currentTarget).hasClass("brand")) {
                    event.preventDefault();
                    this.jumpScrollGoTo($(event.currentTarget).attr('href'), true);
                }
            }, this));
        },
        updateJumpScroll: function() {
            var offset = $('.jumpcontent').offset();
            if ($(window).scrollTop() >= this.$jumpOffsetTop ) {
                $( ".multi-level-nav" ).addClass("fixed").css({top:0});
            } else {
                $( ".multi-level-nav" ).removeClass("fixed");
            }
        },
        initJumpScroll: function() {
            if(window.location.hash && $(window.location.hash).offset().top >= this.$jumpOffsetTop) {
                $( ".multi-level-nav" ).addClass("fixed").css({top:0});
                // the +2 is a little extra push to get it over the hump
                this.jumpScrollGoTo(window.location.hash, false);
            }
        },
        jumpScrollHashChange: function(event) {
            event.preventDefault();
            this.jumpScrollGoTo($(window.location.hash), false);
        },
        jumpScrollGoTo: function(selector, animate) {
            var delta = this.$scrollOffset;
            if($(window).scrollTop() >= this.$jumpOffsetTop) {
                delta = 0;
            }

            var offset = $(selector).offset();
            if(animate) {
                // the +2 is a little extra push to get it over the hump
                $( 'html, body' ).animate( { scrollTop: offset.top - this.$scrollOffset - delta + 2 }, 1000);
            }
            else {
                // the +2 is a little extra push to get it over the hump
                $( 'html, body' ).scrollTop(offset.top - this.$scrollOffset - delta + 2);
            }

        }
    };

    /* JUMPNAV PLUGIN DEFINITION
  * ========================= */

  $.fn.multilevelnav = function(option) {
    return this.each(function () {
      var $this = $(this),
          data = $this.data('multilevelnav'),
          options = typeof option === 'object' && option;

      if (!data) $this.data( 'multilevelnav', ( data = new MultiLevelNav(this, options) ) );
      if (typeof option === 'string') data[option]();
    });
  };

  $.fn.multilevelnav.Constructor = MultiLevelNav;

  $.fn.multilevelnav.defaults = {
    excludes: {
      tablet: false,
      phone: false
    }
  };

  $(function () {
    $('.multi-level-nav').each(function() {
      $(this).multilevelnav();
    });
  });

});
