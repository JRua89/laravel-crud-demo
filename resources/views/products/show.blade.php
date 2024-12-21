@extends('products.layout')

@section('content')
    <div class="container my-4">
        <!-- Title and Back Button -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Show Product</h2>
            <a class="btn btn-primary" href="{{ route('products.index') }}"><i class="fas fa-arrow-left"></i> Back</a>
        </div>

        <!-- Product Details -->
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h5 class="card-title">Name:</h5>
                        <p class="card-text">{{ $product->name }}</p>
                    </div>
                    <div class="col-md-6 mb-4">
                        <h5 class="card-title">Details:</h5>
                        <p class="card-text">{{ $product->detail }}</p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="card-title">Price:</h5>
                        <p class="card-text">{{ $product->price }}</p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="card-title">Image:</h5>
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" width="200">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
