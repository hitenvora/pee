@extends('layouts.admin.admin')

@section('title')
    Add Sell
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
                                                <h3>Add Sell</h3>
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
                                            <a class="btn btn-primary ms-3 add-sell">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 20 20" fill="none">
                                                    <path d="M9.99935 4.16699V15.8337M4.16602 10.0003H15.8327" stroke="white"
                                                        stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                Add Sell
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
                                        <table id="add_sell-table-id" class="add_sell-table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Year</th>
                                                    <th>Account</th>
                                                    <th>Product</th>
                                                    <th>Oredr Date</th>
                                                    <th>Ch Number</th>
                                                    <th>HSN Code</th>
                                                    <th>GST</th>
                                                    <th>Net Payable Amount</th>
                                                    <th>Total Payment</th>
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
                            <h2 class="modal-title" id="suppliertabs">Add Sell</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row" method="post" enctype="multipart/form-data" id="add-sellform">
                                @csrf
                                <input type="hidden" name="add_sell_id" id="add_sell_id" value="">
                          
                                <div class="col-lg-4">
                                    <label class="form-label">Ch Number</label>
                                    <input type="text" class="form-control" id="ch_number" name="ch_number"
                                        placeholder="Enter Ch Number">
                                    <span class="text-danger" id="ch_number_error"></span>
                                </div>

                                <div class="col-lg-4">
                                    <label class="form-label">No. of Filled Bottle Delivered</label>
                                    <input type="text" class="form-control" id="filled_bottle_delivered"
                                        name="filled_bottle_delivered" placeholder="Enter No. of Filled Bottle Delivered"
                                        value="0" onchange="calculation()" />
                                    <span class="text-danger" id="filled_bottle_delivered_error"></span>
                                </div>

                                <div class="col-lg-4">
                                    <label class="form-label">No. of Empty Bottle Received</label>
                                    <input type="text" class="form-control" id="empty_bottle_received"
                                        name="empty_bottle_received" placeholder="Enter No. of Empty Bottle Received"
                                        value="0">
                                    <span class="text-danger" id="empty_bottle_received_error"></span>
                                </div>

                                <div class="col-lg-4">
                                    <label class="form-label">Total No. Of Bottle</label>
                                    <input type="text" class="form-control" id="total_bottle" name="total_bottle"
                                        value="0" readonly="">
                                </div>

                                <div class="col-lg-4">
                                    <label class="form-label">Rate Per Bottle</label>
                                    <input type="text" class="form-control" id="rate_per_bottle"
                                        name="rate_per_bottle" placeholder="Enter No. of Empty Bottle Received"
                                        value="0" onchange="calculation()" />
                                    <span class="text-danger" id="rate_per_bottle_error"></span>
                                </div>

                               
                                <div class="col-lg-4">
                                    <label class="form-label">Net Payable Amount</label>
                                    <input type="text" class="form-control" id="net_payable_amount"
                                        name="net_payable_amount" placeholder="Enter Net Payable Amount">
                                    <span class="text-danger" id="net_payable_amount_error"></span>
                                </div>
                                <div class="col-lg-4">
                                    <label class="form-label">Total Payment Received From Customer</label>
                                    <input type="text" class="form-control" id="total_payment" name="total_payment"
                                        placeholder="Enter Total Payment">
                                    <span class="text-danger" id="total_payment_error"></span>
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

        function calculation() {
            var filled_bottle_delivered = $('#filled_bottle_delivered').val();
            console.log('filled_bottle_delivered=', filled_bottle_delivered);
            var rate_per_bottle = $('#rate_per_bottle').val();
            console.log('rate_per_bottle=', rate_per_bottle);

            if (filled_bottle_delivered != '' && filled_bottle_delivered != 'undefined' && rate_per_bottle != '' &&
                rate_per_bottle != 'undefined') {
                $('#net_payable_amount').val(filled_bottle_delivered * rate_per_bottle);
            }
        }

        $('.edit-form').hide();
        $(document).on('click', '.add-sell', function() {
            $('.modal-title').text('Add Sell');
            $('#add_sell_id').val('');
            $("#add-sellform")[0].reset();
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

        var dataTable = $('.add_sell-table').DataTable({
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
                url: "{{ route('admin.get_add-sell') }}",
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
                    data: 'company_name',
                    name: 'company_name'
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
                    data: 'ch_number',
                    name: 'ch_number'
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
                    data: 'action',
                    name: 'action'
                },
            ],
            drawCallback: function() {},
            initComplete: function(response) {}
        });

        $('#add-sellform').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var csrftoken = $('meta[name="csrf-token"]').attr('content');
            $(".text-danger").text('');

            $.ajax({
                type: 'POST',
                url: "{{ route('admin.insert_add-sell') }}",
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
                        if ($('#add_sell_id').val() == '') {
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

        function editAddSell(id) {
            $('span[id$="_error"]').text('');
            $.ajax({
                type: 'GET',
                url: "{{ url('admin/add-sell-edit/') }}/" + id,
                headers: {
                    'X-CSRF-Token': token,
                },
                dataType: "json",
                success: (data) => {
                    $('.modal-title').text('Edit Sell');
                    $("#add-sellform")[0].reset();
                    $('.edit-form').show();
                    // set edit value
                    $('#add_sell_id').val(data.data.id);
                    $('#company').val(data.data.company_id);
                    $('#product').val(data.data.product_master_id);
                    $('#customer').val(data.data.customer_id);
                    $('#supplier').val(data.data.supplier_id);
                    $('#order_date').val(data.data.order_date);
                    $('#order_code').val(data.data.order_code);
                    $('#ch_number').val(data.data.ch_number);
                    $('#filled_bottle_delivered').val(data.data.filled_bottle_delivered);
                    $('#empty_bottle_received').val(data.data.empty_bottle_received);
                    $('#rate_per_bottle').val(data.data.rate_per_bottle);
                    $('#hsn_master_id').val(data.data.hsn_master_id);
                    $('#gst_master_id').val(data.data.gst_master_id);
                    $('#net_payable_amount').val(data.data.net_payable_amount);
                    $('#total_payment').val(data.data.total_payment);
                    $('#is_active').val(data.data.is_active);
                    // Show edit modal
                    $('#ajaxModel').modal('show');
                },
                error: function(response) {
                    toastr.error(response.msg);
                }
            });
        }

        function deleteData(id) {
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
                        url: "{{ route('admin.delete_add-sell') }}",
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
