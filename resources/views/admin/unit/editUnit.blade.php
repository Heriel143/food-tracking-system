@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">

                            <h1 class="text-xl font-bold card-title">Update Unit Page</h1>
                            @if (count($errors))
                                @foreach ($errors->all() as $error)
                                    <p class="alert alert-danger">{{ $error }}</p>
                                @endforeach
                            @endif
                            <form action="{{ route('update.unit') }}" method="post" class="mt-4" id="myForm">
                                @csrf
                                <input type="text" class="hidden" name="id" value="{{ $unit->id }}">
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Name:</label>
                                    <div class="col-sm-8 form-group">
                                        <input class="form-control" type="text" name="name"
                                            value="{{ $unit->name }}" id="name">
                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="px-3 py-2 font-semibold text-white bg-blue-900 rounded-lg hover:bg-blue-800">Update
                                        Unit</button>
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

                },
                messages: {
                    name: {
                        required: 'Please Enter Unit name',
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
