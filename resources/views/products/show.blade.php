@extends('layouts.app')

@section('content')
  <div class="container py-4">

    @if (session('message.success'))
      <div class="alert alert-success" role="alert">
        <p class="mb-0">{{ session('message.success') }}</p>
      </div>
    @endif

    <div class="card">
      {{-- actions --}}
      <div class="card-header px-2 py-1">
        <div class="row align-items-center py-1 px-2 g-3">

          {{-- card title --}}
          <div class="col-auto me-auto">
            <p class="card-title h5 m-0">Product Information</p>
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
        Product Information
      </div>

      <div class="card-footer px-3 py-2">
        <div class="row align-items-center justify-content-end g-3">

          {{-- delete button --}}
          <div class="col-auto">
            <button class="btn btn-sm btn-danger" id="product-show-delete-modal-button" data-bs-toggle="modal"
                    data-bs-target="#product-delete-confirmation-modal" type="button" title="delete product"
                    aria-label="delete product">
              <i class="fa-solid fa-sm fa-trash me-1"></i>
              <span>Delete</span>
            </button>
          </div>

          {{-- edit button --}}
          <div class="col-auto">
            <a class="btn btn-sm btn-secondary" id="product-edit-button"
               href="{{ route('products.edit', ['product' => $product]) }}" title="edit product"
               aria-label="edit product">
              <i class="fa-solid fa-sm fa-pen me-1"></i>
              <span>Edit</span>
            </a>
          </div>
        </div>
      </div>
    </div>

    {{-- delete confirmation modal --}}
    <div class="modal fade" id="product-delete-confirmation-modal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Delete Confirmation Alert</h5>
            <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Delete Product with ID of {{ $product->id }}?</p>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" data-bs-dismiss="modal" type="button" title="cancel product delete"
                    aria-label="cancel product delete">Close</button>
            <button class="btn btn-primary" form="product-delete-form" type="submit" title="confirm product delete"
                    aria-label="confirm product delete">
              Save changes
            </button>
          </div>
        </div>
      </div>
    </div>

    {{-- delete form --}}
    <form id="product-delete-form" action="{{ route('products.destroy', ['product' => $product]) }}" method="POST">
      @csrf
      @method('DELETE')
    </form>

  </div>
@endsection
