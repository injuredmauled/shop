@extends('layouts.app')

@section('content')
  <div class="container py-4">

    @if ($errors->any())
      <div class="alert alert-danger" role="alert">
        <h5>Error!</h5>
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <div class="card">
      {{-- actions --}}
      <div class="card-header px-2 py-1">
        <div class="row align-items-center py-1 px-2 g-3">

          {{-- card title --}}
          <div class="col-auto me-auto">
            <p class="card-title h5 m-0">Create Product</p>
          </div>

        </div>
      </div>

      {{-- contents --}}
      <div class="card-body">
        <div class="mb-3">
          <label class="form-label" for="product-name">Product Name</label>
          <input class="form-control @error('name') is-invalid @enderror" id="product-name" name="name"
                 form="product-store-form" type="text" value="{{ old('name') }}" />
        </div>
      </div>

      <div class="card-footer px-3 py-2">
        <div class="row align-items-center justify-content-end g-3">

          {{-- create button --}}
          <div class="col-auto">
            <button class="btn btn-sm btn-danger" id="product-show-create-modal-button" data-bs-toggle="modal"
                    data-bs-target="#product-create-confirmation-modal" type="button" title="create product"
                    aria-label="create product">
              <i class="fa-solid fa-sm fa-floppy-disk me-1"></i>
              <span>Create</span>
            </button>
          </div>

          {{-- cancel button --}}
          <div class="col-auto">
            <a class="btn btn-sm btn-secondary" id="product-create-cancel-button" href="{{ route('products.index') }}"
               title="cancel create" aria-label="cancel create">
              <i class="fa-solid fa-sm fa-xmark me-1"></i>
              <span>Cancel</span>
            </a>
          </div>
        </div>
      </div>
    </div>

    {{-- create confirmation modal --}}
    <div class="modal fade" id="product-create-confirmation-modal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Create Confirmation Alert</h5>
            <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Create product?</p>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" data-bs-dismiss="modal" type="button" title="cancel product store"
                    aria-label="cancel product store">Close</button>
            <button class="btn btn-primary" form="product-store-form" type="submit" title="confirm product store"
                    aria-label="confirm product store">
              Save changes
            </button>
          </div>
        </div>
      </div>
    </div>

    <form id="product-store-form" action="{{ route('products.store') }}" method="POST">
      @csrf
    </form>

  </div>
@endsection
