@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"> Invoice Approve</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="pb-4">
                                <h3>Invoice No: #{{ $invoice->invoice_no }} - {{ date('d/m/Y', strtotime($invoice->date)) }}
                                </h3>
                                <a href="{{ route('pending.invoices') }}"
                                    class="justify-center inline-block float-right px-3 py-2 mb-2 font-semibold text-white bg-blue-900 rounded-lg hover:bg-blue-800">
                                    <i class="fas fa-list"></i> Pending
                                    Invoice List</a>

                            </div>
                            <table class="table table-dark" width='100%'>
                                <tbody>
                                    <tr>
                                        <td>
                                            <p>Customer Info</p>
                                        </td>
                                        <td>
                                            <p>Name: <strong>{{ $invoice->payment->customer->name }}</strong> </p>
                                        </td>
                                        <td>
                                            <p>Mobile: <strong>{{ $invoice->payment->customer->mobile_no }}</strong> </p>
                                        </td>
                                        <td>
                                            <p>Email: <strong>{{ $invoice->payment->customer->email }}</strong> </p>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="3">
                                            <p>Description: <strong>{{ $invoice->description }}</strong> </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <form action="{{ route('store.approval', $invoice->id) }}" method="POST">
                                @csrf
                                <table class="table table-dark" width='100%'>
                                    <thead>
                                        <tr>

                                            <th class="text-center">Sl</th>
                                            {{-- <th class="text-center">Category</th> --}}
                                            <th colspan="2" class="text-center">Product Name</th>
                                            <th class="text-center">Current Stock</th>
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
                                                <input type="hidden" name="category_id[]"
                                                    value="{{ $details->category_id }}">
                                                <input type="hidden" name="product_id[]"
                                                    value="{{ $details->product_id }}">
                                                <input type="hidden" name="selling_qty[{{ $details->id }}]"
                                                    value="{{ $details->selling_qty }}">
                                                <td class="text-center">{{ $key + 1 }}</td>
                                                {{-- <td class="text-center">{{ $details->category->name }}</td> --}}
                                                <td colspan="2" class="text-center">{{ $details->product->name }}</td>
                                                @if ($details->product->quantity >= $details->selling_qty)
                                                    <td class="text-center" style="background-color: blue">
                                                        {{ $details->product->quantity }}</td>
                                                @endif
                                                @if ($details->product->quantity < $details->selling_qty)
                                                    <td class="text-center" style="background-color: rgb(227, 85, 111)">
                                                        {{ $details->product->quantity }}</td>
                                                @endif
                                                <td class="text-center">{{ $details->selling_qty }}</td>
                                                <td class="text-center">{{ number_format($details->unit_price) }}</td>
                                                <td class="text-center">{{ number_format($details->selling_price) }}</td>
                                            </tr>
                                            @php
                                                $total_sum += $details->selling_price;
                                            @endphp
                                        @endforeach
                                        <tr>
                                            <td colspan="4"></td>
                                            <td colspan="2">Sub Total</td>
                                            <td>{{ number_format($total_sum) }}</td>
                                        </tr>
                                        @if ($invoice->payment->discount_amount)
                                            <tr>
                                                <td colspan="4"></td>
                                                <td colspan="2">Discount</td>
                                                <td>{{ number_format($invoice->payment->discount_amount) }}
                                                </td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <td colspan="4"></td>
                                            <td colspan="2">Paid Amount</td>
                                            <td>{{ number_format($invoice->payment->paid_amount) }}</td>
                                        </tr>
                                        @if ($invoice->payment->due_amount)
                                            <tr>
                                                <td colspan="4"></td>
                                                <td colspan="2">Due Amount</td>
                                                <td>{{ number_format($invoice->payment->due_amount) }}</td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <td colspan="4"></td>
                                            <td colspan="1">
                                                <h4 class="text-white">Grand Total</h4>
                                            </td>
                                            <td colspan="2">
                                                <h4 class="text-white">Tsh
                                                    {{ number_format($invoice->payment->total_amount, 2) }}
                                                </h4>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="submit"
                                    class="float-right px-3 py-2 text-white bg-blue-900 rounded-lg hover:bg-blue-800">Approve
                                    Invoice</button>
                            </form>



                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->



        </div> <!-- container-fluid -->
    </div>
@endsection
