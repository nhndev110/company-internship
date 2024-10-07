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
                  <th style="width: 50px;">Thumbnail</th>
                  <th style="width: 50%">Name</th>
                  <th>Price</th>
                  <th>Discount</th>
                  <th>Is Selling</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="align-middle">
                    <img src="{{ asset('assets/images/no-image.png') }}" width="100%">
                  </td>
                  <td class="align-middle">iPhone 15 Pro Max</td>
                  <td class="align-middle">$25.000</td>
                  <td class="align-middle">60%</td>
                  <td class="align-middle">
                    <span class="badge badge-primary badge-pill px-2">Selling</span>
                  </td>
                  <td class="align-middle">
                    <a href="" class="btn btn-primary btn-xs p-2">
                      <i class="far fa-edit"></i>
                      <span class="ml-1">Edit</span>
                    </a>
                    <a href="" class="btn btn-default btn-xs p-2">
                      <i class="far fa-trash-alt"></i>
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
