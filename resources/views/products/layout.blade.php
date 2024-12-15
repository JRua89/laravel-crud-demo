@php
    if (!Auth::check()) {
        header("Location: " . route('login'));
        exit;
    }
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 8 CRUD Application</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
    <!-- Header -->
    <header class="bg-primary text-white py-3">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
            <h1 class="mb-0">Welcome {{ ucfirst(Auth::user()->name) }}
            <br></h1>
            @if (Request::routeIs('products.index') || Request::routeIs('products.create') || Request::routeIs('products.edit') || Request::routeIs('products.show')) 
            <!-- Logout Button -->
           

<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-danger">Logout</button>
</form>


            @endif
        </div>
            <nav class="d-flex justify-content-between align-items-center">
                <!-- Optionally, add more navigation items here -->
                @if (Request::routeIs('products.index')) 
                <a class="btn btn-light" href="{{ route('products.create') }}">Create New Product</a>
                @endif
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container my-4">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-3">
        <div class="container text-center">
            <p class="mb-0">© {{ date('Y') }} Laravel 8 CRUD Application. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
