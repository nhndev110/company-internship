@extends('admin.layouts.admin')

@section('title', 'Create a Product')

@section('css')
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/ckeditor5/ckeditor5.css') }}">
  <link rel="stylesheet"
    href="{{ asset('assets/admin/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
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
  <script src="{{ asset('assets/admin/plugins/moment/moment-with-locales.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/select2/js/select2.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
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
      files: true,
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

    $('.datetimepicker').datetimepicker({
      "allowInputToggle": true,
      "showClose": true,
      "showClear": true,
      "showTodayButton": true,
      "format": "MM/DD/YYYY hh:mm:ss A",
    });

    $('.select2bs4').select2({
      theme: 'bootstrap4'
    }).on("select2:open", function(ev) {
      $(`[aria-controls="select2-${ev.target.id}-results"]`)[0].focus();
    });
  </script>
@endsection

@section('main')
  <div class="content">
    <div class="container-fluid">
      <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
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
                      <label for="productDiscount">Discount (%)</label>
                      <input type="number" class="form-control" id="productDiscount" name="productDiscount"
                        placeholder="Enter discount">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label for="productDiscountPrice">Discount Price</label>
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
                      <button class="btn btn-default btn-sm handle mb-2" type="button">
                        <i class="fas fa-arrows-alt" aria-hidden="true"></i>
                      </button>
                      <button class="btn delete-attribute btn-danger btn-sm" type="button">
                        <i class="fas fa-trash" aria-hidden="true"></i>
                      </button>
                    </div>
                    <div class="col-3">
                      <div class="form-group">
                        <label for="">Options</label>
                        <input class="form-control" placeholder="Enter options">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Value</label>
                        <input class="form-control" placeholder="Enter value">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Stock Qty</label>
                        <input class="form-control" placeholder="Enter value">
                      </div>
                    </div>
                  </div>
                </div>

                <button class="btn btn-primary btn-sm btn-add-attribute" type="button">
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
                        <button class="btn btn-default btn-sm handle mr-2" type="button">
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
                        <input type="checkbox" class="custom-control-input" id="imageStatus" name="imageStatus"
                          checked>
                        <label class="custom-control-label font-weight-normal" for="imageStatus">Is hidden</label>
                      </div>
                      <strong class="error text-danger" data-dz-errormessage></strong>
                    </div>
                    <div class="col-2 text-right">
                      <button data-dz-remove class="btn btn-default btn-sm delete" type="button">
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
                    <select class="custom-select select2bs4" id="category" name="category">
                      <option value="" selected>---- Select Category ----</option>
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                    </select>
                    <div class="input-group-append">
                      <button class="btn btn-primary" data-toggle="modal" data-target="#createCategoryModal"
                        type="button">
                        <i class="fas fa-plus"></i>
                      </button>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="supplier">Supplier</label>
                  <select class="custom-select select2bs4" name="supplier" id="supplier">
                    <option value="" selected>---- Select Supplier ----</option>
                    @foreach ($suppliers as $supplier)
                      <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="brand">Brand</label>
                  <select class="custom-select select2bs4" name="brand" id="brand">
                    <option value="" selected>---- Select Brand ----</option>
                    @foreach ($brands as $brand)
                      <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label>Visibility</label>
                  <div class="form-check">
                    <input checked type="radio" name="productVisibility" id="productVisibilityPushlished"
                      class="form-check-input" value="1">
                    <label for="productVisibilityPushlished" class="form-check-label">Pushlished</label>
                  </div>
                  <div class="form-check">
                    <input type="radio" name="productVisibility" id="productVisibilityScheduled"
                      class="form-check-input" value="0">
                    <label for="productVisibilityScheduled" class="form-check-label">Scheduled</label>
                  </div>
                  <div class="form-check">
                    <input type="radio" name="productVisibility" id="productVisibilityHidden"
                      class="form-check-input" value="-1">
                    <label for="productVisibilityHidden" class="form-check-label">Hidden</label>
                  </div>
                  <div class="scheduled-input form-group mt-3" style="display: none">
                    <div class="input-group datetimepicker date">
                      <input type="text" class="form-control" />
                      <div class="input-group-addon input-group-append">
                        <div class="input-group-text">
                          <i class="fa fa-calendar"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="text-right py-4">
          <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i>
            <span>Back</span>
          </a>
          <button class="btn btn-primary ml-1" type="submit">
            <i class="fas fa-save"></i>
            <span class="ml-1">Save</span>
          </button>
        </div>
      </form>
    </div>
  </div>

  <div class="modal fade" id="createCategoryModal" tabindex="-1" aria-labelledby="createCategoryModalLabel"
    aria-hidden="true">
    @include('admin.pages.products.create-category')
  </div>
@endsection
