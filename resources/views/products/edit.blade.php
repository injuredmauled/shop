@extends('layouts.app')

@section('content')
  <div class="container py-4">
    <div class="card">
      {{-- actions --}}
      <div class="card-header px-2 py-1">
        <div class="row align-items-center py-1 px-2 g-3">

          {{-- card title --}}
          <div class="col-auto me-auto">
            <p class="card-title h5 m-0">Update Product Information</p>
          </div>

          <div class="col-auto btn-group" role="group" aria-label="product actions">
            {{-- star button --}}
            <button class="btn btn-sm btn-outline-secondary" id="product-star-button" title="star product" role="button"
                    aria-label="star product">
              <i class="fa-solid fa-sm fa-star"></i>
            </button>
            {{-- share button --}}
            <button class="btn btn-sm btn-outline-secondary" id="product-share-button" title="share product"
                    role="button" aria-label="share product">
              <i class="fa-solid fa-sm fa-share"></i>
            </button>
          </div>
        </div>
      </div>

      {{-- contents --}}
      <div class="card-body">
        <div class="mb-3">
          <label class="form-label" for="product-name">Product Name</label>
          <input class="form-control" id="product-name" name="name" form="product-update-form" type="email"
                 value="{{ $product->name }}" />
        </div>
      </div>

      <div class="card-footer px-3 py-2">
        <div class="row align-items-center justify-content-end g-3">

          {{-- update button --}}
          <div class="col-auto">
            <button class="btn btn-sm btn-danger" id="product-show-update-modal-button" data-bs-toggle="modal"
                    data-bs-target="#product-update-confirmation-modal" type="button" title="update product info"
                    aria-label="update product info">
              <i class="fa-solid fa-sm fa-floppy-disk me-1"></i>
              <span>Update</span>
            </button>
          </div>

          {{-- cancel button --}}
          <div class="col-auto">
            <a class="btn btn-sm btn-secondary" id="product-update-cancel-button"
               href="{{ route('products.show', ['product' => $product]) }}" title="cancel update"
               aria-label="cancel update">
              <i class="fa-solid fa-sm fa-xmark me-1"></i>
              <span>Cancel</span>
            </a>
          </div>
        </div>
      </div>
    </div>

    {{-- update confirmation modal --}}
    <div class="modal fade" id="product-update-confirmation-modal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Update Confirmation Alert</h5>
            <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Update Product with ID of {{ $product->id }}?</p>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" data-bs-dismiss="modal" type="button" title="cancel product update"
                    aria-label="cancel product update">Close</button>
            <button class="btn btn-primary" form="product-update-form" type="submit" title="confirm product update"
                    aria-label="confirm product update">
              Save changes
            </button>
          </div>
        </div>
      </div>
    </div>

    <form id="product-update-form" action="{{ route('products.update', ['product' => $product]) }}" method="POST">
      @csrf
      @method('PUT')
    </form>

  </div>
@endsection
