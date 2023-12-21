@extends('layouts.admin.admin')

@section('title')
    Orders
@endsection

@section('content')
    <div class="all-content-wrapper">
        <div class="header-advance-area">
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="breadcome-heading">
                                            <h3>Order</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-end">
                                        <a class="btn btn-white" href="#" download>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 18 18" fill="none">
                                                <path
                                                    d="M2.70117 11.4142L2.70117 14.1936C2.70117 14.6148 2.86711 15.0188 3.16248 15.3167C3.45785 15.6145 3.85846 15.7818 4.27617 15.7818H13.7262C14.1439 15.7818 14.5445 15.6145 14.8399 15.3167C15.1352 15.0188 15.3012 14.6148 15.3012 14.1936V11.4142M9.00205 2.2168V11.2168M9.00205 11.2168L12.602 7.77793M9.00205 11.2168L5.40205 7.77793"
                                                    stroke-width="1.63636" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            Export
                                        </a>
                                        <a class="btn btn-primary ms-3 add-order">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 20 20" fill="none">
                                                <path d="M9.99935 4.16699V15.8337M4.16602 10.0003H15.8327" stroke="white"
                                                    stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            Add Order
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mg-b-23">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body table-responsive p-0">
                                    <table id="order-table-id" class="order-table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Year</th>
                                                <th>Company</th>
                                                <th>Product</th>
                                                <th>Oredr Date</th>
                                                <th>Discount 1</th>
                                                <th>Discount 2</th>
                                                <th>Discount 3</th>
                                                <th>HSN Code</th>
                                                <th>GST(%)</th>
                                                <th>Net Payable Amount</th>
                                                <th>Total Payment</th>
                                                <th>Is Active</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade order-modal" id="ajaxModel" tabindex="-1" aria-labelledby="suppliertabs"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title" id="suppliertabs">Add Oredr</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row" method="post" enctype="multipart/form-data" id="orderform">
                                @csrf
                                <input type="hidden" name="order_id" id="orderid" value="">
                                {{-- <div class="col-lg-6">
                                    <label class="form-label">Year</label>
                                    <select class="form-select" name="year_master_id" id="year_master_id">
                                        <option value="">Select</option>
                                        @foreach ($yearMaster as $value)
                                            <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger" id="year_master_id_error"></span>
                                </div> --}}
                                <div class="col-lg-4">
                                    <label class="form-label">Oredr Date</label>
                                    <input type="date" class="form-control" id="order_date" name="order_date"
                                        placeholder="Enter Oredr Date">
                                    <span class="text-danger" id="order_date_error"></span>
                                </div>
                                <div class="col-lg-4">
                                    <label class="form-label">Company</label>
                                    <select class="form-select" name="company" id="company">
                                        <option value="">Select Company</option>
                                        @foreach ($accountMaster as $value)
                                            <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger" id="company_error"></span>
                                </div>
                                <div class="col-lg-4">
                                    <label class="form-label">Product</label>
                                    <select class="form-select" name="product" id="product">
                                        <option value="">Select Product</option>
                                        @foreach ($productMaster as $value)
                                            <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger" id="product_error"></span>
                                </div>
                                <div class="col-lg-4">
                                    <label class="form-label">Number Of Bottle</label>
                                    <input type="number" class="form-control" id="number_of_bottle" name="number_of_bottle"
                                        placeholder="Enter number of bottle to order" onchange="calculation()" />
                                    <span class="text-danger" id="number_of_bottle_error"></span>
                                </div>
                                <div class="col-lg-4">
                                    <label class="form-label">Company Rate(Per KG)</label>
                                    <input type="number" class="form-control" id="company_rate_per_kg"
                                        name="company_rate_per_kg" placeholder="Enter Company Rate(Per KG)"
                                        onchange="calculation()" />
                                    <span class="text-danger" id="company_rate_per_kg_error"></span>
                                </div>
                                <div class="col-lg-4">
                                    <label class="form-label">Weight For Single Bottle(KG)</label>
                                    <input type="number" class="form-control" id="weight_for_single_bottle"
                                        name="weight_for_single_bottle" readonly onchange="calculation()" />
                                    <span class="text-danger" id="weight_for_single_bottle_error"></span>
                                </div>
                                <div class="col-lg-4">
                                    <label class="form-label">Total Weight For Bottle(KG)</label>
                                    <input type="number" class="form-control" id="total_weight_for_bottle"
                                        name="total_weight_for_bottle" readonly>
                                    <span class="text-danger" id="total_weight_for_bottle_error"></span>
                                </div>
                                <div class="col-lg-4">
                                    <label class="form-label">Discount 1</label>
                                    <input type="text" class="form-control" id="discount_1" name="discount_1"
                                        placeholder="Enter Discount 1" value="0" onchange="calculation()" />
                                    <span class="text-danger" id="discount_1_error"></span>
                                </div>
                                <div class="col-lg-4">
                                    <label class="form-label">Discount 2</label>
                                    <input type="text" class="form-control" id="discount_2" name="discount_2"
                                        placeholder="Enter Discount 2" value="0" onchange="calculation()" />
                                    <span class="text-danger" id="discount_2_error"></span>
                                </div>
                                <div class="col-lg-4">
                                    <label class="form-label">Discount 3</label>
                                    <input type="text" class="form-control" id="discount_3" name="discount_3"
                                        placeholder="Enter Discount 3" value="0" onchange="calculation()" />
                                    <span class="text-danger" id="discount_3_error"></span>
                                </div>
                                <div class="col-lg-4">
                                    <label class="form-label">HSN Code</label>
                                    <select class="form-select" name="hsn_code" id="hsn_code">
                                        <option value="">Select</option>
                                        @foreach ($hsnCode as $value)
                                            <option value="{{ $value['id'] }}">{{ $value['hsn_code'] }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger" id="hsn_code_error"></span>
                                </div>
                                <div class="col-lg-4">
                                    <label class="form-label">GST</label>
                                    <select class="form-select" name="gst_percentage" id="gst_percentage">
                                        <option value="">Select</option>
                                        @foreach ($gstMaster as $value)
                                            <option value="{{ $value['id'] }}">{{ $value['percentage'] }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger" id="gst_percentage_error"></span>
                                </div>
                                <div class="col-lg-4">
                                    <label class="form-label">Total Amount</label>
                                    <input type="text" class="form-control" id="total_payable_amount"
                                        name="total_payable_amount" readonly />
                                    <span class="text-danger" id="total_payable_amount_error"></span>
                                </div>
                                <div class="col-lg-4">
                                    <label class="form-label">Net Payable Amount</label>
                                    <input type="text" class="form-control" id="net_payable_amount"
                                        name="net_payable_amount" readonly />
                                    <span class="text-danger" id="net_payable_amount_error"></span>
                                </div>
                                <div class="col-lg-4">
                                    <label class="form-label">Total Payment To Company</label>
                                    <input type="text" class="form-control" id="total_payment" name="total_payment"
                                        placeholder="Enter Total Payment">
                                    <span class="text-danger" id="total_payment_error"></span>
                                </div>
                                <div class="col-lg-4 edit-form">
                                    <label for="inputtitle1" class="form-label">Is Active</label>
                                    <select class="form-select" name="is_active" id="is_active">
                                        <option value="1">Is active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    <span class="text-danger" id="is_active_error"></span>
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn submit-btn" id="btn_save"
                                        name="sub_client">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var token = "{{ csrf_token() }}";

        $('.edit-form').hide();
        $(document).on('click', '.add-order', function() {
            $('.modal-title').text('Add Order');
            $('#orderid').val('');
            $("#orderform")[0].reset();
            $('span[id$="_error"]').text('');
            $('.edit-form').hide();
            $('#ajaxModel').modal('show');
        });

        $(document).on('change', '#company', function() {
            var accId = $(this).val();
            if (accId != '') {
                $.ajax({
                    type: 'GET',
                    url: "{{ url('admin/get-product-by-company') }}/" + accId,
                    headers: {
                        'X-CSRF-Token': token,
                    },
                    dataType: "json",
                    success: (data) => {
                        $('#product').html('');
                        html = "";
                        html += '<option value="">Select Product</option>';
                        $.each(data.data, function(index, value) {
                            html += '<option value="' + value.id + '">' + value.name +
                                '</option>';
                        });
                        $('#product').append(html);
                    },
                    error: function(response) {
                        $('#product').html('');
                        toastr.error(response.msg);
                    }
                });
            }
        });

        $(document).on('change', '#product', function() {
            var prodId = $(this).val();
            if (prodId != '') {
                $.ajax({
                    type: 'GET',
                    url: "{{ url('admin/product-master-edit') }}/" + prodId,
                    headers: {
                        'X-CSRF-Token': token,
                    },
                    dataType: "json",
                    success: (response) => {
                        // console.log('data=', response);
                        // console.log('product_weight=', response.data.product_weight);
                        $('#weight_for_single_bottle').val(response.data.product_weight);
                        calculation();
                    },
                    error: function(response) {
                        $('#product').html('');
                        toastr.error(response.msg);
                    }
                });
            }
        });

        function calculation() {
            var number_of_bottle = $('#number_of_bottle').val();
            console.log('number_of_bottle=', number_of_bottle);
            var company_rate_per_kg = $('#company_rate_per_kg').val();
            console.log('company_rate_per_kg=', company_rate_per_kg);
            var weight_for_single_bottle = $('#weight_for_single_bottle').val();
            console.log('weight_for_single_bottle=', weight_for_single_bottle);
            var total_weight_for_bottle = $('#total_weight_for_bottle').val();
            console.log('total_weight_for_bottle=', total_weight_for_bottle);
            var discount_1 = $('#discount_1').val();
            console.log('discount_1=', discount_1);
            var discount_2 = $('#discount_2').val();
            console.log('discount_2=', discount_2);
            var discount_3 = $('#discount_3').val();
            console.log('discount_3=', discount_3);

            if (number_of_bottle != '' && number_of_bottle != 'undefined' && weight_for_single_bottle != '' &&
                weight_for_single_bottle != 'undefined') {
                $('#total_weight_for_bottle').val(number_of_bottle * weight_for_single_bottle);
                total_weight_for_bottle = number_of_bottle * weight_for_single_bottle;
            }
            var total_payable_amount = 0;
            if (total_weight_for_bottle != '' && total_weight_for_bottle != 'undefined' && company_rate_per_kg != '' &&
                company_rate_per_kg != 'undefined') {
                total_payable_amount = total_weight_for_bottle * company_rate_per_kg;
                $('#total_payable_amount').val(total_payable_amount);
            }
            if (total_payable_amount != '' && total_payable_amount != 'undefined' && discount_1 != '' && discount_1 !=
                'undefined' &&
                discount_2 != '' && discount_2 != 'undefined' && discount_3 != '' && discount_3 != 'undefined') {
                var new_company_rate_per_kg = company_rate_per_kg - discount_1 - discount_2 - discount_3;
                var net_payable_amount = total_weight_for_bottle * new_company_rate_per_kg;
                $('#net_payable_amount').val(net_payable_amount);
            }
        }

        var dataTable = $('.order-table').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            autoWidth: false,
            pageLength: 10,
            language: {
                search: '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M17.5 17.5L13.875 13.875M15.8333 9.16667C15.8333 12.8486 12.8486 15.8333 9.16667 15.8333C5.48477 15.8333 2.5 12.8486 2.5 9.16667C2.5 5.48477 5.48477 2.5 9.16667 2.5C12.8486 2.5 15.8333 5.48477 15.8333 9.16667Z" stroke="#5E5873" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/></svg>',
                searchPlaceholder: "Search",
                oPaginate: {
                    sNext: '<i class="fa fa-angle-right" aria-hidden="true"></i>',
                    sPrevious: '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                },
            },
            ajax: {
                url: "{{ route('admin.get_order') }}",
                data: function(d) {
                    d._token = token;
                },
                type: 'POST',
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'year_name',
                    name: 'year_name'
                },
                {
                    data: 'account_name',
                    name: 'account_name'
                },
                {
                    data: 'product_name',
                    name: 'product_name'
                },
                {
                    data: 'order_date',
                    name: 'order_date'
                },
                {
                    data: 'discount_1',
                    name: 'discount_1'
                },
                {
                    data: 'discount_2',
                    name: 'discount_2'
                },
                {
                    data: 'discount_3',
                    name: 'discount_3'
                },
                {
                    data: 'hsn_code_name',
                    name: 'hsn_code_name'
                },
                {
                    data: 'gst',
                    name: 'gst'
                },
                {
                    data: 'net_payable_amount',
                    name: 'net_payable_amount'
                },
                {
                    data: 'total_payment',
                    name: 'total_payment'
                },
                {
                    data: 'active_button',
                    name: 'active_button'
                },
                {
                    data: 'action',
                    name: 'action'
                },
            ],
            drawCallback: function() {},
            initComplete: function(response) {}
        });

        $('#orderform').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var csrftoken = $('meta[name="csrf-token"]').attr('content');
            $(".text-danger").text('');

            $.ajax({
                type: 'POST',
                url: "{{ route('admin.insert_order') }}",
                headers: {
                    'X-CSRF-Token': csrftoken,
                },
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    if (data.status == 200) {
                        $('#ajaxModel').modal('hide');
                        if ($('#orderid').val() == '') {
                            toastr.success("Order added successfully.");
                        } else {
                            toastr.success("Order updated successfully.");
                        }
                        dataTable.draw();
                    } else {
                        toastr.error(data.msg);
                    }
                },
                error: function(response) {
                    if (response.status === 422) {
                        var errors = $.parseJSON(response.responseText);
                        $.each(errors['errors'], function(key, val) {
                            console.log(key);
                            $("#" + key + "_error").text(val[0]);
                        });
                    }
                }
            });
        });

        function editOrder(id) {
            $('span[id$="_error"]').text('');
            $.ajax({
                type: 'GET',
                url: "{{ url('admin/order-edit/') }}/" + id,
                headers: {
                    'X-CSRF-Token': token,
                },
                dataType: "json",
                success: (data) => {
                    $('.modal-title').text('Edit Order');
                    $("#orderform")[0].reset();
                    $('.edit-form').show();
                    // set edit value
                    $('#orderid').val(data.data.id);
                    // $('#year_master_id').val(data.data.year_master_id);
                    $('#company').val(data.data.company_id);
                    $('#product').val(data.data.product_master_id);
                    $('#number_of_bottle').val(data.data.number_of_bottle);
                    $('#company_rate_per_kg').val(data.data.bottle_rate_per_kg);
                    $('#weight_for_single_bottle').val(data.data.weight_for_single_bottle);
                    $('#total_weight_for_bottle').val(data.data.number_of_bottle * data.data
                        .weight_for_single_bottle);
                    $('#order_date').val(data.data.order_date);
                    $('#discount_1').val(data.data.discount_1);
                    $('#discount_2').val(data.data.discount_2);
                    $('#discount_3').val(data.data.discount_3);
                    $('#hsn_code').val(data.data.hsn_master_id);
                    $('#gst_percentage').val(data.data.gst_master_id);

                    var total_weight_for_bottle = $('#total_weight_for_bottle').val();
                    total_payable_amount = total_weight_for_bottle * data.data.bottle_rate_per_kg;
                    $('#total_payable_amount').val(total_payable_amount);

                    $('#net_payable_amount').val(data.data.net_payable_amount);
                    $('#total_payment').val(data.data.total_payment);
                    $('#is_active').val(data.data.is_active);
                    // calculation();
                    // Show edit modal
                    $('#ajaxModel').modal('show');
                },
                error: function(response) {
                    toastr.error(response.msg);
                }
            });
        }

        function daletetabledata(id) {

            swal({
                title: "Are you sure?",
                text: "You want to be delete this data!",
                icon: "warning",
                buttons: [
                    'No, cancel it!',
                    'Yes, I am sure!'
                ],
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {
                    _data = {};
                    _data['id'] = id;
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('admin.delete_order') }}",
                        headers: {
                            'X-CSRF-Token': token,
                        },
                        data: _data,
                        dataType: "json",
                        success: (data) => {
                            dataTable.draw();
                        },
                        error: function(response) {}
                    });
                } else {
                    swal("Cancelled", "Your data is safe :)", "error");
                }
            })
        }
    </script>
@endsection
