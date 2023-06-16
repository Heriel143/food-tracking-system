@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Approval Purchases</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="pb-4">

                                {{-- <a href="{{ route('add.purchase') }}"
                                    class="justify-center inline-block float-right px-3 py-2 font-semibold text-white bg-blue-900 rounded-lg hover:bg-blue-800">Add
                                    Purchase</a> --}}

                                <h4 class="text-base font-semibold">Purchase Data </h4>
                            </div>


                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Purchase No.</th>
                                        <th>Product Name</th>
                                        <th>Date</th>
                                        <th>Supplier</th>
                                        <th>category</th>
                                        <th>Qty</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                </thead>


                                <tbody>

                                    @foreach ($purchases as $key => $purchase)
                                        <tr>
                                            <td class=""> {{ $key + 1 }} </td>
                                            <td> {{ $purchase->purchase_no }} </td>
                                            <td> {{ $purchase->product->name }} </td>
                                            <td> {{ date('d-m-Y', strtotime($purchase->date)) }} </td>
                                            <td> {{ $purchase->supplier->name }} </td>
                                            <td> {{ $purchase->category->name }} </td>
                                            <td> {{ $purchase->buying_qty }} </td>
                                            <td>
                                                @if ($purchase->status == '0')
                                                    <span class="btn btn-warning ">Pending</span>
                                                @elseif($purchase->status == '1')
                                                    <span class="btn btn-success ">Approved</span>
                                                @endif
                                            </td>


                                            <td>
                                                @if ($purchase->status == '0')
                                                    <a href="{{ route('approve.purchase', $purchase->id) }}"
                                                        class="btn btn-danger sm" title="Approve!" id="ApproveBtn"> <i
                                                            class="fas fa-check-circle "></i>
                                                    </a>
                                                @endif
                                            </td>

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
