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
                                        <h3>Company</h3>
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
                                    <a class="btn btn-primary ms-3 add-company" data-bs-toggle="modal"
                                        data-bs-target="#ajaxModel">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20" fill="none">
                                            <path d="M9.99935 4.16699V15.8337M4.16602 10.0003H15.8327" stroke="white"
                                                stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        Add Company
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
                                <table id="product-table-id" class="product-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Company Name</th>
                                            <th>GST No.</th>
                                            <th>Mobile No.</th>
                                            <th>City</th>
                                            <th>State</th>
                                            <th>Address</th>
                                            <th>Pin Code</th>
                                            <th>Contact Person Name</th>
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
                        <h2 class="modal-title" id="companytabs">Add Company</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row" method="post" id="companyform" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="company_id" id="companyid" value="">
                            <div class="col-lg-12">
                                <label for="inputtitle1" class="form-label">Company Name</label>
                                <input type="text" class="form-control" id="company_name" name="company_name"
                                    placeholder="Enter Company Name">
                                <span class="text-danger" id="company_name_error"></span>
                            </div>
                            <div class="col-lg-6">
                                <label for="inputtitle1" class="form-label">GST No.</label>
                                <input type="text" class="form-control" id="gst" name="gst_no"
                                    placeholder="Enter GST No.">
                                <span class="text-danger" id="gst_no_error"></span>
                            </div>
                            <div class="col-lg-6">
                                <label for="inputtitle1" class="form-label">Mobile No.</label>
                                <input type="number" class="form-control" id="mobile" name="mobile"
                                    placeholder="Enter Mobile No.">
                                <span class="text-danger" id="mobile_error"></span>
                            </div>
                            <div class="col-lg-12">
                                <label for="inputtitle1" class="form-label">Contact Person Name</label>
                                <input type="text" class="form-control" id="contact_person_name"
                                    name="contact_person_name" placeholder="Enter Contact Person Name">
                                <span class="text-danger" id="contact_person_name_error"></span>
                            </div>
                            <div class="col-lg-6">
                                <label for="inputtitle1" class="form-label">City</label>
                                <input type="text" class="form-control" id="city" name="city"
                                    placeholder="Enter price">
                                <span class="text-danger" id="city_error"></span>
                            </div>
                            <div class="col-lg-6">
                                <label for="inputtitle1" class="form-label">State</label>
                                <select class="form-select" name="state_id" id="state_id">
                                    <option value="">Select State</option>
                                    @foreach ($state as $value)
                                        <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger" id="state_id_error"></span>
                            </div>
                            <div class="col-lg-12">
                                <label for="inputtitle1" class="form-label">Address</label>
                                <textarea rows="2" type="text" class="form-control" id="address" name="address"
                                    placeholder="Enter address"></textarea>
                                <span class="text-danger" id="address_error"></span>
                            </div>
                            <div class="col-lg-6">
                                <label for="inputtitle1" class="form-label">Pin Code</label>
                                <input type="number" class="form-control" id="pin_code" name="pin_code"
                                    placeholder="Enter pincode">
                                <span class="text-danger" id="pin_code_error"></span>
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
                        <h2 class="modal-title" id="viewproduct">View Company Detail</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="view-details">
                            <tbody>
                                <tr>
                                    <th>Company Name</th>
                                    <td>Bharat Gas</td>
                                </tr>
                                <tr>
                                    <th>GST No.</th>
                                    <td>123562</td>
                                </tr>
                                <tr>
                                    <th>Mobile No.</th>
                                    <td>+91 1234562658</td>
                                </tr>
                                <tr>
                                    <th>City</th>
                                    <td>Surat</td>
                                </tr>
                                <tr>
                                    <th>State</th>
                                    <td>Gujrat</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <th>Pin Code</th>
                                    <td>395001</td>
                                </tr>
                                <tr>
                                    <th>Contact Person Name</th>
                                    <td>John Doe</td>
                                </tr>
                                <tr>
                                    <th>Credit Limit</th>
                                    <td>500</td>
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
        $(document).on('click', '.add-company', function() {
            $('.modal-title').text('Add Company');
            $('#companyid').val('');
            $("#companyform")[0].reset();
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
                url: "{{ route('admin.get_company') }}",
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
                    data: 'company_name',
                    name: 'company_name'
                },
                {
                    data: 'gst_no',
                    name: 'gst_no'
                },
                {
                    data: 'mobile',
                    name: 'mobile'
                },
                {
                    data: 'city',
                    name: 'city'
                },
                {
                    data: 'state_name',
                    name: 'state_name'
                },
                {
                    data: 'address',
                    name: 'address'
                },
                {
                    data: 'pin_code',
                    name: 'pin_code'
                },
                {
                    data: 'contact_person_name',
                    name: 'contact_person_name'
                },
                {
                    data: 'action',
                    name: 'action'
                },
            ],
            drawCallback: function() {},
            initComplete: function(response) {}
        });

        $('#companyform').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var csrftoken = $('meta[name="csrf-token"]').attr('content');
            $(".text-danger").text('');

            $.ajax({
                type: 'POST',
                url: "{{ url('admin/insert-company') }}",
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
                        if ($('#companyid').val() == '') {
                            toastr.success("Company addedd successfully.");
                        } else {
                            toastr.success("Company updated successfully.");
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

        function editCompany(id) {
            $('span[id$="_error"]').text('');
            $.ajax({
                type: 'GET',
                url: "{{ url('admin/company-edit/') }}/" + id,
                headers: {
                    'X-CSRF-Token': token,
                },
                dataType: "json",
                success: (data) => {
                    $('.modal-title').text('Edit Company');
                    $("#companyform")[0].reset();
                    $('.edit-form').show();
                    // set edit value
                    $('#companyid').val(data.data.id);
                    $('#company_name').val(data.data.company_name);
                    $('#gst').val(data.data.gst_no);
                    $('#mobile').val(data.data.mobile);
                    $('#contact_person_name').val(data.data.contact_person_name);
                    $('#city').val(data.data.city);
                    $('#state_id').val(data.data.state_id);
                    $('#address').val(data.data.address);
                    $('#pin_code').val(data.data.pin_code);
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
                        url: "{{ route('admin.delete_company') }}",
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
