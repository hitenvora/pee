@extends('layouts.admin.admin')

@section('title')
    Stock List
@endsection

@section('content')
    <div class="all-content-wrapper">
        <div class="breadcome-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="breadcome-list">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="breadcome-heading">
                                        <h3>Order Stock List</h3>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-end">
                                    <a class="btn btn-primary ms-3 add_order_stock">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20" fill="none">
                                            <path d="M9.99935 4.16699V15.8337M4.16602 10.0003H15.8327" stroke="white"
                                                stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        Add Order Stock
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
                                <table id="stock-table" class="stock-table-list">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Order Date</th>
                                            <th>Order Received Date</th>
                                            <th>Company</th>
                                            <th>Product</th>
                                            <th>No. Of Order Bottle</th>
                                            <th>No. Of Received Bottle</th>
                                            <th>Remark</th>
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

        <div class="modal fade product-modal" id="ajaxModel" tabindex="-1" aria-labelledby="companytabs"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="companytabs">Add Order Stock</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row" method="post" id="order_stock_add_form" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="order_stock_id" id="order_stock_id" value="">
                            <div class="col-lg-6">
                                <label for="inputtitle1" class="form-label">Order Date</label>
                                <select class="form-select" name="order_date" id="order_date">
                                    <option value="">Select</option>
                                    @foreach ($orders as $value)
                                        <option value="{{ $value['id'] }}">
                                            {{ date('d-m-Y', strtotime($value['order_date'])) }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger" id="order_date_error"></span>
                            </div>
                            <div class="col-lg-6">
                                <label for="inputtitle1" class="form-label">Order Received Data</label>
                                <input type="date" class="form-control" id="order_received_date"
                                    name="order_received_date" placeholder="Select order received date">
                                <span class="text-danger" id="order_received_date_error"></span>
                            </div>

                            <div class="col-lg-6">
                                <label for="inputtitle1" class="form-label">Company</label>
                                <select class="form-select" name="company" id="company" disabled>
                                    <option value="">Select</option>
                                    @foreach ($accountName as $value)
                                        <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger" id="company_error"></span>
                            </div>
                            <div class="col-lg-6">
                                <label for="inputtitle1" class="form-label">Product</label>
                                <select class="form-select" name="product" id="product_master_id" disabled>
                                    <option value="">Select</option>
                                    @foreach ($productName as $value)
                                        <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger" id="product_error"></span>
                            </div>

                            <div class="col-lg-6">
                                <label for="inputtitle1" class="form-label">Number Of Bottle Order</label>
                                <input type="number" class="form-control" id="number_of_bottle_order"
                                    name="number_of_bottle_order" placeholder="Enter NumberOfBottle" value="0"
                                    disabled>
                                <span class="text-danger" id="number_of_bottle_order_error"></span>
                            </div>

                            <div class="col-lg-6">
                                <label for="inputtitle1" class="form-label">Number Of Bottle Received</label>
                                <input type="number" class="form-control" id="number_of_bottle_received"
                                    name="number_of_bottle_received" placeholder="Enter NumberOfBottle" value="0">
                                <span class="text-danger" id="number_of_bottle_received_error"></span>
                            </div>

                            <div class="col-lg-12">
                                <label for="inputtitle1" class="form-label">Remarks</label>
                                <input type="text" class="form-control" id="remarks" name="remarks"
                                    placeholder="Enter remarks">
                                <span class="text-danger" id="name_error"></span>
                            </div>

                            <div class="col-12 text-center">
                                <button type="submit" class="btn submit-btn" id="btn_save_client"
                                    name="sub_client">Save</button>
                            </div>
                        </form>
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
        // add user form show
        $(document).on('click', '.add_order_stock', function() {
            $('.modal-title').text('Add Order Stock');
            $('#order_stock_id').val('');
            $("#order_stock_add_form")[0].reset();
            $('span[id$="_error"]').text('');
            $('.edit-form').hide();
            $('#ajaxModel').modal('show');
        });

        $(document).on('change', '#order_date', function() {
            var orderId = $(this).val();
            if (orderId != '') {
                $.ajax({
                    type: 'GET',
                    url: "{{ url('admin/get-order-details') }}/" + orderId,
                    headers: {
                        'X-CSRF-Token': token,
                    },
                    dataType: "json",
                    success: (response) => {
                        console.log('data', response);
                        $('#company').val(response.data.company_id);
                        $('#product_master_id').val(response.data.product_master_id);
                        $('#number_of_bottle_order').val(response.data.number_of_bottle);
                        // $('#product_master_id').html('');
                        // html = "";
                        // $.each(response.data, function(index, value) {
                        //     html += '<option value="' + value.id + '">' + value.name + '</option>';
                        // });
                        // $('#product_master_id').append(html);
                        // $('#product_master_id').html('');
                        // $.each(data.data, function(index, value) {
                        //     console.log('value', value);
                        //     $('#discount-' + value.product_master_id).val(value.discount);
                        //     $('#product_master_id').append('');
                        // });
                    },
                    error: function(response) {
                        toastr.error(response.msg);
                    }
                });
            }
        });

        var dataTable = $('.stock-table-list').DataTable({
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
                url: "{{ route('admin.get_order_stock_list') }}",
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
                    data: 'order_date',
                    name: 'order_date'
                },
                {
                    data: 'order_received_date',
                    name: 'order_received_date'
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
                    data: 'number_of_bottle_order',
                    name: 'number_of_bottle_order'
                },
                {
                    data: 'number_of_bottle_received',
                    name: 'number_of_bottle_received'
                },
                {
                    data: 'remarks',
                    name: 'remarks'
                },
                {
                    data: 'action',
                    name: 'action'
                },
            ],
            drawCallback: function() {},
            initComplete: function(response) {}
        });

        $('#order_stock_add_form').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var csrftoken = $('meta[name="csrf-token"]').attr('content');
            $(".text-danger").text('');

            $.ajax({
                type: 'POST',
                url: "{{ url('admin/insert-order-stock') }}",
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
                        if ($('#order_stock_id').val() == '') {
                            toastr.success("Order stock addedd successfully.");
                        } else {
                            toastr.success("Order stock updated successfully.");
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
                        url: "{{ route('admin.delete_order_stock') }}",
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
