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
      <div class="card card-primary card-outline mb-0">
        <div class="card-body px-0 py-4">
          <form action="{{ route('admin.products.index') }}" id="filter-form" method="GET" class="px-4">
            <div class="row">
              <div class="col-3">
                <div class="form-group has-search">
                  <i class="fas fa-search form-control-feedback"></i>
                  <input name="s" value="{{ request()->query('s') }}" autofocus type="search" class="form-control"
                    placeholder="Search">
                </div>
              </div>
              <div class="col-9 text-right">
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                  <i class="fas fa-plus"></i>
                  <span>Create</span>
                </a>
              </div>
            </div>
            <div class="row align-items-end justify-content-between">
              <div class="col-3">
                <div class="form-group">
                  <label for="category">Category</label>
                  <select name="category_id" id="category" class="custom-select">
                    <option value="">---- Select category ----</option>
                    @foreach ($product_categories as $category)
                      <option {{ request()->query('category_id') == $category->id ? 'selected' : '' }}
                        value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="brand">Brand</label>
                  <select name="brand_id" id="brand" class="custom-select">
                    <option value="">---- Select brand ----</option>
                    @foreach ($product_brands as $brand)
                      <option {{ request()->query('brand_id') == $brand->id ? 'selected' : '' }}
                        value="{{ $brand->id }}">
                        {{ $brand->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-2">
                <div class="form-group">
                  <label for="startPrice">Price ($) From:</label>
                  <input type="number" name="start_price" id="startPrice" value="{{ request()->query('start_price') }}"
                    class="form-control" placeholder="Ex: 1">
                </div>
              </div>
              <div class="col-2">
                <div class="form-group">
                  <label for="endPrice">to:</label>
                  <input type="number" name="end_price" id="endPrice" value="{{ request()->query('end_price') }}"
                    class="form-control" placeholder="Ex: 20">
                </div>
              </div>
              <div class="col-1">
                <div class="form-group">
                  <button class="btn btn-secondary w-100">
                    <i class="fas fa-filter"></i>
                  </button>
                </div>
              </div>
            </div>
          </form>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead class="thead-light shadow-sm">
                <tr>
                  <th>
                    <input type="checkbox" />
                  </th>
                  <th>Product</th>
                  <th>Stock</th>
                  <th>Price</th>
                  <th>Discount</th>
                  <th>Visibility</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)
                  <tr>
                    <td class="align-middle">
                      <input type="checkbox" />
                    </td>
                    <td class="align-middle">
                      <div class="row align-items-center">
                        <div class="col-1">
                          <img src="{{ $product->image }}" class="rounded w-100">
                        </div>
                        <div class="col-11">
                          <h3 class="h6 mb-0">
                            <a href="">
                              {{ $product->name }}
                            </a>
                          </h3>
                        </div>
                      </div>
                    </td>
                    <td class="align-middle">
                      <div class="d-flex align-items-center">
                        <i class="fas fa-box"></i>
                        <span class="ml-2">{{ $product->total_stock_qty }}</span>
                      </div>
                    </td>
                    <td class="align-middle">
                      <div class="d-flex align-items-center">
                        <i class="fas fa-dollar-sign"></i>
                        <span class="ml-2">{{ $product->price }}</span>
                      </div>
                    </td>
                    <td class="align-middle">{{ $product->discount }}%</td>
                    <td class="align-middle">
                      @if ($product->visibility == 1)
                        <span class="badge badge-success badge-pill px-2">Pushlish</span>
                      @elseif ($product->visibility == 0)
                        <span class="badge badge-warning badge-pill px-2">Scheduled</span>
                      @elseif ($product->visibility == -1)
                        <span class="badge badge-dark badge-pill px-2">Hidden</span>
                      @endif
                    </td>
                    <td class="align-middle text-center">
                      <a href="#" type="button" class="dropdown-toggle text-reset px-3 py-2" data-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fas fa-ellipsis-h"></i>
                      </a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('admin.products.edit', ['id' => $product->id]) }}">
                          <i class="fas fa-edit"></i>
                          <span>Edit</span>
                        </a>
                        <a class="dropdown-item" href="{{ route('admin.products.destroy', ['id' => $product->id]) }}">
                          <i class="far fa-trash-alt"></i>
                          <span>Delete</span>
                        </a>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="px-4">
            {!! $products->links() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
