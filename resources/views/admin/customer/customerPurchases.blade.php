@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Invoice</h4>

                        <a href="{{ route('customers.purchases') }}"
                            class="justify-center inline-block float-right px-3 py-2 font-semibold text-white bg-blue-900 rounded-lg hover:bg-blue-800"><i
                                class="fas fa-arrow-left"></i> Back</a>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12">
                                    <div class="invoice-title">
                                        {{-- <h4 class="float-end font-size-16"><strong>Invoice No
                                                #{{ $invoice->invoice_no }}</strong></h4> --}}
                                        <h3 class="flex">
                                            <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="logo"
                                                height="24" width="28" class="mr-2" />Inventory Management System
                                        </h3>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class=" col-6">
                                            <address>
                                                <strong>Inventory Management System</strong><br>
                                                Ilala, Dar-es-Salaam, Tanzania.<br>
                                                support@email.com
                                            </address>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">

                                    <div>
                                        <div class="p-2">
                                            <h3 class="font-size-16"><strong>Invoice Details</strong></h3>
                                        </div>
                                        <div class="">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <td>
                                                                <p>Customer Info</p>
                                                            </td>
                                                            <td>
                                                                <p>Name:
                                                                    <strong>{{ $customer->name }}</strong>
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p>Mobile:
                                                                    <strong>{{ $customer->mobile_no }}</strong>
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p>Email:
                                                                    <strong>{{ $customer->email }}</strong>
                                                                </p>
                                                            </td>

                                                        </tr>
                                                    </thead>

                                                    <thead>
                                                        <tr>

                                                            <th class="text-center">Sl</th>
                                                            <th class="text-center">Invoice No</th>
                                                            <th class="text-center">Date</th>
                                                            <th class="text-center">Due Amount</th>
                                                            <th class="text-center">Total Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $total_sum = '0';
                                                            $total_due = '0';
                                                        @endphp
                                                        @foreach ($payments as $key => $payment)
                                                            <tr>

                                                                <td class="text-center">{{ $key + 1 }}</td>
                                                                <td class="text-center">#{{ $payment->invoice->invoice_no }}
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ date('d-m-Y', strtotime($payment->invoice->date)) }}
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ number_format($payment->due_amount) }}
                                                                </td>

                                                                <td class="text-center">
                                                                    {{ number_format($payment->total_amount) }}</td>
                                                            </tr>
                                                            @php
                                                                $total_sum += $payment->total_amount;
                                                                $total_due += $payment->due_amount;
                                                            @endphp
                                                        @endforeach
                                                        @if ($total_due > 0)
                                                            <tr>
                                                                <td colspan="3"></td>
                                                                <td colspan="1">
                                                                    <h4>Total Due Amount</h4>
                                                                </td>
                                                                <td colspan="2">
                                                                    <h4>Tsh
                                                                        {{ number_format($total_due, 2) }}
                                                                    </h4>
                                                                </td>
                                                            </tr>
                                                        @endif

                                                        <tr>
                                                            <td colspan="3"></td>
                                                            <td colspan="1">
                                                                <h4>Grand Total</h4>
                                                            </td>
                                                            <td colspan="2">
                                                                <h4>Tsh
                                                                    {{ number_format($total_sum, 2) }}
                                                                </h4>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>

                                            @php
                                                $date = new DateTime('now', new DateTimeZone('Africa/Nairobi'));
                                            @endphp
                                            <i>Print Time: {{ $date->format('F j, Y, g:i a') }}</i>
                                            <div class="d-print-none">
                                                <div class="float-end">
                                                    <a href="javascript:window.print()"
                                                        class="btn btn-success waves-effect waves-light"><i
                                                            class="fa fa-print"></i></a>
                                                    <a href="#"
                                                        class="btn btn-primary waves-effect waves-light ms-2">Send</a>
                                                </div>
                                            </div>
                                        </div>
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
