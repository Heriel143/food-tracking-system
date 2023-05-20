@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">

                            <h1 class="text-xl font-bold card-title">Edit Product Page</h1>
                            @if (count($errors))
                                @foreach ($errors->all() as $error)
                                    <p class="alert alert-danger">{{ $error }}</p>
                                @endforeach
                            @endif
                            <form action="{{ route('update.product') }}" method="post" class="mt-4" id="myForm">
                                @csrf
                                <input type="text" class="hidden" name="id" value="{{ $product->id }}">
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Name:</label>
                                    <div class="col-sm-8 form-group">
                                        <input class="form-control" value="{{ $product->name }}" type="text"
                                            name="name" id="name">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Supplier Name</label>
                                    <div class="col-sm-8">
                                        <select name="supplier_id" class="form-select" aria-label="Default select example">
                                            <option selected="">select supplier</option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}"
                                                    {{ $supplier->id == $product->supplier_id ? 'selected' : '' }}>
                                                    {{ $supplier->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Category Name</label>
                                    <div class="col-sm-8">
                                        <select name="category_id" class="form-select" aria-label="Default select example">
                                            <option selected="">select category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Unit Name</label>
                                    <div class="col-sm-8">
                                        <select name="unit_id" class="form-select" aria-label="Default select example">
                                            <option selected="">select unit</option>
                                            @foreach ($units as $unit)
                                                <option value="{{ $unit->id }}"
                                                    {{ $unit->id == $product->unit_id ? 'selected' : '' }}>
                                                    {{ $unit->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="px-3 py-2 font-semibold text-white bg-blue-900 rounded-lg hover:bg-blue-800">Update
                                        Product</button>
                                </div>
                                <!-- end row -->
                            </form>


                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    supplier_id: {
                        required: true,
                    },
                    category_id: {
                        required: true,
                    },
                    unit_id: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: 'Please Enter Product name',
                    },
                    supplier_id: {
                        required: 'Please select supplier name',
                    },
                    category_id: {
                        required: 'Please select category name',
                    },
                    unit_id: {
                        required: 'Please select unit name',
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
@endsection
