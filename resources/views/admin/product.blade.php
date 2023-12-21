@extends('layouts.admin.admin')

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
                                        <h3>Product</h3>
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
                                    <a class="btn btn-primary ms-3 add-product" data-bs-toggle="modal"
                                        data-bs-target="#ajaxModel">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20" fill="none">
                                            <path d="M9.99935 4.16699V15.8337M4.16602 10.0003H15.8327" stroke="white"
                                                stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        Add Product
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
                                <table class="product-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product Name</th>
                                            <th>Company Name</th>
                                            <th>HSN/SAC Code</th>
                                            <th>GST (%)</th>
                                            <th>Opening Stock</th>
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
        <div class="modal fade product-modal" id="ajaxModel" tabindex="-1" aria-labelledby="producttabs"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="producttabs">Add Product</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row" method="post" id="productform" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="product_id" id="product_id" value="">
                            <div class="col-lg-12">
                                <label for="inputtitle1" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="product_name" name="product_name"
                                    placeholder="Enter Product Name">
                            </div>
                            <div class="col-lg-6">
                                <label for="inputtitle1" class="form-label">Company Name</label>
                                <select class="form-select" name="company_master_id" id="company_master_id">
                                    <option>Select</option>
                                    @foreach ($companyName as $value)
                                        <option value="{{ $value['id'] }}">{{ $value['company_name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="inputtitle1" class="form-label">HSN/SAC Code</label>
                                <select class="form-select" name="hsn_code_id" id="hsn_code_id">
                                    <option>Select</option>
                                    @foreach ($hsnCode as $value)
                                        <option value="{{ $value['id'] }}">{{ $value['hsn_code'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="inputtitle1" class="form-label">GST (%)</label>
                                <input type="text" class="form-control" id="gst" name="gst"
                                    placeholder="Enter bank account number">
                            </div>
                            <div class="col-lg-6">
                                <label for="inputtitle1" class="form-label">Opening Stock</label>
                                <input type="number" class="form-control" id="opening_stock" name="opening_stock"
                                    placeholder="50">
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
        {{-- <div class="modal fade view-modal" id="viewproduct" tabindex="-1" aria-labelledby="viewproduct"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="viewproduct">View Product Detail</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="view-details">
                            <tbody>
                                <tr>
                                    <th>Product Name</th>
                                    <td>Gas Bottle</td>
                                </tr>
                                <tr>
                                    <th>Weight (Kg)</th>
                                    <td>19 Kg</td>
                                </tr>
                                <tr>
                                    <th>Company Name</th>
                                    <td>Bharat Gas</td>
                                </tr>
                                <tr>
                                    <th>HSN/SAC Code</th>
                                    <td>380811425</td>
                                </tr>
                                <tr>
                                    <th>Per KG Price</th>
                                    <td>1500</td>
                                </tr>
                                <tr>
                                    <th>Domestic/ Commercial</th>
                                    <td>Domestic</td>
                                </tr>
                                <tr>
                                    <th>Discount</th>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <th>GST (%)</th>
                                    <td>0%</td>
                                </tr>
                                <tr>
                                    <th>Opening Stock</th>
                                    <td>50</td>
                                </tr>
                                <tr>
                                    <th>Total Amount</th>
                                    <td>3000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection

@section('scripts')
    <script>
        $('.edit-form').hide();
        // add user form show
        $(document).on('click', '.add-product', function() {
            $('.modal-title').text('Add Product');
            $('#product_id').val('');
            $("#productform")[0].reset();
            $('span[id$="_error"]').text('');
            $('.edit-form').hide();
            $('#ajaxModel').modal('show');
        });

        var token = "{{ csrf_token() }}";
        var dataTable = $('.product-table').DataTable({
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
                url: "{{ route('admin.get_product') }}",
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
                    data: 'product_name',
                    name: 'product_name'
                },
                {
                    data: 'company_name_view',
                    name: 'company_name_view'
                },
                {
                    data: 'hsn_code_view',
                    name: 'hsn_code_view'
                },
                {
                    data: 'gst',
                    name: 'gst'
                },
                {
                    data: 'opening_stock',
                    name: 'opening_stock'
                },
                {
                    data: 'action',
                    name: 'action'
                },
            ],
            drawCallback: function() {},
            initComplete: function(response) {}
        });

        $('#productform').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var csrftoken = $('meta[name="csrf-token"]').attr('content');
            $(".text-danger").text('');

            $.ajax({
                type: 'POST',
                url: "{{ url('admin/insert-product') }}",
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
                        if ($('#product_id').val() == '') {
                            toastr.success("Product addedd successfully.");
                        } else {
                            toastr.success("Product updated successfully.");
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

        function editProduct(id) {
            $('span[id$="_error"]').text('');
            $.ajax({
                type: 'GET',
                url: "{{ url('admin/product-edit/') }}/" + id,
                headers: {
                    'X-CSRF-Token': token,
                },
                dataType: "json",
                success: (data) => {
                    $('.modal-title').text('Edit Product');
                    $("#productform")[0].reset();
                    $('.edit-form').show();
                    // set edit value
                    $('#product_id').val(data.data.id);
                    $('#product_name').val(data.data.product_name);
                    $('#company_master_id').val(data.data.company_master_id);
                    $('#hsn_code_id').val(data.data.hsn_code_id);
                    $('#gst').val(data.data.gst);
                    $('#opening_stock').val(data.data.opening_stock);
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
                        url: "{{ route('admin.delete_product') }}",
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
