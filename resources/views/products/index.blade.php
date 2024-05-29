@extends('layouts.app')

@section('content')
  <div class="container py-4">

    <div class="card">
      {{-- actions --}}
      <div class="card-header px-2 py-1">
        <div class="row align-items-center py-1 px-2 g-3">

          {{-- card title --}}
          <div class="col-auto me-auto">
            <p class="card-title h5 m-0">Product List</p>
          </div>

          <div class="col-auto btn-group" role="group" aria-label="product list actions">
            {{-- create button --}}
            <a class="btn btn-sm btn-outline-secondary" id="product-create-button" href="{{ route('products.create') }}"
               title="create new product" role="button" aria-label="create new product">
              <i class="fa-solid fa-sm fa-plus"></i>
            </a>

            {{-- import button --}}
            <button class="btn btn-sm btn-outline-secondary" id="product-import-button" type="button"
                    title="import product list" aria-label="import product list">
              <i class="fa-solid fa-file-import"></i>
            </button>

            {{-- export button --}}
            <button class="btn btn-sm btn-outline-secondary" id="product-export-button" type="button"
                    title="export product list" aria-label="export product list">
              <i class="fa-solid fa-file-export"></i>
            </button>
          </div>

          {{-- search bar --}}
          <div class="col-3">
            <label class="visually-hidden" for="product-search">Product Search</label>
            <input class="form-control form-control-sm" id="product-search" name="query" type="text"
                   title="search product" aria-label="search product" placeholder="Search" />
          </div>

        </div>
      </div>

      {{-- contents --}}
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th class="text-uppercase fs-6 font-monospace px-2" style="width: 16rem" scope="col">ID</th>
                <th class="text-uppercase fs-6 font-monospace px-2" scope="col">Name</th>
                <th class="text-uppercase fs-6 font-monospace px-2 text-center" style="width: 6rem" scope="col">Actions
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $product)
                <tr>
                  <th class="align-middle px-2 font-monospace" scope="row">{{ $product->id }}</td>
                  <td class="align-middle px-2 text-nowrap overflow-x-hidden" scope="col">{{ $product->name }}</td>
                  <td class="align-middle px-2 d-flex justify-content-center" scope="col">
                    <a class="btn btn-sm" href="{{ route('products.show', ['product' => $product]) }}" role="button"
                       aria-label="Show">
                      <i class="fa-solid fa-expand fa-sm"></i>
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      {{-- pagination --}}
      <div class="card-footer px-3 py-2">
        {{ $products->links() }}
      </div>
    </div>

  </div>
@endsection
