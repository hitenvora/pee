@extends('layouts.admin.admin')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="all-content-wrapper">
        <div class="header-advance-area">
            <div class="main-page">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="top-menu d-flex flex-wrap">
                                <li class="box-card bgc-light-success b-success">
                                    <a href="javascript:void(0);">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 bgc-success">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    viewBox="0 0 30 30" fill="none">
                                                    <g clip-path="url(#clip0_3211_29033)">
                                                        <path
                                                            d="M18.9025 6.14253V4.20815H19.3437C20.4975 4.20815 21.4478 3.25792 21.4478 2.10407C21.4478 0.950226 20.4975 0 19.3437 0H10.6559C9.50205 0 8.55182 0.950226 8.55182 2.10407C8.55182 3.25792 9.50205 4.20815 10.6559 4.20815H11.0971V6.14253C8.51789 6.31222 6.51562 8.45023 6.51562 11.0294V16.3575H23.4839V11.0294C23.4839 8.45023 21.4817 6.31222 18.9025 6.14253ZM17.2057 6.1086H15.8482V5.36199H14.1514V6.1086H12.7939V4.17421H17.2057V6.1086ZM6.51562 18.0543V23.4842C6.51562 25.3507 7.56766 27.0475 9.23056 27.8959V30H20.769V27.8959C22.4319 27.0475 23.4839 25.3507 23.4839 23.4842V18.0543H6.51562Z"
                                                            fill="url(#paint0_linear_3211_29033)" />
                                                    </g>
                                                    <defs>
                                                        <linearGradient id="paint0_linear_3211_29033" x1="14"
                                                            y1="7.5" x2="14" y2="35"
                                                            gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="white" />
                                                            <stop offset="1" stop-color="#21C36A" />
                                                        </linearGradient>
                                                        <clipPath id="clip0_3211_29033">
                                                            <rect width="30" height="30" fill="white" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h3>{{ $totalBottle }}</h3>
                                                <h5 class="m-0">Total Bottle</h5>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="box-card bgc-light-warning b-warning">
                                    <a href="javascript:void(0);">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 bgc-warning">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    viewBox="0 0 30 30" fill="none">
                                                    <g clip-path="url(#clip0_3211_29044)">
                                                        <path
                                                            d="M18.9025 6.14253V4.20815H19.3437C20.4975 4.20815 21.4478 3.25792 21.4478 2.10407C21.4478 0.950226 20.4975 0 19.3437 0H10.6559C9.50205 0 8.55182 0.950226 8.55182 2.10407C8.55182 3.25792 9.50205 4.20815 10.6559 4.20815H11.0971V6.14253C8.51789 6.31222 6.51562 8.45023 6.51562 11.0294V16.3575H23.4839V11.0294C23.4839 8.45023 21.4817 6.31222 18.9025 6.14253ZM17.2057 6.1086H15.8482V5.36199H14.1514V6.1086H12.7939V4.17421H17.2057V6.1086ZM6.51562 18.0543V23.4842C6.51562 25.3507 7.56766 27.0475 9.23056 27.8959V30H20.769V27.8959C22.4319 27.0475 23.4839 25.3507 23.4839 23.4842V18.0543H6.51562Z"
                                                            fill="url(#paint0_linear_3211_29044)" />
                                                    </g>
                                                    <defs>
                                                        <linearGradient id="paint0_linear_3211_29044" x1="14"
                                                            y1="7.5" x2="14" y2="35"
                                                            gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="white" />
                                                            <stop offset="1" stop-color="#FF9343" />
                                                        </linearGradient>
                                                        <clipPath id="clip0_3211_29044">
                                                            <rect width="30" height="30" fill="white" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h3>{{ $totalEmptyBottle }}</h3>
                                                <h5 class="m-0">Total Empty Bottle</h5>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="box-card bgc-light-purple b-purple">
                                    <a href="javascript:void(0);">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 bgc-purple">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    viewBox="0 0 30 30" fill="none">
                                                    <g clip-path="url(#clip0_3211_29055)">
                                                        <path
                                                            d="M18.9025 6.14253V4.20815H19.3437C20.4975 4.20815 21.4478 3.25792 21.4478 2.10407C21.4478 0.950226 20.4975 0 19.3437 0H10.6559C9.50205 0 8.55182 0.950226 8.55182 2.10407C8.55182 3.25792 9.50205 4.20815 10.6559 4.20815H11.0971V6.14253C8.51789 6.31222 6.51562 8.45023 6.51562 11.0294V16.3575H23.4839V11.0294C23.4839 8.45023 21.4817 6.31222 18.9025 6.14253ZM17.2057 6.1086H15.8482V5.36199H14.1514V6.1086H12.7939V4.17421H17.2057V6.1086ZM6.51562 18.0543V23.4842C6.51562 25.3507 7.56766 27.0475 9.23056 27.8959V30H20.769V27.8959C22.4319 27.0475 23.4839 25.3507 23.4839 23.4842V18.0543H6.51562Z"
                                                            fill="url(#paint0_linear_3211_29055)" />
                                                    </g>
                                                    <defs>
                                                        <linearGradient id="paint0_linear_3211_29055" x1="14"
                                                            y1="7.5" x2="14" y2="35"
                                                            gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="white" />
                                                            <stop offset="1" stop-color="#7D55FF" />
                                                        </linearGradient>
                                                        <clipPath id="clip0_3211_29055">
                                                            <rect width="30" height="30" fill="white" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h3>{{ $totalFilledBottle }}</h3>
                                                <h5 class="m-0">Total Filled Bottle</h5>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="box-card bgc-light-sky b-sky">
                                    <a href="javascript:void(0);">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 bgc-sky">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    viewBox="0 0 30 30" fill="none">
                                                    <g clip-path="url(#clip0_3225_33318)">
                                                        <path
                                                            d="M15 0.9375C12.2187 0.9375 9.49987 1.76225 7.1873 3.30746C4.87473 4.85267 3.07231 7.04893 2.00795 9.61851C0.943593 12.1881 0.665109 15.0156 1.20771 17.7435C1.75032 20.4713 3.08964 22.977 5.05632 24.9437C7.02299 26.9104 9.52869 28.2497 12.2565 28.7923C14.9844 29.3349 17.8119 29.0564 20.3815 27.9921C22.9511 26.9277 25.1473 25.1253 26.6925 22.8127C28.2378 20.5001 29.0625 17.7813 29.0625 15C29.0625 13.1533 28.6988 11.3247 27.9921 9.61851C27.2854 7.91237 26.2495 6.36213 24.9437 5.05631C23.6379 3.75049 22.0876 2.71465 20.3815 2.00794C18.6754 1.30124 16.8467 0.9375 15 0.9375ZM17.8125 10.8781H18.4863C18.7349 10.8781 18.9734 10.9769 19.1492 11.1527C19.325 11.3285 19.4238 11.567 19.4238 11.8156C19.4238 12.0643 19.325 12.3027 19.1492 12.4785C18.9734 12.6544 18.7349 12.7531 18.4863 12.7531H18.04C17.9337 13.8526 17.4221 14.8732 16.6047 15.6163C15.7874 16.3594 14.7228 16.7717 13.6181 16.7731H13.32L16.8875 20.5344C16.9756 20.623 17.0451 20.7283 17.0919 20.8442C17.1387 20.9601 17.1618 21.0841 17.16 21.2091C17.1582 21.334 17.1314 21.4573 17.0812 21.5718C17.031 21.6862 16.9584 21.7895 16.8678 21.8755C16.7771 21.9615 16.6702 22.0285 16.5532 22.0725C16.4363 22.1166 16.3118 22.1369 16.1869 22.1321C16.062 22.1273 15.9394 22.0977 15.8261 22.0448C15.7129 21.992 15.6114 21.917 15.5275 21.8244L10.4588 16.4806C10.3327 16.3476 10.2483 16.1806 10.2162 16.0002C10.184 15.8198 10.2054 15.6339 10.2778 15.4655C10.3501 15.2971 10.4702 15.1537 10.6233 15.0528C10.7763 14.952 10.9555 14.8982 11.1388 14.8981H13.6181C14.2246 14.8967 14.811 14.6805 15.2733 14.2878C15.7355 13.8952 16.0437 13.3514 16.1431 12.7531H11.1806C10.932 12.7531 10.6935 12.6544 10.5177 12.4785C10.3419 12.3027 10.2431 12.0643 10.2431 11.8156C10.2431 11.567 10.3419 11.3285 10.5177 11.1527C10.6935 10.9769 10.932 10.8781 11.1806 10.8781H15.7356C15.5004 10.5344 15.1848 10.2533 14.8164 10.059C14.448 9.8647 14.0378 9.76315 13.6213 9.76313H11.1419C10.8932 9.76313 10.6548 9.66435 10.479 9.48854C10.3032 9.31272 10.2044 9.07427 10.2044 8.82563C10.2044 8.57698 10.3032 8.33853 10.479 8.16271C10.6548 7.9869 10.8932 7.88813 11.1419 7.88813H13.6213C13.6563 7.88813 13.6894 7.8925 13.7238 7.89312H18.4894C18.738 7.89312 18.9765 7.9919 19.1523 8.16771C19.3281 8.34353 19.4269 8.58198 19.4269 8.83062C19.4269 9.07927 19.3281 9.31772 19.1523 9.49354C18.9765 9.66935 18.738 9.76812 18.4894 9.76812H17.2444C17.4862 10.1093 17.6785 10.483 17.8156 10.8781H17.8125Z"
                                                            fill="url(#paint0_linear_3225_33318)" />
                                                    </g>
                                                    <defs>
                                                        <linearGradient id="paint0_linear_3225_33318" x1="13.5"
                                                            y1="10.5" x2="15" y2="31"
                                                            gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="white" />
                                                            <stop offset="1" stop-color="#438FF2" />
                                                        </linearGradient>
                                                        <clipPath id="clip0_3225_33318">
                                                            <rect width="30" height="30" fill="white" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h3>10,000</h3>
                                                <h5 class="m-0">Total Revenue</h5>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="box-card bgc-light-pink b-pink">
                                    <a href="javascript:void(0);">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 bgc-pink">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    viewBox="0 0 30 30" fill="none">
                                                    <path
                                                        d="M26.4891 9.22395H6.29439C6.04575 9.22395 5.80729 9.12518 5.63148 8.94937C5.45566 8.77355 5.35689 8.53509 5.35689 8.28645C5.35689 8.03781 5.45566 7.79936 5.63148 7.62354C5.80729 7.44773 6.04575 7.34895 6.29439 7.34895H22.7681V3.83333C22.7681 3.33364 22.5441 2.8677 22.1541 2.55552C21.9624 2.40173 21.7386 2.29319 21.4991 2.238C21.2597 2.1828 21.0109 2.18238 20.7713 2.23677L3.15189 6.19302C2.78873 6.27331 2.464 6.4755 2.2317 6.76596C1.99939 7.05642 1.87352 7.41765 1.87501 7.78958V26.1674C1.87501 27.0693 2.60908 27.8043 3.51095 27.8043H26.4891C27.3909 27.8043 28.125 27.0702 28.125 26.1674V10.8599C28.125 9.95802 27.3909 9.22395 26.4891 9.22395ZM23.5369 20.1852C22.6603 20.1852 21.9478 19.4718 21.9478 18.5952C21.9478 17.7186 22.6613 17.0052 23.5369 17.0052C24.4144 17.0052 25.1269 17.7186 25.1269 18.5952C25.1269 19.4718 24.4144 20.1852 23.5369 20.1852Z"
                                                        fill="url(#paint0_linear_3211_29075)" />
                                                    <defs>
                                                        <linearGradient id="paint0_linear_3211_29075" x1="15"
                                                            y1="9.49988" x2="15" y2="33.4999"
                                                            gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="white" />
                                                            <stop offset="1" stop-color="#FE577B" />
                                                        </linearGradient>
                                                    </defs>
                                                </svg>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h3>6000</h3>
                                                <h5 class="m-0">Total Expense</h5>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <h4>Forms</h4>
                            <ul class="menu-list d-flex flex-wrap" id="menu-list">
                                <li class="box-card color-1">
                                    <a href="{{ route('admin.master-form') }}">
                                        <div class="d-flex align-items-center flex-column">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('admin/assets/img/logo/form.png') }}" alt="" />
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="m-0">Master Forms</h5>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="box-card color-2">
                                    <a href="{{ route('admin.order') }}">
                                        <div class="d-flex align-items-center flex-column">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('admin/assets/img/logo/order.png') }}"
                                                    alt="" />
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="m-0">Orders</h5>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="box-card color-3">
                                    <a href="{{ route('admin.add-sell') }}">
                                        <div class="d-flex align-items-center flex-column">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('admin/assets/img/logo/sell.png') }}" alt="" />
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="m-0">Sell</h5>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="box-card color-4">
                                    <a href="{{ route('stock-list') }}">
                                        <div class="d-flex align-items-center flex-column">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('admin/assets/img/logo/stock.png') }}"
                                                    alt="" />
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="m-0">Stock</h5>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="box-card color-10">
                                    <a href="{{ route('order.stock.list') }}">
                                        <div class="d-flex align-items-center flex-column">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('admin/assets/img/logo/cust_stock.png') }}"
                                                    alt="">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="m-0">Add Order Stock</h5>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="box-card color-5">
                                    <a href="{{ route('admin.account-master-form') }}">
                                        <div class="d-flex align-items-center flex-column">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('admin/assets/img/logo/account.png') }}"
                                                    alt="" />
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="m-0">Cash Account</h5>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <h4>Company List</h4>
                            <ul class="menu-list d-flex flex-wrap mb-3" id="menu-list">
                                <li class="box-card color-6">
                                    <a href="{{ route('go-gas') }}">
                                        <div class="d-flex align-items-center flex-column">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('admin/assets/img/logo/go.png') }}" alt="" />
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="m-0">Go Gas</h5>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="box-card color-7">
                                    <a href="{{ route('hp-gas') }}">
                                        <div class="d-flex align-items-center flex-column">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('admin/assets/img/logo/hp.png') }}" alt="" />
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="m-0">HP Gas</h5>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="box-card color-8">
                                    <a href="{{ route('indian-gas') }}">
                                        <div class="d-flex align-items-center flex-column">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('admin/assets/img/logo/indian.png') }}"
                                                    alt="" />
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="m-0">Indian</h5>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="box-card color-9">
                                    <a href="{{ route('bharat-gas') }}">
                                        <div class="d-flex align-items-center flex-column">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('admin/assets/img/logo/bharat.png') }}"
                                                    alt="" />
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="m-0">Bharat Gas</h5>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="box-card color-12">
                                    <a href="{{ route('pure-gas') }}">
                                        <div class="d-flex align-items-center flex-column">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('admin/assets/img/logo/other.png') }}"
                                                    alt="" />
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="m-0">Pure Gas</h5>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="box-card color-11">
                                    <a href="{{ route('reliance-gas') }}">
                                        <div class="d-flex align-items-center flex-column">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('admin/assets/img/logo/reliance.png') }}"
                                                    alt="" />
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="m-0">Relience</h5>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="box-card color-10">
                                    <a href="{{ route('other-gas') }}">
                                        <div class="d-flex align-items-center flex-column">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('admin/assets/img/logo/other.png') }}"
                                                    alt="" />
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="m-0">Other</h5>
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
