@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">All Credit Customers</h4>



                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="pb-4">

                                <a href="{{ route('print.credit.customers') }}"
                                    class="justify-center inline-block float-right px-3 py-2 font-semibold text-white bg-blue-900 rounded-lg hover:bg-blue-800"><i
                                        class="fas fa-print"></i> Print Report
                                </a>

                                <h4 class="text-base font-semibold">All Credit Customers Data</h4>
                            </div>


                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Customer Name</th>
                                        <th>Invoice No</th>
                                        <th>Date</th>
                                        <th>Due Amount</th>
                                        <th>Action</th>

                                </thead>


                                <tbody>

                                    @foreach ($payments as $key => $payment)
                                        <tr>
                                            <td class=""> {{ $key + 1 }} </td>
                                            <td> {{ $payment->customer->name }} </td>
                                            <td> #{{ $payment->invoice->invoice_no }} </td>
                                            <td> {{ date('d-m-Y', strtotime($payment->invoice->date)) }} </td>
                                            <td> {{ number_format($payment->due_amount) }} </td>


                                            <td>
                                                <a href="{{ route('edit.customer.invoice', $payment->invoice->id) }}"
                                                    class="btn btn-info sm" title="Edit Data"> <i class="fas fa-edit"></i>
                                                </a>

                                                <a href="{{ route('view.customer.invoice', $payment->invoice->id) }}"
                                                    class="btn btn-success sm" title="View Invoice" id="view"> <i
                                                        class="fas fa-eye"></i>
                                                </a>

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
