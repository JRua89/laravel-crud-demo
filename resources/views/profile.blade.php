@extends('products.layout')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
<div class="container my-4">
       <!-- Title and Back Button -->
       <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Welcome to your Profile</h2>
        <a class="btn btn-primary" href="{{ route('products.index') }}"><i class="fas fa-arrow-left"></i> Back</a>

     
    </div>
    </div>
    <h1>Welcome, {{ Auth::user()->name }}</h1>

<p><strong>Email:</strong> {{ Auth::user()->email }}</strong></p>
</body>
</html>
@endsection