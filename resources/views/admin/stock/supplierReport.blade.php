@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">

                            <h1 class="card-title" style="font-size: 18px; font-weight: 900">Supplier Report</h1>
                            <form action="{{ route('print.supplier.report') }}" method="get" id="myForm">
                                <div class="mt-3 row">
                                    <div class="col-md-8 form-group">
                                        <div class="md-3">
                                            <label for="example-text-input" class="form-label">Supplier Name</label>
                                            <div class="col-sm-12">
                                                <select name="supplier_id" class="form-select select2"
                                                    aria-label="Default select example">
                                                    <option value="">select supplier</option>
                                                    @foreach ($suppliers as $supplier)
                                                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-md-4">
                                        <div class="md-3">
                                            <button type="submit"
                                                class="justify-center px-3 py-2 font-semibold text-white bg-blue-900 rounded-lg mt-7 hover:cursor-pointer addeventmore hover:bg-blue-800">
                                                Search
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>


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
                    supplier_id: {
                        required: true,
                    },


                },
                messages: {
                    supplier_id: {
                        required: 'Please select supplier name',
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
