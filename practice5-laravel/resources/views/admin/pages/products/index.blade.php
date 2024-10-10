@extends('admin.layouts.admin')

@section('title', 'Products')

@section('css')
@endsection

@section('js')
  <script type="module" src="{{ asset('assets/admin/js/pages/products/index.js') }}"></script>
@endsection

@section('main')
  <div class="content">
    <div class="container-fluid">
      <div class="card card-primary card-outline">
        <div class="card-body">
          <div class="row">
            <div class="col-3">
              <form action="">
                <div class="form-group has-search">
                  <i class="fas fa-search form-control-feedback"></i>
                  <input name="search" type="text" class="form-control" placeholder="Search">
                </div>
              </form>
            </div>
            <div class="col-2">
              <button type="button" class="btn btn-outline-secondary" id="btn-toggle-filter">
                <i class="fas fa-filter"></i>
                <span>filters</span>
              </button>
            </div>
            <div class="ml-auto">
              <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                <span>Create</span>
              </a>
            </div>
          </div>
          <form action="" id="filter-form" class="row align-items-end justify-content-between" style="display: none">
            <div class="col-3">
              <div class="form-group">
                <label for="">Category</label>
                <select name="" id="" class="custom-select">
                  <option value="">---- Select category ----</option>
                  <option value="1">Phone</option>
                  <option value="2">Tablet</option>
                  <option value="3">PC</option>
                </select>
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label for="">Brand</label>
                <select name="" id="" class="custom-select">
                  <option value="">---- Select brand ----</option>
                </select>
              </div>
            </div>
            <div class="col-2">
              <div class="form-group">
                <label for="">Price ($) From:</label>
                <input type="number" class="form-control" placeholder="Ex: 1">
              </div>
            </div>
            <div class="col-2">
              <div class="form-group">
                <label for="">to:</label>
                <input type="number" class="form-control" placeholder="Ex: 20">
              </div>
            </div>
            <div class="col-1">
              <div class="form-group">
                <button class="btn btn-secondary">
                  <i class="fas fa-filter"></i>
                </button>
              </div>
            </div>
          </form>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead class="thead-light">
                <tr>
                  <th>
                    <input type="checkbox">
                  </th>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Discount</th>
                  <th>Visibility</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="align-middle">
                    <input type="checkbox">
                  </td>
                  <td class="align-middle">
                    <div class="row align-items-center">
                      <div class="col-2">
                        <img src="{{ asset('assets/images/no-image.png') }}" class="w-100">
                      </div>
                      <div class="col-10">
                        <span>iPhone 15 Pro Max</span>
                      </div>
                    </div>
                  </td>
                  <td class="align-middle">$25.00</td>
                  <td class="align-middle">60%</td>
                  <td class="align-middle">
                    <span class="badge badge-primary badge-pill px-2">Pushlish</span>
                  </td>
                  <td class="align-middle">
                    <button class="btn btn-primary btn-xs p-2">
                      <i class="far fa-edit"></i>
                      <span class="ml-1">Edit</span>
                    </button>
                    <button class="btn btn-danger btn-xs p-2">
                      <i class="far fa-trash-alt"></i>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
            <div class="d-flex justify-content-between">
              <p class="m-0">
                Showing 1 to 10 of 256 entries
              </p>
              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                  <li class="page-item disabled">
                    <a class="page-link">
                      <i class="fas fa-chevron-left"></i>
                      <span class="ml-1">Back</span>
                    </a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <span class="mr-1">Next</span>
                      <i class="fas fa-chevron-right"></i>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
