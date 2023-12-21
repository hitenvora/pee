@extends('layouts.admin.admin')

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
                                            <h3>Account Master</h3>
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
                                        <a class="btn btn-primary ms-3 add-account-master">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 20 20" fill="none">
                                                <path d="M9.99935 4.16699V15.8337M4.16602 10.0003H15.8327" stroke="white"
                                                    stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            Add Account
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
                                    <table id="account-table-id" class="account-table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Account Name</th>
                                                <th>Group Name</th>
                                                <th>Opening Balance</th>
                                                <th>Credit Limit</th>
                                                <th>Is Credit</th>
                                                <th>Address</th>
                                                <th>City</th>
                                                <th>GST No.</th>
                                                <th>Contact Person Name</th>
                                                <th>Mobile No.</th>
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

            <div class="modal fade product-modal" id="ajaxModel" tabindex="-1" aria-labelledby="suppliertabs"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title" id="suppliertabs">Add Account</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row" method="post" enctype="multipart/form-data" id="accountform">
                                @csrf
                                <input type="hidden" name="account_master_id" id="accountmasterid" value="">
                                <div class="col-lg-6">
                                    <label class="form-label">Account Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter Account Name">
                                    <span class="text-danger" id="name_error"></span>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Group Name</label>
                                    <select class="form-select" name="group_master_id" id="group_master_id">
                                        <option value="">Select Group</option>
                                        @foreach ($accountMaster as $value)
                                            <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger" id="group_master_id_error"></span>
                                </div>
                                <div class="col-lg-6 supplier-view">
                                    <label class="form-label">User Name</label>
                                    <input type="text" class="form-control" id="user_name" name="user_name"
                                        placeholder="Enter User Name">
                                    <span class="text-danger" id="user_name_error"></span>
                                </div>
                                <div class="col-lg-6 supplier-view">
                                    <label class="form-label">Password</label>
                                    <input type="text" class="form-control" id="password" name="password"
                                        placeholder="Enter Password">
                                    <span class="text-danger" id="password_error"></span>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Opening Balance</label>
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <input type="number" class="form-control" id="opening_balance"
                                                name="opening_balance" placeholder="0.00">
                                            <span class="text-danger" id="opening_balance_error"></span>
                                        </div>
                                        <div class="col-lg-5">
                                            <select class="form-select" name="is_credit" id="is_credit">
                                                <option value="">Select</option>
                                                <option value="1">Credit</option>
                                                <option value="0">Debit</option>
                                            </select>
                                            <span class="text-danger" id="is_credit_error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Credit Limit</label>
                                    <input type="text" class="form-control" id="credit_limit" name="credit_limit"
                                        placeholder="Enter Credit Limit">
                                    <span class="text-danger" id="credit_limit_error"></span>
                                </div>
                                <div class="col-lg-12">
                                    <label class="form-label">Address</label>
                                    <textarea rows="2" type="text" class="form-control" id="address" name="address"
                                        placeholder="Enter address"></textarea>
                                    <span class="text-danger" id="address_error"></span>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">City</label>
                                    <input type="text" class="form-control" id="city" name="city"
                                        placeholder="Enter City">
                                    <span class="text-danger" id="city_error"></span>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">GST IN</label>
                                    <input type="text" class="form-control" id="gst_no" name="gst_no"
                                        placeholder="Enter GST No.">
                                    <span class="text-danger" id="gst_no_error"></span>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Contact Person Name</label>
                                    <input type="text" class="form-control" id="contact_person" name="contact_person"
                                        placeholder="Enter Contact Person Name">
                                    <span class="text-danger" id="contact_person_error"></span>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Mobile No.</label>
                                    <input type="number" class="form-control" id="mobile_no" name="mobile_no"
                                        placeholder="Enter Mobile No.">
                                    <span class="text-danger" id="mobile_no_error"></span>
                                </div>
                                <div class="col-lg-12 edit-form">
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
        $('.edit-form').hide();
        $('.supplier-view').hide();
        $(document).on('click', '.add-account-master', function() {
            $('.modal-title').text('Add Account Master');
            $('#accountmasterid').val('');
            $("#accountform")[0].reset();
            $('span[id$="_error"]').text('');
            $('.edit-form').hide();
            $('#ajaxModel').modal('show');
        });

        $(function() {
            $("#group_master_id").on('change', function() {
                var dataId = this.value;
                if (dataId == '3') {
                    $('.supplier-view').show();
                } else {
                    $('.supplier-view').hide();
                }
            })
        });

        var token = "{{ csrf_token() }}";
        var dataTable = $('.account-table').DataTable({
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
                url: "{{ route('admin.get_account_master') }}",
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
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'group_name',
                    name: 'group_name'
                },
                {
                    data: 'opening_balance',
                    name: 'opening_balance'
                },
                {
                    data: 'credit_limit',
                    name: 'credit_limit'
                },
                {
                    data: 'credit_button',
                    name: 'credit_button'
                },
                {
                    data: 'address',
                    name: 'address'
                },
                {
                    data: 'city',
                    name: 'city'
                },
                {
                    data: 'gst_no',
                    name: 'gst_no'
                },
                {
                    data: 'contact_person',
                    name: 'contact_person'
                },
                {
                    data: 'mobile_no',
                    name: 'mobile_no'
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

        $('#accountform').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var csrftoken = $('meta[name="csrf-token"]').attr('content');
            $(".text-danger").text('');

            $.ajax({
                type: 'POST',
                url: "{{ route('admin.insert_account_master') }}",
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
                        if ($('#accountmasterid').val() == '') {
                            toastr.success("Account master added successfully.");
                        } else {
                            toastr.success("Account master updated successfully.");
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

        function editAccountMaster(id) {
            $('span[id$="_error"]').text('');
            $.ajax({
                type: 'GET',
                url: "{{ url('admin/account-master-edit/') }}/" + id,
                headers: {
                    'X-CSRF-Token': token,
                },
                dataType: "json",
                success: (data) => {
                    $('.modal-title').text('Edit Account Master');
                    $("#accountform")[0].reset();
                    $('.edit-form').show();
                    if (data.data.group_master_id == 2) {
                        $('.supplier-view').show();
                    } else {
                        $('.supplier-view').hide();
                    }
                    // set edit value
                    $('#accountmasterid').val(data.data.id);
                    $('#name').val(data.data.name);
                    $('#group_master_id').val(data.data.group_master_id);
                    $('#user_name').val(data.data.user_name);
                    $('#password').val(data.data.password);
                    $('#opening_balance').val(data.data.opening_balance);
                    $('#is_credit').val(data.data.is_credit);
                    $('#credit_limit').val(data.data.credit_limit);
                    $('#address').val(data.data.address);
                    $('#city').val(data.data.city);
                    $('#gst_no').val(data.data.gst_no);
                    $('#contact_person').val(data.data.contact_person);
                    $('#mobile_no').val(data.data.mobile_no);
                    $('#is_active').val(data.data.is_active);
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
                        url: "{{ route('admin.delete_account_master') }}",
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
