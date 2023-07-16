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

                        <a href="{{ route('credit.customers') }}"
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
                                        <h4 class="float-end font-size-16"><strong>Invoice No
                                                #{{ $invoice->invoice_no }}</strong></h4>
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
                                        <div class=" col-6 text-end">
                                            <address>
                                                <strong>Invoice Date:</strong><br>
                                                {{ date('d-m-Y', strtotime($invoice->date)) }}<br><br>
                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <form id="myForm" action="{{ route('update.customer.invoice', $invoice->id) }}"
                                        method="POST">
                                        @csrf
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
                                                                        <strong>{{ $invoice->payment->customer->name }}</strong>
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p>Mobile:
                                                                        <strong>{{ $invoice->payment->customer->mobile_no }}</strong>
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p>Email:
                                                                        <strong>{{ $invoice->payment->customer->email }}</strong>
                                                                    </p>
                                                                </td>

                                                            </tr>
                                                        </thead>

                                                        <thead>
                                                            <tr>

                                                                <th class="text-center">Sl</th>
                                                                {{-- <th class="text-center">Category</th> --}}
                                                                <th class="text-center">Product Name</th>
                                                                <th class="text-center">Quatity</th>
                                                                <th class="text-center">Unit Price</th>
                                                                <th class="text-center">Total Price</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $total_sum = '0';
                                                            @endphp
                                                            @foreach ($invoice->invoiceDetail as $key => $details)
                                                                <tr>

                                                                    <td class="text-center">{{ $key + 1 }}</td>
                                                                    {{-- <td class="text-center">{{ $details->category->name }} --}}
                                                                    </td>
                                                                    <td class="text-center">{{ $details->product->name }}
                                                                    </td>
                                                                    <td class="text-center">{{ $details->selling_qty }}
                                                                    </td>
                                                                    <td class="text-center">
                                                                        {{ number_format($details->unit_price) }}</td>
                                                                    <td class="text-center">
                                                                        {{ number_format($details->selling_price) }}</td>
                                                                </tr>
                                                                @php
                                                                    $total_sum += $details->selling_price;
                                                                @endphp
                                                            @endforeach
                                                            <tr>
                                                                <td colspan="3"></td>
                                                                <td colspan="1">Sub Total</td>
                                                                <td class="text-center">{{ number_format($total_sum) }}
                                                                </td>
                                                            </tr>
                                                            @if ($invoice->payment->discount_amount)
                                                                <tr>
                                                                    <td colspan="3"></td>
                                                                    <td colspan="1">Discount</td>
                                                                    <td class="text-center">
                                                                        {{ number_format($invoice->payment->discount_amount) }}
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                            <tr>
                                                                <td colspan="3"></td>
                                                                <td colspan="1">Paid Amount</td>
                                                                <td class="text-center">
                                                                    {{ number_format($invoice->payment->paid_amount) }}
                                                                </td>
                                                            </tr>
                                                            @if ($invoice->payment->due_amount)
                                                                <tr>
                                                                    <td colspan="3"></td>
                                                                    <td colspan="1">Due Amount</td>
                                                                    <input type="hidden" name="due_amount"
                                                                        value="{{ $invoice->payment->due_amount }}">
                                                                    <td class="text-center">
                                                                        {{ number_format($invoice->payment->due_amount) }}
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
                                                                        {{ number_format($invoice->payment->total_amount, 2) }}
                                                                    </h4>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="6" class="text-lg font-bold text-center">
                                                                    Payment Summary
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"></td>
                                                                <td class="text-center">Date</td>
                                                                <td class="text-center">
                                                                    Amount
                                                                </td>
                                                                <td colspan="1"></td>
                                                            </tr>
                                                            @foreach ($invoice->paymentDetail as $key => $item)
                                                                <tr>
                                                                    <td colspan="2"></td>
                                                                    <td class="text-center">
                                                                        {{ date('d-m-Y', strtotime($item->date)) }}</td>
                                                                    {{-- dd($item->date); --}}
                                                                    <td class="text-center">
                                                                        {{ number_format($item->current_paid_amount) }}
                                                                    </td>
                                                                    <td colspan="1"></td>
                                                                </tr>
                                                            @endforeach
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
                                    </form>
                                </div>

                            </div>
                        </div> <!-- end row -->

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->



    </div> <!-- container-fluid -->
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    paid_status: {
                        required: true,
                    },
                    paid_amount: {
                        required: true,
                    },
                    date: {
                        required: true,
                    },


                },
                messages: {
                    paid_status: {
                        required: 'Please Select Paid Status',
                    },
                    paid_amount: {
                        required: 'Please Enter Paid Amount',
                    },
                    date: {
                        required: 'Please select Date',
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
    <script type="text/javascript">
        $(function() {

            $(document).on('change', '#paid_status', function() {
                var paid_status = $(this).val();
                if (paid_status == 'partial_paid') {
                    $('.paid_amount').show();
                    console.log(paid_status);
                } else {
                    $('.paid_amount').hide();
                }
            });
        })
    </script>
@endsection
