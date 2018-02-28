$(document).ready(function () {
  $("#panorama").panorama_viewer({
    repeat: true,
    animationTime: 10,
    easing: "linear",
    overlay: false
  });
});

for (var i = 0; i < 30000; i++) {
  var e = i - 0.5;
  (function (e) {
    setTimeout(function () {
      $(".pv-inner").css('background-position', e + 'px ' + '0' + 'px');
    }, 45 * e);
  })(e);
};
