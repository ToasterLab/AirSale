jQuery.fn.center = function () {
    this.css({'margin-top': (this.parent().height() - this.height() / 2)});
    return this;
}