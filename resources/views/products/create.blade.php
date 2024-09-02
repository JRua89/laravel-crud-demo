@extends('products.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
       <!-- Title and Back Button -->
       <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Add New Product</h2>
        <a class="btn btn-primary" href="{{ route('products.index') }}"><i class="fas fa-arrow-left"></i> Back</a>
    </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('products.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Detail:</strong>
                <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </div>
    </div>

</form>
@endsection