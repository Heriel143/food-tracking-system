@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h1 class="card-title" style="font-size: 18px; font-weight: 900">Add Invoice Page</h1>
                            <div class="mt-3 row">
                                <div class="col-md-2">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Invoice No</label>
                                        <input name="invoice_no" class="bg-gray-400 form-control example-date-input"
                                            type="text" id="invoice_no" value="{{ $invoice_no }}" readonly>
                                    </div>
                                </div>
                                <div class="pb-3 col-md-3">

                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Customer
                                            Name</label>
                                        <select name="customer_id" id="customer_id" class="form-select select2"
                                            aria-label="Default select example">
                                            <option selected="">select</option>
                                            @foreach ($customers as $customer)
                                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="-ml-3 col-md-2">
                                    <div class="pt-[29px] md-3">
                                        <a href="{{ route('add.customer') }}"
                                            class="justify-center inline-block float-right px-3 py-2 font-semibold text-white bg-blue-900 rounded-lg hover:bg-blue-800">

                                            <i class="fas fa-plus-circle">
                                                New
                                                Customer</i>
                                        </a>


                                    </div>
                                </div>
                                <div class=" col-md-4">


                                </div>
                                <div class="col-md-2">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Date</label>
                                        <input name="date" value="{{ $date }}"
                                            class="form-control example-date-input" type="date" id="date">
                                    </div>
                                </div>


                                {{-- <div class="col-md-3">

                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Category
                                            Name</label>
                                        <select name="category_id" class="form-select select2"
                                            aria-label="Default select example" id="category_id">
                                            <option selected="">select</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}
                                <div class="col-md-3">

                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Product
                                            Name</label>
                                        <select name="product_id" id="product_id" class="form-select select2"
                                            aria-label="Default select example">
                                            <option selected="">select</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">

                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Stock
                                            (PCS/KG)</label>
                                        <input type="text" id="stock" name='stock' readonly
                                            class="bg-gray-400 stock form-control">

                                        </select>
                                    </div>
                                </div>

                                <div class="-ml-16 col-md-2">
                                    <div class="pt-[29px] md-3">
                                        <span
                                            class="justify-center inline-block float-right px-3 py-2 font-semibold text-white bg-blue-900 rounded-lg hover:cursor-pointer addeventmore hover:bg-blue-800">

                                            <i class="fas fa-plus-circle">
                                                Add
                                                More</i>
                                        </span>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('store.invoice') }}" method="post">
                                @csrf
                                <table class="border-blue-900 table-sm table-bordered" width="100%">
                                    <thead>
                                        <tr>
                                            {{-- <th>Category</th> --}}
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Total Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="addRow" id="addRow">

                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td class="text-xl font-bold text-center ">Discount</td>
                                            <td>
                                                <input type="number" name="discount_amount" id="discount_amount"
                                                    class="form-control discount_amount" placeholder="Discount Amount">
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td class="text-xl font-bold text-center ">Grand Total</td>
                                            <td>
                                                <input type="text" name="estimated_amount" value="0"
                                                    id="estimated_amount" class="bg-gray-400 form-control estimated_amount"
                                                    readonly>
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tbody>

                                </table>
                                <br>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <textarea name="description" class="h-20 form-control" id="description" cols="30" rows="10"
                                            placeholder="Write description here"></textarea>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="">Paid Status</label>
                                        <select name="paid_status" id="paid_status" class="form-select">
                                            <option value="">select</option>
                                            <option value="full_paid">Full Paid</option>
                                            <option value="partial_paid">Partial Paid</option>
                                            <option value="full_due">Full Due</option>
                                        </select>
                                        <input type="number" name="paid_amount" class="hidden form-control paid_amount"
                                            placeholder="Enter Paid Amount" style="display: none">
                                    </div>
                                </div>

                                <div class="flex justify-end form-group">
                                    <button type="submit"
                                        class="px-3 py-2 font-semibold text-white bg-blue-900 rounded-lg hover:bg-blue-800">Add
                                        Invoice</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
    </div>
    <script id="document-template" type="text/x-handlebars-template">
        <tr class = "delete_add_more_item"
        id = "delete_add_more_item" >
            <input type = "hidden"
        name = "date"
        value = "@{{ date }}">
            <input type = "hidden"
        name = "customer_id"
        value = "@{{ customer_id }}">
            <input type = "hidden"
        name = "invoice_no"
        value = "@{{ invoice_no }}" >
            
            
            
            <td >
            <input type = "hidden"
        name = "product_id[]"
        value = "@{{ product_id }}" >
            @{{ product_name }} 
            </td> 
            <td >
            <input type = "number"
        min = "1"
        class = "text-left form-control selling_qty"
        name = "selling_qty[]"
        value = "" >
            
            </td> 
        <td >
            
            <input type = "number"
        class = "text-left form-control unit_price"
        name = "unit_price[]"
        value = "" >
            
        </td> 
        
        <td >
            
            <input type = "number"
        class = "text-left form-control selling_price"
        name = "selling_price[]"
        value = "0"
        readonly >
            
        </td> 
        <td >
            
            <i class = "btn btn-danger btn-sm fas fa-window-close removeeventmore" > </i> 
                </td > 
            </tr>
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '.addeventmore', function() {
                var date = $('#date').val();
                var invoice_no = $('#invoice_no').val();
                // var category_id = $('#category_id').val();
                var customer_id = $('#customer_id').val();
                var category_name = $('#category_id').find('option:selected').text();
                var product_id = $('#product_id').val();
                var product_name = $('#product_id').find('option:selected').text();

                if (date == '') {
                    $.notify('Date is required', {
                        globalPosition: 'top right',
                        className: 'error'
                    })
                    return false;
                }
                if (invoice_no == '') {
                    $.notify('Invoice No is required', {
                        globalPosition: 'top right',
                        className: 'error'
                    })
                    return false;
                }

                // if (category_id == '') {
                //     $.notify('Category is required', {
                //         globalPosition: 'top right',
                //         className: 'error'
                //     })
                //     return false;
                // }
                if (customer_id == '') {
                    $.notify('Customer is required', {
                        globalPosition: 'top right',
                        className: 'error'
                    })
                    return false;
                }
                if (product_id == '') {
                    $.notify('Product is required', {
                        globalPosition: 'top right',
                        className: 'error'
                    })
                    return false;
                }

                var source = $('#document-template').html();
                var tamplate = Handlebars.compile(source);
                var data = {
                    date: date,
                    invoice_no: invoice_no,
                    // category_id: category_id,
                    customer_id: customer_id,
                    // category_name: category_name,
                    product_id: product_id,
                    product_name: product_name
                };
                var html = tamplate(data);
                $('#addRow').prepend(html);

            });

            $(document).on('click', '.removeeventmore', function(event) {
                $(this).closest('.delete_add_more_item').remove();
                totalAmountPrice();
            });

            $(document).on('keyup click', '.unit_price,.selling_qty', function() {
                var unit_price = $(this).closest('tr').find('input.unit_price').val();
                var qty = $(this).closest('tr').find('input.selling_qty').val();
                var total = unit_price * qty;
                $(this).closest('tr').find('input.selling_price').val(total);
                // $('#discount_amount').trigger('keyup');
                totalAmountPrice();
            });

            $(document).on('keyup', '#discount_amount', function() {
                totalAmountPrice();
            })

            function totalAmountPrice() {
                var sum = 0;
                $('.selling_price').each(function() {
                    var value = $(this).val();
                    if (!isNaN(value) && value.length != 0) {
                        sum += parseFloat(value);
                    }
                });
                var discount = parseFloat($('#discount_amount').val());
                if (!isNaN(discount) && discount.length != 0) {
                    sum -= parseFloat(discount);
                }

                $('#estimated_amount').val(sum);
            }

        })
    </script>

    <script type="text/javascript">
        $(function() {
            $(document).on('change', '#product_id', function() {
                var product_id = $(this).val();
                // var category_id = $('#category_id').val();
                $.ajax({
                    url: "{{ route('get-stock') }}",
                    type: 'GET',
                    data: {
                        // category_id: category_id,
                        product_id: product_id
                    },
                    success: function(data) {
                        // var html = '<option value="">Select Category</option>';
                        // $.each(data, function(key, v) {
                        //     html += '<option value="' + v.category_id +
                        //         '">' + v.category.name + '</option>'
                        // });
                        // console.log(data[0].quantity);
                        $('#stock').val(data[0].quantity);
                    }
                })
            })
        })
    </script>
    <script type="text/javascript">
        $(function() {
            $(document).on('change', '#category_id', function() {
                var category_id = $(this).val();
                $.ajax({
                    url: "{{ route('get-product-invoice') }}",
                    type: 'GET',
                    data: {
                        category_id: category_id,
                    },
                    success: function(data) {
                        var html = '<option value="">Select Product</option>';
                        $.each(data, function(key, v) {
                            html += '<option value="' + v.id +
                                '">' + v.name + '</option>'
                        });
                        $('#product_id').html(html);
                    }
                })
            })
        })
    </script>
    <script type="text/javascript">
        $(document).on('change', '#paid_status', function() {
            var paid_status = $(this).val();
            if (paid_status == 'partial_paid') {
                $('.paid_amount').show();
            } else {
                $('.paid_amount').hide();
            }
        });
    </script>
@endsection
