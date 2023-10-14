@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">All Regions</h4>



                    </div>
                </div>
            </div>

            <!-- start page title -->

            <!-- end page title -->

            <div class="flex row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">

                            <div class="pb-4">



                                <h4 class="text-base font-semibold">All Regions Data </h4>
                            </div>


                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th class="w-1/5">Sl</th>
                                        <th>Name</th>

                                        <th class="w-1/5">Action</th>

                                </thead>


                                <tbody>

                                    @foreach ($regions as $key => $region)
                                        <tr>
                                            <td> {{ $key + 1 }} </td>
                                            <td> {{ $region->name }} </td>


                                            <td class="flex justify-around">
                                                <a href="{{ route('edit.region', $region->id) }}" class="btn btn-info sm"
                                                    title="Edit Data"> <i class="fas fa-edit"></i>
                                                </a>

                                                <a href="{{ route('delete.region', $region->id) }}"
                                                    class="btn btn-danger sm" title="Delete Data" id="delete"> <i
                                                        class="fas fa-trash-alt"></i>
                                                </a>

                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="text-base font-semibold">Add Region</h6>
                            @if (count($errors))
                                @foreach ($errors->all() as $error)
                                    <p class="alert alert-danger">{{ $error }}</p>
                                @endforeach
                            @endif
                            <form action="{{ route('store.region') }}" method="post" class="mt-4" id="myForm">
                                @csrf
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Name:</label>
                                    <div class="col-sm-8 form-group">
                                        <input class="form-control" type="text" name="name" id="name">
                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="px-3 py-2 font-semibold text-white bg-blue-900 rounded-lg hover:bg-blue-800"><i
                                            class="fas fa-plus-circle"></i> Add
                                        Region</button>
                                </div>
                                <!-- end row -->
                            </form>


                        </div>
                    </div>
                </div><!-- end col -->
            </div> <!-- end row -->
            <div class="row">
                <!-- end col -->
            </div>


        </div> <!-- container-fluid -->
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
                        required: 'Please enter Region name',
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
