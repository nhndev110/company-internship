$(function () {
  $("#loginForm").validate({
    errorElement: "div",
    errorPlacement: function (error, element) {
      error.addClass("invalid-feedback");
      element.closest(".input-group").append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass("is-invalid");
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass("is-invalid");
    },
    rules: {
      username: {
        required: true,
      },
      password: {
        required: true,
        minlength: 8,
      },
    },
    messages: {
      username: {
        required: "Please enter username",
      },
      password: {
        required: "Please enter password",
        minlength: $.validator.format("Please enter at least {0} characters"),
      },
    },
  });
});
