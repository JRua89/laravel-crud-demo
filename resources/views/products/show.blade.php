@extends('products.layout')

@section('content')
    <div class="container my-4">
        <!-- Title and Back Button -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Show Product</h2>
            <a class="btn btn-primary" href="{{ route('products.index') }}">Back</a>
        </div>

        <!-- Product Details -->
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <h5 class="card-title">Name:</h5>
                        <p class="card-text">{{ $product->name }}</p>
                    </div>
                    <div class="col-md-8">
                        <h5 class="card-title">Details:</h5>
                        <p class="card-text">{{ $product->detail }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
