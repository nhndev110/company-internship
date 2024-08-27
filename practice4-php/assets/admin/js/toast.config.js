const Toast = ({
  icon = "success",
  title = "default",
  msg = "default",
  duration = 3000,
  showCloseButton = false,
  position = "top",
}) =>
  Swal.mixin({
    toast: true,
    position: position,
    showConfirmButton: false,
    timer: duration,
    timerProgressBar: true,
    showCloseButton: showCloseButton,
    didOpen: (toast) => {
      toast.onmouseenter = Swal.stopTimer;
      toast.onmouseleave = Swal.resumeTimer;
    },
  }).fire({
    icon: icon,
    title: title,
    text: msg,
  });

export { Toast };
