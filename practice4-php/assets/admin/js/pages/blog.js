import { Toast } from "../toast.config.js";

$(function () {
  $("#articleList").DataTable({
    paging: true,
    lengthChange: false,
    searching: true,
    ordering: true,
    info: true,
    autoWidth: false,
    responsive: true,
    columnDefs: [
      {
        orderable: false,
        targets: 0,
      },
      {
        orderable: false,
        targets: -1,
      },
    ],
  });

  $("#articleList tbody").on(
    "click",
    ".btn-delete-article",
    handleDeleteArticle
  );

  $("#articleList tbody").on(
    "change",
    ".custom-switch .custom-control-input",
    handleChangeStatusArticle
  );
});

// handle delete one article
function handleDeleteArticle(ev) {
  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "question",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    const articleId = $(this).data("id");
    const articleRow = $(this).closest("tr");
    if (result.isConfirmed) {
      $.ajax({
        type: "DELETE",
        url: `${APP_URL}/admin/blog/${articleId}`,
        dataType: "json",
      }).done(function (resp) {
        if (!resp) {
          Toast({
            icon: "error",
            title: "Error",
            msg: "Something went wrong. Please reload the page or try again later.",
          });
        }

        if (resp.status === "error") {
          Toast({ icon: "warning", title: "Warning", msg: resp.message });
        }

        if (resp.status === "success") {
          articleRow.fadeOut(400, function () {
            $(this).remove();
          });
          Toast({ icon: "success", title: "Success", msg: resp.message });
        }
      });
    }
  });
}

// handle change status article
function handleChangeStatusArticle(ev) {
  const articleId = $(this).data("articleId");
  const articleNewStatus = $(this).is(":checked") ? 1 : 0;

  $.ajax({
    type: "POST",
    url: `${APP_URL}/admin/blog/${articleId}`,
    data: { articleStatus: articleNewStatus },
    dataType: "json",
  })
    .done(function (resp, status, jqXHR) {
      if (status === "success") {
        Toast({
          icon: "success",
          title: "Success",
          msg: resp.msg,
          position: "top-end",
          showCloseButton: true,
          duration: 1000,
        });
      }
    })
    .fail(function (err, status, jqXHR) {
      console.error(err);
    });
}
