// filter menu

// filter menu

$(document).ready(function() {
  var navbutton = $("navbutton");

  navbutton.on("click", function() {
    $(this).siblings().removeClass("open").end().addClass("open");
  });

  var $grid = $(".grid").isotope({
    itemSelector: ".grid-item",
    percentPosition: true,
    masonry: {
      columnWidth: ".grid-sizer"
    }
  });

  // layout Isotope after each image loads
  $grid.imagesLoaded().progress(function() {
    $grid.isotope("layout");
  });

  $("#filters").on("click", "navbutton", function() {
    var filtr = $(this).attr("data-filter");
    $grid.isotope({ filter: filtr });
  });

  // ===== Scroll to Top ====
  $(window).scroll(function() {
    if ($(this).scrollTop() >= 350) {
      // If page is scrolled more than 350px
      $(".return-to-top").fadeIn(200); // Fade in the arrow
    } else {
      $(".return-to-top").fadeOut(200); // Else fade out the arrow
    }
  });

  $(".return-to-top").click(function() {
    // When arrow is clicked
    $("body,html").animate(
      {
        scrollTop: 0 // Scroll to top of body
      },
      500
    );
  });

  // ========= fancybox js ============//
  $(".fancybox-thumbs").fancybox({
    prevEffect: "none",
    nextEffect: "none",

    closeBtn: false,
    arrows: true,
    nextClick: true,

    autoCenter: true,

    helpers: {
      thumbs: {
        width: 20,
        height: 20 
        
      }
    },
    afterShow: function() {
      $("img.fancybox-image").elevateZoom({
        zoomType: "inner",
        cursor: "crosshair",
        zoomWindowFadeIn: 500,
        zoomWindowFadeOut: 750
      });
    },
    afterClose: function() {
      $(".zoomContainer").remove();
    }
  });
});



