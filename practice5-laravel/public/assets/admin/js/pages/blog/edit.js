import { editorConfig, ClassicEditor } from "../../ckeditor.config.js";
import { Toast } from "../../toast.config.js";

Dropzone.autoDiscover = false;

const editArticleFormNode = $("#editArticleForm");

const articleId = $("[name='articleId']").val();
const articleTitleNode = $("[name='articleTitle']");
const articleDescNode = $("[name='articleDesc']");
const articleSlugNode = $("[name='articleSlug']");
const articleCategoryNode = $("[name='articleCategory']");
const articleTagsNode = $("[name='articleTags']");

let articleContentEditor;
let articleThumbnail;

$(function () {
  ClassicEditor.create(
    document.querySelector("textarea[name='articleContent']"),
    editorConfig
  )
    .then((editor) => {
      articleContentEditor = editor;
    })
    .catch((error) => {
      console.error(error);
    });

  articleCategoryNode
    .select2({ theme: "bootstrap4", width: "100%" })
    .on("select2:open", function (ev) {
      $(`[aria-controls="select2-${ev.target.id}-results"]`)[0].focus();
    });

  articleTagsNode
    .select2({
      theme: "bootstrap4",
      tags: true,
      multiple: true,
      tokenSeparators: [",", " "],
      maximumSelectionLength: 5,
      placeholder: "Ex: donate, activity, ...",
      width: "100%",
      escapeMarkup: function (markup) {
        return markup;
      },
      createTag: function (params) {
        const term = $.trim(params.term);

        if (term === "") {
          return null;
        }

        return {
          id: term,
          text: term,
          isNew: true,
        };
      },
      insertTag: function (data, tag) {
        data.push(tag);
      },
      templateResult: function (tag) {
        if (!tag._resultId) {
          return $(
            `<span>Create tag <span class="badge badge-dark">${tag.text}</span></span>`
          );
        }

        return tag.text;
      },
    })
    .on("select2:select", function (ev) {
      const tag = ev.params.data;

      const _this = $(this);

      if (tag.isNew) {
        $.ajax({
          type: "POST",
          url: `${APP_URL}/admin/tag/store`,
          data: { _token: $("[name='_token']").val(), name: tag.text },
          dataType: "json",
          contentType: "application/x-www-form-urlencoded",
        })
          .done(function (resp, statusText, jqXHR) {
            if (jqXHR.status === 201) {
              const newTag = resp.data;
              $(
                "<option value='" + newTag.id + "'>" + newTag.name + "</option>"
              ).appendTo(_this);

              const selection = _this.val();
              const index = selection.indexOf(newTag.name);

              if (index !== 1) {
                selection[index] = newTag.id.toString();
              }

              _this.val(selection).trigger("change");
            }
          })
          .fail(function (err, textStatus, jqXHR) {
            Toast({ icon: "error", title: err.statusText, msg: err.responseJSON.msg });
          });
      }
    })
    .on("select2:open", function (ev) {
      $(`[aria-controls="select2-${ev.target.id}-results"]`)[0].focus();
    });

  // Handle Article Slug
  articleTitleNode.on("keyup", function (ev) {
    let title = ev.target.value;
    let slug = title.toLowerCase().trim();
    slug = slug.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
    slug = slug.replace(/\s+/g, "-");
    slug = slug.replace(/[^a-z0-9\-]/g, "");
    articleSlugNode.val(slug);
  });

  const previewNode = document.querySelector("#template");
  previewNode.id = "";
  const previewTemplate = previewNode.parentNode.innerHTML;
  previewNode.parentNode.removeChild(previewNode);

  articleThumbnail = new Dropzone("#articleThumbnail", {
    url: "xxx.com",
    method: "post",
    uploadMultiple: false,
    paramName: "articleThumbnail",
    acceptedFiles: ".jpg,.png,.jpeg,.gif,.webp",
    previewTemplate: previewTemplate,
    maxFilesize: 2,
    maxFiles: 1,
    autoQueue: false,
    previewsContainer: "#previews",
    clickable: ".fileinput-button",
  });

  articleThumbnail.on("maxfilesexceeded", function (file) {
    this.removeAllFiles();
    this.addFile(file);
  });

  // TODO: Get information thumbnail
  $.getJSON(
    `${APP_URL}/admin/blog/${articleId}/show-thumbnail-info`,
    function (resp, status, jqXHR) {
      if (jqXHR.status === 200) {
        const mockFile = {
          name: resp.name,
          size: resp.size,
          accepted: true, // this is required to set maxFiles count automatically
          status: "show"
        };
        articleThumbnail.files.push(mockFile);
        articleThumbnail.displayExistingFile(
          mockFile,
          resp.url
        );
      }
    }
  );

  // Validate Create Article Form
  $.validator.addMethod("notEqualTo", function (value, element, param) {
    return this.optional(element) || param != value;
  });

  editArticleFormNode.validate({
    ignore: ".select2-search__field, .ck-content, .ck-widget",
    debug: true,
    errorElement: "div",
    errorPlacement: function (error, element) {
      error.addClass("invalid-feedback");
      element.closest(".form-group").append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass("is-invalid");
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass("is-invalid");
    },
    rules: {
      articleTitle: { required: true, maxlength: 100, minlength: 5 },
      articleDesc: { required: true, maxlength: 300 },
      articleContent: {
        required: function () {
          articleContentEditor.updateSourceElement();
        },
        minlength: 20,
      },
      articleSlug: { required: true, maxlength: 150 },
      articleCategory: {
        required: true,
        notEqualTo: 0,
      },
      articleTags: "required",
    },
    messages: {
      articleTitle: {
        required: "Please enter article title",
        maxlength: $.validator.format(
          "Please enter no more than {0} characters"
        ),
      },
      articleDesc: {
        required: "Please enter article description",
        maxlength: $.validator.format(
          "Please enter no more than {0} characters"
        ),
      },
      articleContent: {
        required: "Please enter article content",
        minlength: $.validator.format("Please enter at least {0} characters"),
      },
      articleSlug: {
        required: "Please enter article slug",
        maxlength: $.validator.format(
          "Please enter no more than {0} characters"
        ),
      },
      articleCategory: {
        notEqualTo: "Please enter article category",
      },
      articleTags: {
        required: "Please enter article tags",
      },
    },
  });

  // Handle update edit article form
  editArticleFormNode.submit(function (ev) {
    handleUpdateArticle(ev, 1);
  });

  $("#btn-save-draft").on("click", function (ev) {
    handleUpdateArticle(ev, 0);
  });
});

function handleUpdateArticle(ev, articleStatus) {
  ev.preventDefault();

  if (!editArticleFormNode.valid()) {
    return;
  }

  let articleTitleValue = $.trim(articleTitleNode.val());
  let articleDescValue = $.trim(articleDescNode.val());
  let articleContentEditorValue = articleContentEditor.getData();
  let articleThumbnailValue = articleThumbnail.getAcceptedFiles()[0];
  let articleSlugValue = $.trim(articleSlugNode.val());
  let articleCategoryValue = articleCategoryNode.val();
  let articleTagsValue = articleTagsNode.val();

  if (!articleThumbnailValue) {
    Toast({
      icon: "warning",
      title: "Warning",
      msg: "Please upload a thumbnail",
      showCloseButton: true,
      position: "top-end",
    });
    return;
  }

  const formData = new FormData();
  formData.append("title", articleTitleValue);
  formData.append("description", articleDescValue);
  formData.append("content", articleContentEditorValue);
  if (articleThumbnailValue.status === "added") {
    formData.append("thumbnail", articleThumbnailValue);
  }
  formData.append("slug", articleSlugValue);
  formData.append("category", articleCategoryValue);
  formData.append("tags", JSON.stringify(articleTagsValue));
  formData.append("status", articleStatus);

  $.ajax({
    type: "POST",
    url: `${APP_URL}/admin/blog/${articleId}?_method=PATCH`,
    data: formData,
    dataType: "json",
    contentType: "application/json",
    headers: { 'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content') },
    cache: false,
    contentType: false,
    processData: false,
  })
    .done(function (resp, textStatus, jqXHR) {
      if (jqXHR.status === 200) {
        Swal.fire({
          title: resp.msg,
          text: "Would you like to add another article?",
          icon: "success",
          showCancelButton: true,
          confirmButtonText: "Back to blog management",
          confirmButtonColor: "#d33",
          cancelButtonText: "Continue!",
          cancelButtonColor: "#3085d6",
        }).then((result) => {
          if (result.isConfirmed) {
            location.href = "/admin/blog";
          }
        });
      }
    })
    .fail(function (err, textStatus, jqXHR) {
      Toast({ icon: "error", title: err.statusText, msg: err.responseJSON.msg });
    });
}
