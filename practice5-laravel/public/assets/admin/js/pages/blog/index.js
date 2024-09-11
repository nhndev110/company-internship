import { Toast } from "../../toast.config.js";

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
        data: { _token: $("[name='_token']").val() },
        dataType: "json",
      })
        .done(function (resp, statusText, jqXHR) {
          if (jqXHR.status === 200 || jqXHR.status === 204) {
            articleRow.fadeOut(400, function () {
              $(this).remove();
            });
            Toast({ icon: "success", title: "Success", msg: resp.msg });
          }
        })
        .fail(function (err) {
          Toast({ icon: "error", title: err.statusText, msg: err.responseJSON.msg });
        });
    }
  });
}

// handle change status article
function handleChangeStatusArticle(ev) {
  const id = $(this).data("articleId");
  const status = $(this).is(":checked") ? 1 : 0;

  $.ajax({
    type: "PATCH",
    url: `${APP_URL}/admin/blog/update-status/${id}`,
    data: { status: status, _token: $("[name='_token']").val() },
    dataType: "json",
  })
    .done(function (resp, statusText, jqXHR) {
      if (jqXHR.status === 200) {
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
      Toast({ icon: "error", title: err.statusText, msg: err.responseJSON.msg });
    });
}
