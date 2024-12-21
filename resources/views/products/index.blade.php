@extends('products.layout')

@section('content')
<div class="row d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2>Laravel 8 CRUD Example</h2>
    </div>
    <div>
        <a class="btn btn-success" href="invoice-pdf"> Download invoice <i class="fa-solid fa-file-pdf"></i></a>
    </div>
</div>


    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td> {{ \Illuminate\Support\Str::limit($product->detail, 150, '...') }}</td>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                    @csrf
                    <button type="button" class="btn btn-danger" onclick="showDeleteModal('{{ route('products.destroy', $product->id) }}', '{{ $product->name }}')">Delete</button>

                </form>
            </td>
        </tr>
        @endforeach

    </table>
    {{ $products->links() }}


    <script>
        // Function to handle the modal trigger
        function showDeleteModal(formAction,productName) {
            var form = document.getElementById('deleteForm');
            var productNameSpan = document.getElementById('productName');
           
            form.reset();
            form.action = formAction;
            
             // Update the modal body with the product name
            productNameSpan.textContent = productName;

            $('#deleteModal').modal('show');
        }
    </script>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this product "<span id="productName"></span>" ?
                </div>
                <div class="modal-footer">
                    <form id="deleteForm" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection