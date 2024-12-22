@extends('products.layout')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendors</title>
</head>
<body>
<div class="container my-4">
    <!-- Title and Back Button -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Vendors</h2>
        <a class="btn btn-primary" href="{{ route('products.index') }}"><i class="fas fa-arrow-left"></i> Back</a>
    </div>
    <a class="btn btn-success mb-4" href="invoice-pdf"> Download products <i class="fa-solid fa-file-pdf"></i></a>
    <!-- Vendors Table -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
              
            </tbody>
        </table>
    </div>

</div>
</body>
</html>
@endsection
