import { editorConfig, ClassicEditor } from "../../ckeditor.config.js";

const productAttributeList = $("#product-attribute-list");
const btnAddAttribute = $(".btn-add-attribute");

let productDescriptionEditor;

$(function () {
  ClassicEditor.create(
    document.querySelector("textarea[name='productDescription']"),
    editorConfig
  )
    .then((editor) => {
      productDescriptionEditor = editor;
    })
    .catch((error) => {
      console.error(error);
    });

  handleAddAttribute();
});

function handleAddAttribute() {
  $(".delete-attribute").click(handleRemoveAttribute);
  btnAddAttribute.click(function () {
    const productAttribute = $(
      `<div class="product-attribute row align-items-start justify-content-between" style="display: none;">
        <div class="col-1">
          <button class="btn btn-default btn-sm handle mb-2">
            <i class="fas fa-arrows-alt" aria-hidden="true"></i>
          </button>
          <button class="btn delete-attribute btn-danger btn-sm">
            <i class="fas fa-trash" aria-hidden="true"></i>
          </button>
        </div>
        <div class="col-3">
          <div class="form-group">
            <label for="">Options</label>
            <input class="form-control" placeholder="Enter options">
          </div>
        </div>
        <div class="col-8">
          <div class="form-group">
            <label for="">Value</label>
            <input class="form-control" placeholder="Enter value">
          </div>
        </div>
      </div>`
    );
    productAttribute.find(".delete-attribute").click(handleRemoveAttribute);
    productAttributeList.append(productAttribute);
    productAttribute.fadeIn(350);
  });
}

function handleRemoveAttribute() {
  $(this).closest(".product-attribute").fadeOut(350, function () {
    $(this).remove();
  });
}