@extends('layouts.admin.admin')

@section('title')
    Master Forms
@endsection

@section('content')
    <div class="all-content-wrapper">
        <div class="header-advance-area">
            <div class="main-page master">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3>Master Forms</h3>
                            <ul class="menu-list d-flex flex-wrap" id="menu-list">
                                <li class="box-card master-color-1">
                                    <a href="{{ route('admin.year-master') }}">
                                        <div class="d-flex align-items-center flex-column">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('admin/assets/img/logo/finance.png') }}"
                                                    alt="" />
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="m-0">Financial Year Master</h5>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="box-card master-color-2">
                                    <a href="{{ route('admin.admins-master') }}">
                                        <div class="d-flex align-items-center flex-column">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('admin/assets/img/logo/user_master.png') }}"
                                                    alt="" />
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="m-0">Admin Master</h5>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                {{-- <li class="box-card color-3">
                                    <a href="{{ route('admin.company') }}">
                                        <div class="d-flex align-items-center flex-column">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('admin/assets/img/logo/company.png') }}"
                                                    alt="" />
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="m-0">Company Master</h5>
                                            </div>
                                        </div>
                                    </a>
                                </li> --}}
                                <li class="box-card color-4">
                                    <a href="{{ route('admin.product-master') }}">
                                        <div class="d-flex align-items-center flex-column">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('admin/assets/img/logo/product.png') }}"
                                                    alt="" />
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="m-0">Product Master</h5>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="box-card master-color-3">
                                    <a href="{{ route('admin.hsn-code') }}">
                                        <div class="d-flex align-items-center flex-column">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('admin/assets/img/logo/hsn.png') }}" alt="" />
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="m-0">HSN Master</h5>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="box-card master-color-4">
                                    <a href="{{ route('admin.gst-master') }}">
                                        <div class="d-flex align-items-center flex-column">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('admin/assets/img/logo/gst.png') }}" alt="" />
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="m-0">GST(%) Master</h5>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="box-card master-color-5">
                                    <a href="group_master.html">
                                        <div class="d-flex align-items-center flex-column">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('admin/assets/img/logo/group.png') }}" alt="" />
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="m-0">Group Master</h5>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="box-card color-5">
                                    <a href="{{ route('admin.account-master') }}">
                                        <div class="d-flex align-items-center flex-column">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('admin/assets/img/logo/account.png') }}"
                                                    alt="" />
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="m-0">Account Master</h5>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="box-card color-11">
                                    <a href="{{ route('admin.product-discount') }}">
                                        <div class="d-flex align-items-center flex-column">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('admin/assets/img/logo/discount.png') }}"
                                                    alt="" />
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="m-0">Customer Product Discount Master</h5>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="box-card master-color-6">
                                    <a href="{{ route('admin.purchase_empty_bottle') }}">
                                        <div class="d-flex align-items-center flex-column">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('admin/assets/img/logo/gas_bottle.png') }}"
                                                    alt="" />
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="m-0">Purchase Empty Bottle Master</h5>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="box-card master-color-7">
                                    <a href="{{ route('customer-stock-list') }}">
                                        <div class="d-flex align-items-center flex-column">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('admin/assets/img/logo/cust_stock.png') }}"
                                                    alt="" />
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="m-0">Customer Stock Master</h5>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
