@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Stock Report</h4>



                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="pb-4">

                                <a href="{{ route('print.stock.report') }}"
                                    class="justify-center inline-block float-right px-3 py-2 font-semibold text-white bg-blue-900 rounded-lg hover:bg-blue-800"><i
                                        class="fas fa-print"></i> Print Stock Report</a>

                                <h4 class="text-base font-semibold">All Stock Products </h4>
                            </div>


                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Supplier</th>
                                        <th>Category</th>
                                        <th>Product Name</th>
                                        <th>Unit</th>
                                        <th>In Qty</th>
                                        <th>Out Qty</th>
                                        <th>Stock</th>
                                        {{-- <th>Action</th> --}}

                                </thead>


                                <tbody>

                                    @foreach ($products as $key => $product)
                                        @php
                                            $total_buying = App\Models\Purchase::where('product_id', $product->id)
                                                ->where('status', '1')
                                                ->sum('buying_qty');
                                            $total_selling = App\Models\InvoiceDetail::where('product_id', $product->id)
                                                ->where('status', '1')
                                                ->sum('selling_qty');
                                        @endphp
                                        <tr>
                                            <td class=""> {{ $key + 1 }} </td>
                                            <td> {{ $product->supplier->name }} </td>
                                            <td> {{ $product->category->name }} </td>
                                            <td> {{ $product->name }} </td>
                                            <td> {{ $product->unit->name }} </td>
                                            <td> {{ $total_buying }} </td>
                                            <td> {{ $total_selling }} </td>
                                            <td> {{ $product->quantity }} </td>


                                            {{-- <td>
                                                <a href="{{ route('edit.product', $product->id) }}" class="btn btn-info sm"
                                                    title="Edit Data"> <i class="fas fa-edit"></i>
                                                </a>

                                                <a href="{{ route('delete.product', $product->id) }}"
                                                    class="btn btn-danger sm" title="Delete Data" id="delete"> <i
                                                        class="fas fa-trash-alt"></i>
                                                </a>

                                            </td> --}}

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
