@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">INCOMPLETE RECEIVED PURCHASES
                        </h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="pb-4">

                                <a href="{{ route('print.incomplete.purchase') }}"
                                    class="justify-center inline-block float-right px-3 py-2 font-semibold text-white bg-blue-900 rounded-lg hover:bg-blue-800">
                                    <i class="fas fa-plus-circle"></i>Print List
                                </a>

                                <h4 class="text-base font-semibold"> </h4>
                            </div>


                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        {{-- <th>Sl</th> --}}
                                        <th>P No.</th>
                                        <th>Product Name</th>
                                        <th>Received Date</th>
                                        <th>Supplier</th>
                                        <th>Received</th>
                                        <th>Expected</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        {{-- <th>Action</th> --}}

                                </thead>


                                <tbody>

                                    @foreach ($purchases as $key => $purchase)
                                        <tr>
                                            {{-- <td class=""> {{ $key + 1 }} </td> --}}
                                            <td> {{ $purchase->purchase_id }} </td>
                                            <td> {{ $purchase->purchase->product->name }} </td>
                                            <td> {{ date('d-m-Y', strtotime($purchase->created_at)) }} </td>
                                            <td> {{ $purchase->purchase->supplier->name }} </td>
                                            {{-- <td> {{ $purchase->user->name }} </td> --}}
                                            <td> {{ $purchase->amount }} </td>
                                            <td> {{ number_format($purchase->purchase->buying_qty) }} </td>
                                            <td> {{ number_format($purchase->purchase->buying_price) }} </td>
                                            <td> {{ $purchase->description }} </td>


                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->



        </div> <!-- container-fluid -->
    </div>
@endsection
