var counter = 1;

$(document).ready(function () {
  

  $(".login-form").hide();
  $(".login").css("background", "none");

  $(".login").click(function () {
    $(".signup-form").hide();
    $(".login-form").show();
    $(".signup").css("background", "none");
    $(".login").css("background", "#2f575d");
  });

  $(".signup").click(function () {
    $(".signup-form").show();
    $(".login-form").hide();
    $(".login").css("background", "none");
    $(".signup").css("background", "#2f575d");
  });

  $(".btn").click(function () {
    $(".input").val("");
  });

  setInterval(function () {
    document.getElementById("radio" + counter).checked = true;
    counter++;
    if (counter > 3) {
      counter = 1;
    }
  }, 7000);
});
