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
                                        <h3>Sell</h3>
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
                                    <a class="btn btn-primary ms-3" data-bs-toggle="modal" data-bs-target="#selltab">
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
                                <table id="product-table" class="product-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Customer Name</th>
                                            <th>Date</th>
                                            <th>CH No.</th>
                                            <th>No. Of Filled Bottle Delivered</th>
                                            <th>No. Of Empty Bottle Received</th>
                                            <th>Supplier</th>
                                            <th>Total Bottle</th>
                                            <th>Remarks</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>John Doe</td>
                                            <td>17/08/2023</td>
                                            <td>102306</td>
                                            <td>150</td>
                                            <td>30</td>
                                            <td>-</td>
                                            <td>200</td>
                                            <td>-</td>
                                            <td>
                                                <ul class="d-flex gap-1 icons-wrap">

                                                    <li>
                                                        <a title="edit" href="#" data-bs-toggle="modal"
                                                            data-bs-target="#editmodal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" viewBox="0 0 20 20" fill="none">
                                                                <path
                                                                    d="M4.05882 5.0791H3.03921C2.49838 5.0791 1.9797 5.29395 1.59727 5.67637C1.21484 6.0588 1 6.57748 1 7.11831V16.2948C1 16.8356 1.21484 17.3543 1.59727 17.7367C1.9797 18.1191 2.49838 18.334 3.03921 18.334H12.2157C12.7565 18.334 13.2752 18.1191 13.6576 17.7367C14.04 17.3543 14.2549 16.8356 14.2549 16.2948V15.2752"
                                                                    stroke-width="1.52941" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                                <path
                                                                    d="M13.2361 3.03932L16.2949 6.09814M17.7071 4.6554C18.1087 4.25383 18.3343 3.70919 18.3343 3.14128C18.3343 2.57338 18.1087 2.02874 17.7071 1.62717C17.3055 1.2256 16.7609 1 16.193 1C15.6251 1 15.0804 1.2256 14.6789 1.62717L6.09888 10.1766V13.2354H9.1577L17.7071 4.6554Z"
                                                                    stroke-width="1.52941" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>

                                                        </a>

                                                    </li>
                                                    <li>
                                                        <a title="delete" href="javascript:void(0)" class="delete_doc"
                                                            title="Delete">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" viewBox="0 0 20 20" fill="none">
                                                                <path
                                                                    d="M2.5 4.99996H4.16667M4.16667 4.99996H17.5M4.16667 4.99996V16.6666C4.16667 17.1087 4.34226 17.5326 4.65482 17.8451C4.96738 18.1577 5.39131 18.3333 5.83333 18.3333H14.1667C14.6087 18.3333 15.0326 18.1577 15.3452 17.8451C15.6577 17.5326 15.8333 17.1087 15.8333 16.6666V4.99996H4.16667ZM6.66667 4.99996V3.33329C6.66667 2.89127 6.84226 2.46734 7.15482 2.15478C7.46738 1.84222 7.89131 1.66663 8.33333 1.66663H11.6667C12.1087 1.66663 12.5326 1.84222 12.8452 2.15478C13.1577 2.46734 13.3333 2.89127 13.3333 3.33329V4.99996M8.33333 9.16663V14.1666M11.6667 9.16663V14.1666"
                                                                    stroke-width="1.5" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>

                                                        </a>

                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>John Doe</td>
                                            <td>17/08/2023</td>
                                            <td>102306</td>
                                            <td>150</td>
                                            <td>30</td>
                                            <td>-</td>
                                            <td>200</td>
                                            <td>-</td>
                                            <td>
                                                <ul class="d-flex gap-1 icons-wrap">

                                                    <li>
                                                        <a title="edit" href="#" data-bs-toggle="modal"
                                                            data-bs-target="#editmodal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" viewBox="0 0 20 20" fill="none">
                                                                <path
                                                                    d="M4.05882 5.0791H3.03921C2.49838 5.0791 1.9797 5.29395 1.59727 5.67637C1.21484 6.0588 1 6.57748 1 7.11831V16.2948C1 16.8356 1.21484 17.3543 1.59727 17.7367C1.9797 18.1191 2.49838 18.334 3.03921 18.334H12.2157C12.7565 18.334 13.2752 18.1191 13.6576 17.7367C14.04 17.3543 14.2549 16.8356 14.2549 16.2948V15.2752"
                                                                    stroke-width="1.52941" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                                <path
                                                                    d="M13.2361 3.03932L16.2949 6.09814M17.7071 4.6554C18.1087 4.25383 18.3343 3.70919 18.3343 3.14128C18.3343 2.57338 18.1087 2.02874 17.7071 1.62717C17.3055 1.2256 16.7609 1 16.193 1C15.6251 1 15.0804 1.2256 14.6789 1.62717L6.09888 10.1766V13.2354H9.1577L17.7071 4.6554Z"
                                                                    stroke-width="1.52941" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>

                                                        </a>

                                                    </li>
                                                    <li>
                                                        <a title="delete" href="javascript:void(0)" class="delete_doc"
                                                            title="Delete">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" viewBox="0 0 20 20" fill="none">
                                                                <path
                                                                    d="M2.5 4.99996H4.16667M4.16667 4.99996H17.5M4.16667 4.99996V16.6666C4.16667 17.1087 4.34226 17.5326 4.65482 17.8451C4.96738 18.1577 5.39131 18.3333 5.83333 18.3333H14.1667C14.6087 18.3333 15.0326 18.1577 15.3452 17.8451C15.6577 17.5326 15.8333 17.1087 15.8333 16.6666V4.99996H4.16667ZM6.66667 4.99996V3.33329C6.66667 2.89127 6.84226 2.46734 7.15482 2.15478C7.46738 1.84222 7.89131 1.66663 8.33333 1.66663H11.6667C12.1087 1.66663 12.5326 1.84222 12.8452 2.15478C13.1577 2.46734 13.3333 2.89127 13.3333 3.33329V4.99996M8.33333 9.16663V14.1666M11.6667 9.16663V14.1666"
                                                                    stroke-width="1.5" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>

                                                        </a>

                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>John Doe</td>
                                            <td>17/08/2023</td>
                                            <td>102306</td>
                                            <td>150</td>
                                            <td>30</td>
                                            <td>-</td>
                                            <td>200</td>
                                            <td>-</td>
                                            <td>
                                                <ul class="d-flex gap-1 icons-wrap">

                                                    <li>
                                                        <a title="edit" href="#" data-bs-toggle="modal"
                                                            data-bs-target="#editmodal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" viewBox="0 0 20 20" fill="none">
                                                                <path
                                                                    d="M4.05882 5.0791H3.03921C2.49838 5.0791 1.9797 5.29395 1.59727 5.67637C1.21484 6.0588 1 6.57748 1 7.11831V16.2948C1 16.8356 1.21484 17.3543 1.59727 17.7367C1.9797 18.1191 2.49838 18.334 3.03921 18.334H12.2157C12.7565 18.334 13.2752 18.1191 13.6576 17.7367C14.04 17.3543 14.2549 16.8356 14.2549 16.2948V15.2752"
                                                                    stroke-width="1.52941" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                                <path
                                                                    d="M13.2361 3.03932L16.2949 6.09814M17.7071 4.6554C18.1087 4.25383 18.3343 3.70919 18.3343 3.14128C18.3343 2.57338 18.1087 2.02874 17.7071 1.62717C17.3055 1.2256 16.7609 1 16.193 1C15.6251 1 15.0804 1.2256 14.6789 1.62717L6.09888 10.1766V13.2354H9.1577L17.7071 4.6554Z"
                                                                    stroke-width="1.52941" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>

                                                        </a>

                                                    </li>
                                                    <li>
                                                        <a title="delete" href="javascript:void(0)" class="delete_doc"
                                                            title="Delete">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" viewBox="0 0 20 20" fill="none">
                                                                <path
                                                                    d="M2.5 4.99996H4.16667M4.16667 4.99996H17.5M4.16667 4.99996V16.6666C4.16667 17.1087 4.34226 17.5326 4.65482 17.8451C4.96738 18.1577 5.39131 18.3333 5.83333 18.3333H14.1667C14.6087 18.3333 15.0326 18.1577 15.3452 17.8451C15.6577 17.5326 15.8333 17.1087 15.8333 16.6666V4.99996H4.16667ZM6.66667 4.99996V3.33329C6.66667 2.89127 6.84226 2.46734 7.15482 2.15478C7.46738 1.84222 7.89131 1.66663 8.33333 1.66663H11.6667C12.1087 1.66663 12.5326 1.84222 12.8452 2.15478C13.1577 2.46734 13.3333 2.89127 13.3333 3.33329V4.99996M8.33333 9.16663V14.1666M11.6667 9.16663V14.1666"
                                                                    stroke-width="1.5" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>

                                                        </a>

                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade product-modal order-modal" id="selltab" tabindex="-1" aria-labelledby="selltabs"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="selltabs">Add Sell</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row" method="post">
                            <div class="col-lg-12">
                                <label class="form-label">Customer</label>
                                <select class="form-select">
                                    <option>Select Customer</option>
                                    <option>John Deo</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Date</label>
                                <input type="date" class="form-control" id="Date" name="Date"
                                    value="12/8/2002" placeholder="Enter Date">
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">CH No.</label>
                                <input type="text" class="form-control" id="CH" name="CH_no"
                                    placeholder="1023562">
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Supplier</label>
                                <select class="form-select">
                                    <option>Select Supplier</option>
                                    <option>John Deo</option>
                                    <option>XYZ</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">No. of Filled Bottle Delivered</label>
                                <input type="text" class="form-control" id="Bottle_Delivered" name="Bottle_Delivered"
                                    placeholder="Enter Filled Bottle Delivered">
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">No. of Empty Bottle Received</label>
                                <input type="text" class="form-control" id="Bottle_Received" name="Bottle_Received"
                                    placeholder="Enter Empty Bottle Received">
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Total No. Of Bottle</label>
                                <input type="text" class="form-control" id="total_bottle" name="total_bottle"
                                    value="600" disabled>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label">Remark</label>
                                <textarea rows="2" type="text" class="form-control" id="Remark" name="Remark"
                                    placeholder="Enter Remark"></textarea>
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
        <div class="modal fade product-modal order-modal" id="editmodal" tabindex="-1" aria-labelledby="editmodal"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="editmodal">Edit Sell</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row" method="post">
                            <div class="col-lg-12">
                                <label class="form-label">Customer</label>
                                <select class="form-select">
                                    <option>Select Customer</option>
                                    <option>John Deo</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Date</label>
                                <input type="date" class="form-control" id="Date" name="Date"
                                    value="12/8/2002" placeholder="Enter Date">
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">CH No.</label>
                                <input type="text" class="form-control" id="CH" name="CH_no"
                                    placeholder="1023562">
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Supplier</label>
                                <select class="form-select">
                                    <option>Select Supplier</option>
                                    <option>John Deo</option>
                                    <option>XYZ</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">No. of Filled Bottle Delivered</label>
                                <input type="text" class="form-control" id="Bottle_Delivered" name="Bottle_Delivered"
                                    placeholder="Enter Filled Bottle Delivered">
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">No. of Empty Bottle Received</label>
                                <input type="text" class="form-control" id="Bottle_Received" name="Bottle_Received"
                                    placeholder="Enter Empty Bottle Received">
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Total No. Of Bottle</label>
                                <input type="text" class="form-control" id="total_bottle" name="total_bottle"
                                    value="600" disabled>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label">Remark</label>
                                <textarea rows="2" type="text" class="form-control" id="Remark" name="Remark"
                                    placeholder="Enter Remark"></textarea>
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
        <div class="modal fade view-modal" id="viewproduct" tabindex="-1" aria-labelledby="viewproduct"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="viewproduct">View Sell Detail</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="view-details">
                            <tbody>
                                <tr>
                                    <th>Date</th>
                                    <td>10/02/2023</td>
                                </tr>
                                <tr>
                                    <th>CH No.</th>
                                    <td>12345689521</td>
                                </tr>
                                <tr>
                                    <th>Customer Name</th>
                                    <td>XYZ</td>
                                </tr>
                                <tr>
                                    <th>No. of Bottle Delivered</th>
                                    <td>20</td>
                                </tr>
                                <tr>
                                    <th>No. of Empty Bottle Received</th>
                                    <td>10</td>
                                </tr>
                                <tr>
                                    <th>Rate</th>
                                    <td>6000</td>
                                </tr>
                                <tr>
                                    <th>Remark</th>
                                    <td>-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
