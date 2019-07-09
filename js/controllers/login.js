$(function() {
  $("input").iCheck({
    checkboxClass: "icheckbox_square-blue",
    radioClass: "iradio_square-blue",
    increaseArea: "20%" // optional
  });
});
$(document).ready(function() {
  $("#login_form").on("submit", function(evt) {
    evt.preventDefault();
    $.post(
      window.url.base_url + "login/ctrlogin/login",
      { data: $(this).serialize() },
      function(resp) {
        resp = JSON.parse(resp);
        $("#msg_receptor").fadeOut(800, function() {
          $("#msg_receptor")
            .removeClass("callout-danger")
            .removeClass("callout-success")
            .removeClass("callout-warning")
            .addClass("callout-" + resp.type_msg);
          $("#msg1_callout").html(resp.title);
          $(this).html(resp.msg);
          $(this).show();
          $(this).fadeIn(700);
        });
        if (resp.success !== false) {
          setTimeout(function() {
            location.reload();
          }, 2000);
        }
      }
    );
  });
});
