@extends('admin.layouts.admin')

@section('title', 'Blog')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/css/pages/blog/index.css') }}">
@endsection

@section('js')
  <!-- DataTables & Plugins -->
  <script src="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
  <script type="module" src="{{ asset('assets/admin/js/pages/blog/index.js') }}"></script>
@endsection

@section('main')
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="actions mb-2">
                <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">
                  <i class="fas fa-plus-circle mr-1"></i>
                  Add New
                </a>
              </div>
              <table id="articleList" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th class="no-sort">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="article-all-checkbox" />
                        <label for="article-all-checkbox" class="custom-control-label"></label>
                      </div>
                    </th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Category</th>
                    <th>Author</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if (!empty($articles))
                    @foreach ($articles as $article)
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="article-{{ $article->id }}-checkbox"
                              value="{{ $article->id }}" />
                            <label for="article-{{ $article->id }}-checkbox" class="custom-control-label"></label>
                          </div>
                        </td>
                        <td>
                          <a target="_blank"
                            href="{{ route('blog.show', ['slug' => $article->slug, 'id' => $article->id]) }}"
                            class="d-flex align-items-center">
                            <img src="{{ asset('/') . 'storage/articles/' . $article->thumbnail }}"
                              alt="{{ $article->title }}" class="rounded"
                              style="height: 100px; width: 100px; object-fit: cover; object-position: center;">
                            <p class="ml-3">{{ $article->title }}</p>
                          </a>
                        </td>
                        <td class="text-center align-middle">
                          <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" data-article-id="{{ $article->id }}"
                              id="statusSwitch{{ $article->id }}" {{ $article->status === 1 ? 'checked' : '' }}>
                            <label class="custom-control-label" for="statusSwitch{{ $article->id }}"></label>
                          </div>
                        </td>
                        <td>{{ $article->category->name }}</td>
                        <td>{{ $article->author->name }}</td>
                        <td>
                          <button class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-h"></i>
                          </button>
                          <div class="dropdown-menu" role="menu">
                            <a href="{{ route('admin.blog.edit', ['id' => $article->id]) }}" class="dropdown-item">
                              <i class="fas fa-edit"></i>
                              Edit
                            </a>
                            <button class="dropdown-item btn-delete-article" data-id="{{ $article->id }}">
                              <i class="far fa-trash-alt"></i>
                              Delete
                            </button>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add New Article</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="">
            <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
              <label for="exampleInputFile">File input</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text">Upload</span>
                </div>
              </div>
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
          </form>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Create</button>
        </div>
      </div>
    </div>
  </div>
@endsection
