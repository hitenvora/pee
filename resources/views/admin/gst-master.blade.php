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
                                        <h3>GST Master</h3>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-end">
                                    {{-- <a class="btn btn-white" href="#" download>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewBox="0 0 18 18" fill="none">
                                            <path
                                                d="M2.70117 11.4142L2.70117 14.1936C2.70117 14.6148 2.86711 15.0188 3.16248 15.3167C3.45785 15.6145 3.85846 15.7818 4.27617 15.7818H13.7262C14.1439 15.7818 14.5445 15.6145 14.8399 15.3167C15.1352 15.0188 15.3012 14.6148 15.3012 14.1936V11.4142M9.00205 2.2168V11.2168M9.00205 11.2168L12.602 7.77793M9.00205 11.2168L5.40205 7.77793"
                                                stroke-width="1.63636" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        Export
                                    </a> --}}
                                    <a class="btn btn-primary ms-3 add-gst-master">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20" fill="none">
                                            <path d="M9.99935 4.16699V15.8337M4.16602 10.0003H15.8327" stroke="white"
                                                stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        Add GST Master
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
                                <table id="gst-table-id" class="gst-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Percentage</th>
                                            <th>C GST</th>
                                            <th>S GST</th>
                                            <th>I GST</th>
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

        <div class="modal fade product-modal" id="ajaxModel" tabindex="-1" aria-labelledby="companytabs"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="companytabs">Add GST Master</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row" method="post" id="gstform" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="gst_id" id="gstid" value="">
                            <div class="col-lg-6">
                                <label for="inputtitle1" class="form-label">Percentage</label>
                                <input type="text" class="form-control" id="percentage" name="percentage"
                                    placeholder="Enter Percentage">
                                <span class="text-danger" id="percentage_error"></span>
                            </div>
                            <div class="col-lg-6">
                                <label for="inputtitle1" class="form-label">C GST</label>
                                <input type="text" class="form-control" id="c_gst" name="c_gst"
                                    placeholder="Enter C GST">
                                <span class="text-danger" id="c_gst_error"></span>
                            </div>
                            <div class="col-lg-6">
                                <label for="inputtitle1" class="form-label">S GST</label>
                                <input type="text" class="form-control" id="s_gst" name="s_gst"
                                    placeholder="Enter S GST">
                                <span class="text-danger" id="s_gst_error"></span>
                            </div>
                            <div class="col-lg-6">
                                <label for="inputtitle1" class="form-label">I GST</label>
                                <input type="text" class="form-control" id="i_gst" name="i_gst"
                                    placeholder="Enter I GST">
                                <span class="text-danger" id="i_gst_error"></span>
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
        $('.edit-form').hide();
        // add user form show
        $(document).on('click', '.add-gst-master', function() {
            $('.modal-title').text('Add GST Master');
            $('#gstid').val('');
            $("#gstform")[0].reset();
            $('span[id$="_error"]').text('');
            $('.edit-form').hide();
            $('#ajaxModel').modal('show');
        });

        var token = "{{ csrf_token() }}";
        var dataTable = $('.gst-table').DataTable({
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
                url: "{{ route('admin.get_gst') }}",
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
                    data: 'percentage',
                    name: 'percentage'
                },
                {
                    data: 'c_gst',
                    name: 'c_gst'
                },
                {
                    data: 's_gst',
                    name: 's_gst'
                },
                {
                    data: 'i_gst',
                    name: 'i_gst'
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

        $('#gstform').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var csrftoken = $('meta[name="csrf-token"]').attr('content');
            $(".text-danger").text('');

            $.ajax({
                type: 'POST',
                url: "{{ url('admin/insert-gst') }}",
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
                        if ($('#gstid').val() == '') {
                            toastr.success("GST Master addedd successfully.");
                        } else {
                            toastr.success("GST Master updated successfully.");
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

        function editGSTMaster(id) {
            $('span[id$="_error"]').text('');
            $.ajax({
                type: 'GET',
                url: "{{ url('admin/gst-edit/') }}/" + id,
                headers: {
                    'X-CSRF-Token': token,
                },
                dataType: "json",
                success: (data) => {
                    $('.modal-title').text('Edit GST Master');
                    $("#gstform")[0].reset();
                    $('.edit-form').show();
                    // set edit value
                    $('#gstid').val(data.data.id);
                    $('#percentage').val(data.data.percentage);
                    $('#c_gst').val(data.data.c_gst);
                    $('#s_gst').val(data.data.s_gst);
                    $('#i_gst').val(data.data.i_gst);
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
                        url: "{{ route('admin.delete_gst') }}",
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
