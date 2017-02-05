$(document).ready(function() {
  ajustSelectedNav();//inital selected size setting
  $(document).on("scroll", onScroll);//create event for scrolling

  //auto-scroll to element when # link is clicked
  $('a[href^="#"]').on('click', function(e) {//if a href that begins with # is clicked
    e.preventDefault();//prevent jumping straight to the div
    $(document).off("scroll");//dont listen to the scroll event while autoscrolling
    $('navbar ul li a').removeClass('active');//remove active from all "a" tag in nav
    var target;
    if ($(this).attr('href') != "#top") {
      $(this).addClass('active');//add active to the clicked a tag
      target = this.hash;//store the id of the clicked "a" so that it can be used inside the next selector
    } else {
      //scroll to top based on window size
      if($(window).width() >=768) {
        $("#about").addClass('active');//add active to the clicked a tag
        target = "#about";//scroll to about if not in responsive mode
      } else {
        target = "#nav";
      }
    }
    $('html, body').stop().animate({'scrollTop': $(target).offset().top + 1}, 500, 'swing', function () {//css to scroll to the top of the the clicked div, animation time, animation style, function to run after
      window.location.hash = target;//changes the hash in the site url to the "a" that was clicked
      $(document).on("scroll", onScroll);//create new listener for after "a" was clicked
    });
  });

  //selects correct section to be active in the nav bar when the page is resized
  $(window).resize(function() {
    ajustSelectedNav();
  });

  //occupation animation code
  var texts = ["Developer", "Designer", "Creator"];
  var i = 0;
  (function occupationAnimation() {
    i++;
    $("my-occupation").delay(3500).fadeOut(500, function() {
      $("my-occupation").html(texts[i % texts.length]);
      $("my-occupation").fadeIn(500, function() {
        occupationAnimation();
      });
    });
  }());
}); //THIS IS THE END OF THE DOCUMENT READY

//ajust selected nav based on size
function ajustSelectedNav() {
  if($(window).width() >=768) {
    onScroll();
  } else {
    $('navbar ul li a[href^="#"]').removeClass("active");
  }
}

//listen for when the user scrolls
function onScroll() {
  var scrollPos = $(document).scrollTop();//get curent positon of scroll on the page
  $('navbar ul li a[href^="#"]').each(function () {//loop through all of the "a" nav links
    var currLink = $(this);//stores all of the links classes
    var refElement = $(currLink.attr("href"));
    if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
      $('navbar ul li a').removeClass("active");//remove active from all "a" tag in nav
      currLink.addClass("active");
    } else if (!scrollPos < 0 || $(window).width() <=768) {//on mac's you can have a negative position because of the scroll bar bounce so if its negative dont chnage anything
      currLink.removeClass("active");
    }
  });
}

//sets the height of an iframe to the height of the content inside of it
function resizeIframe(obj) {
  obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
}
