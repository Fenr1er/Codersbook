$(document).ready(function () {
  $("#usermenupic").on("click", function () {
    $("#usermenudropdowncontent").slideToggle("fast");
  });
});
$(document).on("click", function (event) {
  var $trigger = $("#navusermenu");
  if ($trigger !== event.target && !$trigger.has(event.target).length) {
    $("#usermenudropdowncontent").slideUp("fast");
  }
});
