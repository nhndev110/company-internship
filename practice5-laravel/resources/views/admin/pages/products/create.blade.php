@extends('admin.layouts.admin')

@section('title', 'Create a Product')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/ckeditor5/ckeditor5.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/dropzone/dropzone.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/css/pages/products/create.css') }}">
  <style>
    .ck-editor__editable {
      min-height: 300px;
    }
  </style>
@endsection

@section('js')
  <script src="{{ asset('assets/admin/plugins/dropzone/dropzone.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/sortable/Sortable.min.js') }}"></script>
  <script type="module" src="{{ asset('assets/admin/js/pages/products/create.js') }}"></script>
  <script>
    Dropzone.autoDiscover = false;

    const previewNode = document.querySelector("#template");
    previewNode.id = "";
    const previewTemplate = previewNode.parentNode.innerHTML;
    previewNode.parentNode.removeChild(previewNode);

    const articleThumbnail = new Dropzone("#productImages", {
      url: "xxx.com",
      method: "post",
      uploadMultiple: true,
      paramName: "productImages",
      acceptedFiles: ".jpg,.png,.jpeg,.webp,.svg",
      previewTemplate: previewTemplate,
      maxFilesize: 2,
      autoQueue: false,
      previewsContainer: "#previews",
      clickable: ".fileinput-button",
    });

    const productImagesSortable = new Sortable(document.querySelector('#previews'), {
      animation: 150,
      handle: '.handle',
      onEnd: function(evt) {
        console.log('Phần tử đã được di chuyển từ vị trí', evt.oldIndex, 'đến', evt.newIndex);
      }
    });

    const productVariantsSortable = new Sortable(document.querySelector('#product-attribute-list'), {
      animation: 150,
      handle: '.handle',
      onEnd: function(evt) {
        console.log('Phần tử đã được di chuyển từ vị trí', evt.oldIndex, 'đến', evt.newIndex);
      }
    });
  </script>
@endsection

@section('main')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-lg-8">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h5 class="m-0">Product Infomation</h5>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="productName">Name</label>
                <input type="text" class="form-control" id="productName" placeholder="Enter product name">
              </div>

              <div class="form-group">
                <label for="productSlug">Slug</label>
                <input type="text" class="form-control" id="productSlug" name="productSlug" readonly>
              </div>

              <div class="row">
                <div class="col-4">
                  <div class="form-group">
                    <label for="productPrice">Price</label>
                    <input type="number" class="form-control" id="productPrice" name="productPrice"
                      placeholder="Enter price">
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label for="productPrice">Discount (%)</label>
                    <input type="number" class="form-control" id="productDiscount" name="productDiscount"
                      placeholder="Enter discount">
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label for="productPrice">Discount Price</label>
                    <input readonly type="number" class="form-control" name="productDiscountPrice"
                      id="productDiscountPrice">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="productDescription">Description</label>
                <textarea class="form-control" id="productDescription" name="productDescription" placeholder="Enter product description"
                  rows="6"></textarea>
              </div>
            </div>
          </div>
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h5 class="m-0">Variants</h5>
            </div>
            <div class="card-body">
              <div id="product-attribute-list">
                <div class="product-attribute row align-items-start justify-content-between">
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
                </div>
              </div>

              <button class="btn btn-primary btn-sm btn-add-attribute">
                <i class="fas fa-plus"></i>
                <span class="ml-2">Add another option</span>
              </button>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-4">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h5 class="m-0">Product Images</h5>
            </div>
            <div class="card-body">
              <div class="actions">
                <div class="dropzone border-0 bg-light fileinput-button" id="productImages">
                  <div class="dz-message" data-dz-message>
                    <i class="mr-2 fas fa-upload"></i>
                    <span>Drop your files here</span>
                  </div>
                </div>
              </div>
              <div id="previews">
                <div id="template" class="row align-items-center mt-3">
                  <div class="col-4">
                    <div class="d-flex align-items-center">
                      <button class="btn btn-default btn-sm handle mr-2">
                        <i class="fas fa-arrows-alt" aria-hidden="true"></i>
                      </button>
                      <span class="preview">
                        <img class="w-100" src="data:," data-dz-thumbnail />
                      </span>
                    </div>
                  </div>
                  <div class="col-6">
                    <p class="lead mb-0" data-dz-name></p>
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="imageStatus" name="imageStatus" checked>
                      <label class="custom-control-label font-weight-normal" for="imageStatus">Is hidden</label>
                    </div>
                    <strong class="error text-danger" data-dz-errormessage></strong>
                  </div>
                  <div class="col-2 text-right">
                    <button data-dz-remove class="btn btn-default btn-sm delete">
                      <i class="fas fa-trash"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card card-primary card-outline">
            <div class="card-header">
              <div class="d-flex justify-content-between align-items-center">
                <h5 class="m-0">Organize</h5>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="category">Category</label>
                <div class="input-group">
                  <select class="custom-select" id="category" name="category">
                    <option selected>---- Select Category ----</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                  <div class="input-group-append">
                    <button class="btn btn-secondary">
                      <i class="fas fa-plus"></i>
                    </button>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="">Brand</label>
                <select class="custom-select">
                  <option selected>---- Select Brand ----</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>

              <div class="form-group">
                <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" id="customSwitch1">
                  <label class="custom-control-label" for="customSwitch1">Is Selling</label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="text-right py-4">
        <button class="btn btn-danger">
          Back
        </button>
        <button class="btn btn-primary" type="submit">Save</button>
      </div>
    </div>
  </div>
@endsection
