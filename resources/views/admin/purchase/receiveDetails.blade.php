@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->

            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">



                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <div class="p-2">
                                            <h3 class="font-size-16"><strong>Order Placed Details
                                                    {{-- <span class="btn btn-info">{{ date('d-m-Y', strtotime($start_date)) }}</span> --}}
                                                    {{-- - <span class="btn btn-success">{{ date('d-m-Y', strtotime($end_date)) }}</span> --}}
                                                </strong></h3>
                                        </div>
                                        <div class="">
                                            <div class="table-responsive">
                                                <table class="table">


                                                    <thead>
                                                        <tr>

                                                            <th class="text-center">Purchase no</th>
                                                            <th class="text-center">Product Name</th>
                                                            <th class="text-center">Supplier Name</th>
                                                            <th class="text-center">Quantity</th>
                                                            <th class="text-center">Unit</th>
                                                            <th class="text-center">Price</th>
                                                            {{-- <th class="text-center">Approved By</th> --}}
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>

                                                            <td class="text-center"> {{ $purchase->purchase_no }} </td>
                                                            <td class="text-center"> {{ $purchase->product->name }} </td>
                                                            <td class="text-center"> {{ $purchase->supplier->name }} </td>
                                                            <td class="text-center"> {{ $purchase->buying_qty }} </td>
                                                            <td class="text-center" class="">
                                                                {{ number_format($purchase->unit_price) }}
                                                            </td>
                                                            <td class="text-center">
                                                                {{ number_format($purchase->buying_price) }} </td>
                                                            {{-- <td> {{ $purchase->updated_ }} </td> --}}
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="p-2">
                                                <h3 class="font-size-16"><strong>Received Details
                                                        {{-- <span class="btn btn-info">{{ date('d-m-Y', strtotime($start_date)) }}</span> --}}
                                                        {{-- - <span class="btn btn-success">{{ date('d-m-Y', strtotime($end_date)) }}</span> --}}
                                                    </strong></h3>
                                            </div>
                                            <form action="{{ route('receive.details') }}" method="post" class="mt-4"
                                                id="myForm">
                                                @csrf
                                                <input type="hidden" name="purchase_id" value="{{ $purchase->id }}">
                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">Quantity
                                                        Received</label>
                                                    <div class="col-sm-3 form-group">
                                                        <input class="form-control quantity" type="number" name="quantity"
                                                            id="quantity">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="example-text-input"
                                                        class="col-sm-2 col-form-label">Description</label>
                                                    <div class="col-sm-4 form-group">
                                                        <textarea class="form-control description" type="text" name="description" id="description"></textarea>
                                                        {{-- <textarea name="" id="" cols="30" rows="10"> --}}
                                                    </div>
                                                </div>
                                                <!-- end row -->


                                                <div class="flex justify-end col-sm-6">
                                                    <button type="submit"
                                                        class="px-3 py-2 font-semibold text-white bg-blue-900 rounded-lg hover:bg-blue-800">
                                                        Receive</button>
                                                </div>
                                                <!-- end row -->
                                            </form>
                                            <script type="text/javascript">
                                                $(document).ready(function() {
                                                    $('#myForm').validate({
                                                        rules: {
                                                            quantity: {
                                                                required: true,
                                                            },
                                                            description: {
                                                                required: true,
                                                            },

                                                        },
                                                        messages: {
                                                            quantity: {
                                                                required: 'Please Enter received quatity',
                                                            },
                                                            description: {
                                                                required: 'Please Enter something',
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
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- end row -->

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->



        </div> <!-- container-fluid -->
    </div>
@endsection
