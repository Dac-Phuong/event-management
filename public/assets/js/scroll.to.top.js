var btn = $("#btn-scroll-to-top");

$(window).scroll(function () {
  if ($(window).scrollTop() > 300) {
    btn.addClass("show");
  } else {
    btn.removeClass("show");
  }
});

$(window).scroll(function(){
    if ($(this).scrollTop() > 300) {
       $("#floating-contact").addClass("float-show");
    } else {
       $("#floating-contact").removeClass("float-show");
    }
});