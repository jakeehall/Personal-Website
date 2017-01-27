$(document).ready(function() {
  $(document).on("scroll", onScroll);//create event for scrolling

  //auto-scroll to element when # link is clicked
  $('a[href^="#"]').on('click', function(e) {//if a href that begins with # is clicked
    e.preventDefault();//prevent jumping straight to the div
    $(document).off("scroll");//dont listen to the scroll event while autoscrolling

    $('navbar ul li a').removeClass('active');//remove active from all "a" tag in nav
    $(this).addClass('active');//add active to the clicked a tag

    var target = this.hash;//store the id of the clicked "a" so that it can be used inside the next selector
    $('html, body').stop().animate({'scrollTop': $(target).offset().top + 1}, 500, 'swing', function () {//css to scroll to the top of the the clicked div, animation time, animation style, function to run after
      window.location.hash = target;//changes the hash in the site url to the "a" that was clicked
      $(document).on("scroll", onScroll);//create new listener for after "a" was clicked
    });
  });

  //occupation animation code
  var texts = ["Developer", "Designer", "Creator"];
  var i = 0;
  (function runIt() {
    i++;
    $("my-occupation").delay(3500).fadeOut(500, function() {
      $("my-occupation").html(texts[i % texts.length]);
      $("my-occupation").fadeIn(500, function() {
        runIt();
      });
    });
  }());
}); //THIS IS THE END OF THE DOCUMENT READY

//listen for when the user scrolls
function onScroll() {
  var scrollPos = $(document).scrollTop();//get curent positon of scroll on the page
  $('navbar ul li a[href^="#"]').each(function () {//loop through all of the "a" nav links
    var currLink = $(this);//stores all of the links classes
    var refElement = $(currLink.attr("href"));
    if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
      $('navbar ul li a').removeClass("active");//remove active from all "a" tag in nav
      currLink.addClass("active");
    } else if (!scrollPos < 0) {//on mac's you can have a negative position because of the scroll bar bounce so if its negative dont chnage anything
      currLink.removeClass("active");
    }
  });
}
