jQuery.fn.fadeDelay = function() {
 delay = 0;
 return this.each(function() {
  $(this).delay(delay).fadeIn(350);
  delay += 50;
 });
};