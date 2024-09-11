@extends('admin.layouts.admin')

@section('title', 'Create Article')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/ckeditor5/ckeditor5.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/dropzone/dropzone.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/css/pages/blog/create.css') }}">
  <style>
    .editable:empty:not(:focus)::before {
      content: attr(data-ph) !important;
      color: grey !important;
    }
  </style>
@endsection

@section('js')
  <script src="{{ asset('assets/admin/plugins/dropzone/dropzone.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/select2/js/select2.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
  <script type="module" src="{{ asset('assets/admin/js/pages/blog/create.js') }}"></script>
@endsection

@section('main')
  <form action="" id="createArticleForm" method="post">
    @csrf
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add a new Article</h1>
          </div>
          <div class="col-sm-6">
            <div class="float-sm-right">
              <button type="reset" class="btn btn-outline-secondary font-weight-bold mr-2">Discard</button>
              <button type="button" class="btn btn-outline-primary font-weight-bold mr-2" id="btn-save-draft">Save
                draft</button>
              <button type="submit" class="btn-publish-article btn btn-primary font-weight-bold">Publish article</button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-lg-8">
            <div class="card">
              <div class="card-header">
                <h5>Article Information</h5>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="articleTitle">Title <span class="text-danger">*</span></label>
                  <input id="articleTitle" name="articleTitle" class="form-control form-control-border"
                    placeholder="Enter Article Title...">
                </div>
                <div class="form-group">
                  <label for="articleDesc">Description <span class="text-danger">*</span></label>
                  <textarea class="form-control form-control-border" name="articleDesc" id="articleDesc"
                    placeholder="Enter Article Description..." style="resize: vertical;"></textarea>
                </div>
                <div class="form-group">
                  <label>Content <span class="text-danger">*</span></label>
                  <textarea id="articleContent" name="articleContent"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-4">
            <div class="card">
              <div class="card-header">
                <h5>Organize</h5>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="articleSlug">Slug <span class="text-danger">*</span></label>
                  <input class="form-control" id="articleSlug" name="articleSlug" type="text"
                    placeholder="example-article-slug">
                </div>
                <div class="form-group">
                  <label for="articleCategory">Category <span class="text-danger">*</span></label>
                  <select name="articleCategory" class="form-control border" id="articleCategory">
                    <option value="0" selected>----- Please select a category -----</option>
                    @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group mt-3">
                  <label for="articleTags">Tags <span class="text-danger">*</span></label>
                  <select id="articleTags" name="articleTags" multiple="multiple" class="form-control border">
                    @foreach ($tags as $tag)
                      <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h5>Article Thumbnail</h5>
              </div>
              <div class="card-body">
                <div class="actions">
                  <div class="dropzone border-0 bg-light fileinput-button" id="articleThumbnail">
                    <div class="dz-message" data-dz-message>
                      <i class="mr-2 fas fa-upload"></i> Drop your files here
                    </div>
                  </div>
                </div>
                <div id="previews">
                  <div id="template" class="row align-items-center mt-3">
                    <div class="col-3">
                      <span class="preview">
                        <img class="w-100" src="data:," data-dz-thumbnail />
                      </span>
                    </div>
                    <div class="col-7">
                      <div style="width: 100%;">
                        <p class="lead mb-0" data-dz-name></p> (<span data-dz-size></span>)
                      </div>
                      <strong class="error text-danger" data-dz-errormessage></strong>
                    </div>
                    <div class="col-2 text-right">
                      <button data-dz-remove class="btn btn-default btn-sm delete"><i class="fas fa-trash"></i></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </form>
@endsection
