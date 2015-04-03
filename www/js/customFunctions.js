jQuery.fn.center = function () {
    navHeight = $("nav").height();
    this.css("margin-top",(($(window).height()-navHeight-this.height())/2));
    return this;
}