$(document).ready(function () {
  $(".Chucnang").hide();
  $(".Dichvuthucung").click(function () {
    $(this).next(".Chucnang").slideToggle(500);
    $(".Dichvuthucung").not(this).next(".Chucnang").slideUp(500);
  });

  $(".an .Chucnang").show();
  $(".tam .Chucnang").show();
  $(".Dichvu").click(function () {
    $(this).next(".Chucnang").toggle(1000);
  });
});
