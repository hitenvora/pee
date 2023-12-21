<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="{{ route('index') }}"><img class="main-logo"
                    src="{{ asset('admin/assets/img/logo/PRAMUKH ENTERPRISE.svg') }}" alt="" /></a>
            <strong><a href="{{ route('index') }}"><img src="img/logo/logosn.png" alt="" /></a></strong>
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    <li class="{{ Route::is('index') ? 'active' : '' }}">
                        <a class="has-arrow" href="{{ route('index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path
                                    d="M20.94 10.8L19.2 9.06122V4.80002C19.2 4.14002 18.66 3.60002 18 3.60002H16.8C16.14 3.60002 15.6 4.14002 15.6 4.80002V5.46362L13.2 3.06602C12.8724 2.75642 12.5724 2.40002 12 2.40002C11.4276 2.40002 11.1276 2.75642 10.8 3.06602L3.06002 10.8C2.68562 11.19 2.40002 11.4744 2.40002 12C2.40002 12.6756 2.91842 13.2 3.60002 13.2H4.80002V20.4C4.80002 21.06 5.34002 21.6 6.00002 21.6H8.40002C9.06277 21.6 9.60002 21.0628 9.60002 20.4V15.6C9.60002 14.94 10.14 14.4 10.8 14.4H13.2C13.86 14.4 14.4 14.94 14.4 15.6V20.4C14.4 21.0628 14.3373 21.6 15 21.6H18C18.66 21.6 19.2 21.06 19.2 20.4V13.2H20.4C21.0816 13.2 21.6 12.6756 21.6 12C21.6 11.4744 21.3144 11.19 20.94 10.8Z"
                                    stroke-width="2" stroke-linejoin="round" />
                            </svg>
                            <span class="mini-click-non">Dashboard</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="true">
                            <li><a class="{{ Route::is('index') ? 'active' : '' }}" title="Dashboard v.1"
                                    href="{{ route('index') }}"><span class="mini-sub-pro">Dashboard 1</span></a></li>
                        </ul>
                    </li>
                    <li
                        class="{{ Route::is('admin.group-master', 'admin.company-master', 'admin.hsn-code', 'admin.year-master', 'admin.gst-master') ? 'active' : '' }}">
                        <a class="has-arrow" href="{{ route('index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path
                                    d="M20.94 10.8L19.2 9.06122V4.80002C19.2 4.14002 18.66 3.60002 18 3.60002H16.8C16.14 3.60002 15.6 4.14002 15.6 4.80002V5.46362L13.2 3.06602C12.8724 2.75642 12.5724 2.40002 12 2.40002C11.4276 2.40002 11.1276 2.75642 10.8 3.06602L3.06002 10.8C2.68562 11.19 2.40002 11.4744 2.40002 12C2.40002 12.6756 2.91842 13.2 3.60002 13.2H4.80002V20.4C4.80002 21.06 5.34002 21.6 6.00002 21.6H8.40002C9.06277 21.6 9.60002 21.0628 9.60002 20.4V15.6C9.60002 14.94 10.14 14.4 10.8 14.4H13.2C13.86 14.4 14.4 14.94 14.4 15.6V20.4C14.4 21.0628 14.3373 21.6 15 21.6H18C18.66 21.6 19.2 21.06 19.2 20.4V13.2H20.4C21.0816 13.2 21.6 12.6756 21.6 12C21.6 11.4744 21.3144 11.19 20.94 10.8Z"
                                    stroke-width="2" stroke-linejoin="round" />
                            </svg>
                            <span class="mini-click-non">Master</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="true">
                            <li>
                                <a class="{{ Route::is('admin.group-master') ? 'active' : '' }}" title="Dashboard v.1"
                                    href="{{ route('admin.group-master') }}"><span
                                        class="mini-sub-pro">Group</span></a>
                            </li>
                        </ul>
                        <ul class="submenu-angle" aria-expanded="true">
                            <li>
                                <a class="{{ Route::is('admin.company-master') ? 'active' : '' }}"
                                    title="Dashboard v.1" href="{{ route('admin.company-master') }}"><span
                                        class="mini-sub-pro">Company</span></a>
                            </li>
                        </ul>
                        <ul class="submenu-angle" aria-expanded="true">
                            <li>
                                <a class="{{ Route::is('admin.hsn-code') ? 'active' : '' }}" title="Dashboard v.1"
                                    href="{{ route('admin.hsn-code') }}"><span class="mini-sub-pro">HSN</span></a>
                            </li>
                        </ul>
                        <ul class="submenu-angle" aria-expanded="true">
                            <li>
                                <a class="{{ Route::is('admin.year-master') ? 'active' : '' }}" title="Dashboard v.1"
                                    href="{{ route('admin.year-master') }}"><span class="mini-sub-pro">Yaer
                                        Master</span></a>
                            </li>
                        </ul>
                        <ul class="submenu-angle" aria-expanded="true">
                            <li>
                                <a class="{{ Route::is('admin.gst-master') ? 'active' : '' }}" title="Dashboard v.1"
                                    href="{{ route('admin.gst-master') }}"><span class="mini-sub-pro">GST
                                        Master</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ Route::is('admin.product') ? 'active' : '' }}">
                        <a title="Product Page" href="{{ route('admin.product') }}" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path
                                    d="M21.5322 7.20002H2.46786M14.9996 10.5C12.6565 10.5 8.99963 10.5 8.99963 10.5M21.6 7.76659V19.2C21.6 20.5255 20.5255 21.6 19.2 21.6H4.80002C3.47454 21.6 2.40002 20.5255 2.40002 19.2V7.76659C2.40002 7.394 2.48677 7.02653 2.6534 6.69327L4.30252 3.39504C4.60742 2.78523 5.2307 2.40002 5.91249 2.40002H18.0876C18.7694 2.40002 19.3926 2.78523 19.6975 3.39504L21.3467 6.69328C21.5133 7.02653 21.6 7.394 21.6 7.76659Z"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span class="mini-click-non">Products</span>
                        </a>
                    </li>
                    <li class="{{ Route::is('orders') ? 'active' : '' }}">
                        <a href="{{ route('orders') }}" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path
                                    d="M8.4002 7.20002H15.6002M8.4002 10.8H15.6002M8.4002 14.4H12.0002M6.59992 2.40002H17.4001C18.7256 2.40002 19.8002 3.47457 19.8001 4.80007L19.7999 19.2001C19.7998 20.5255 18.7253 21.6 17.3999 21.6L6.59982 21.6C5.27433 21.6 4.19982 20.5254 4.19983 19.2L4.19992 4.80001C4.19993 3.47453 5.27444 2.40002 6.59992 2.40002Z"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span class="mini-click-non">Orders</span>
                        </a>
                    </li>
                    <li class="{{ Route::is('admin.company') ? 'active' : '' }}">
                        <a href="{{ route('admin.company') }}" aria-expanded="false">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="Office building">
                                    <path id="Icon"
                                        d="M19 21V5C19 3.89543 18.1046 3 17 3H7C5.89543 3 5 3.89543 5 5V21M19 21L21 21M19 21H14M5 21L3 21M5 21H10M9 6.99998H10M9 11H10M14 6.99998H15M14 11H15M10 21V16C10 15.4477 10.4477 15 11 15H13C13.5523 15 14 15.4477 14 16V21M10 21H14"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </g>
                            </svg>
                            <span class="mini-click-non">Company</span>
                        </a>
                    </li>
                    <li class="{{ Route::is('supplier') ? 'active' : '' }}">
                        <a href="{{ route('supplier') }}" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M16.0254 20.5707L16.0257 17.3569C16.0259 15.5818 14.5869 14.1426 12.8117 14.1426H5.61444C3.83951 14.1426 2.40059 15.5814 2.40039 17.3563L2.40002 20.5707M21.5997 20.5709L21.6 17.3571C21.6002 15.5819 20.1612 14.1428 18.386 14.1428M15.4064 4.06048C16.1957 4.64612 16.7072 5.58498 16.7072 6.64331C16.7072 7.70164 16.1957 8.64049 15.4064 9.22613M12.4938 6.64313C12.4938 8.41821 11.0548 9.85719 9.27977 9.85719C7.50469 9.85719 6.06571 8.41821 6.06571 6.64313C6.06571 4.86806 7.50469 3.42908 9.27977 3.42908C11.0548 3.42908 12.4938 4.86806 12.4938 6.64313Z"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span class="mini-click-non">Supplier</span>
                        </a>
                    </li>
                    <li class="{{ Route::is('customer') ? 'active' : '' }}">
                        <a href="{{ route('customer') }}" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M19.2 13.6857C20.4674 14.6326 21.6 17.0166 21.6 18.4856C21.6 18.9432 21.2661 19.3142 20.8543 19.3142H20.4M15.6 9.80444C16.4199 9.33018 16.9715 8.44377 16.9715 7.42853C16.9715 6.41328 16.4199 5.52687 15.6 5.05261M3.14579 19.3142H16.2828C16.6947 19.3142 17.0286 18.9432 17.0286 18.4856C17.0286 15.609 14.6253 13.2771 9.71431 13.2771C4.80329 13.2771 2.40002 15.609 2.40002 18.4856C2.40002 18.9432 2.73392 19.3142 3.14579 19.3142ZM12.4572 7.42853C12.4572 8.94336 11.2291 10.1714 9.71431 10.1714C8.19947 10.1714 6.97145 8.94336 6.97145 7.42853C6.97145 5.91369 8.19947 4.68567 9.71431 4.68567C11.2291 4.68567 12.4572 5.91369 12.4572 7.42853Z"
                                    stroke-width="2" stroke-linecap="round" />
                            </svg>
                            <span class="mini-click-non">Customer</span>
                        </a>
                    </li>
                    <li class="{{ Route::is('bank') ? 'active' : '' }}">
                        <a href="{{ route('bank') }}" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M4.00002 15V12.3314M9.33336 15V12.3314M14.6667 15V12.3314M20 15V12.3314M2.40002 18.4H21.6V21.6H2.40002V18.4ZM2.40002 8.80002V6.66669L11.6055 2.40002L21.6 6.66669V8.80002H2.40002Z"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span class="mini-click-non">Bank</span>
                        </a>
                    </li>
                    <li class="{{ Route::is('sell') ? 'active' : '' }}">
                        <a href="{{ route('sell') }}" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <g clip-path="url(#clip0_2229_603)">
                                    <path
                                        d="M15.55 13C16.3 13 16.96 12.59 17.3 11.97L20.88 5.48C21.25 4.82 20.77 4 20.01 4H5.21L4.27 2H1V4H3L6.6 11.59L5.25 14.03C4.52 15.37 5.48 17 7 17H19V15H7L8.1 13H15.55ZM6.16 6H18.31L15.55 11H8.53L6.16 6ZM7 18C5.9 18 5.01 18.9 5.01 20C5.01 21.1 5.9 22 7 22C8.1 22 9 21.1 9 20C9 18.9 8.1 18 7 18ZM17 18C15.9 18 15.01 18.9 15.01 20C15.01 21.1 15.9 22 17 22C18.1 22 19 21.1 19 20C19 18.9 18.1 18 17 18Z"
                                        fill="black" stroke="none" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_2229_603">
                                        <rect width="24" height="24" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                            <span class="mini-click-non">Sell</span>
                        </a>
                    </li>
                    <li class="{{ Route::is('') ? 'active' : '' }}">
                        <a class="has-arrow" href="" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M15.0002 2.40002V6.00002C15.0002 6.66277 15.5375 7.20002 16.2002 7.20002H19.8002M8.4002 7.20002H10.8002M8.4002 10.8H15.6002M8.4002 14.4H15.6002M18.0002 4.20002C17.4661 3.72217 16.9119 3.1554 16.5621 2.7873C16.3292 2.54236 16.0076 2.40002 15.6696 2.40002H6.59992C5.27444 2.40002 4.19993 3.47453 4.19992 4.80001L4.19983 19.2C4.19982 20.5254 5.27433 21.6 6.59982 21.6L17.3999 21.6C18.7253 21.6 19.7998 20.5255 19.7999 19.2001L19.8002 6.47786C19.8002 6.17102 19.6831 5.87606 19.4702 5.65516C19.0764 5.24667 18.4188 4.57454 18.0002 4.20002Z"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span class="mini-click-non">Billing</span>
                        </a>
                        <ul class="submenu-angle chart-mini-nb-dp" aria-expanded="false">
                            <li><a title="Bar Charts" href=""><span class="mini-sub-pro">Bar
                                        Charts</span></a></li>
                        </ul>
                    </li>

                    <li
                        class="{{ Route::is('new-stock') ? 'active' : '' }} {{ Route::is('stock-list') ? 'active' : '' }}">
                        <a class="has-arrow" href="#" aria-expanded="false">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="#000"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="Stock" clip-path="url(#clip0_2229_647)">
                                    <g id="Group">
                                        <path id="Vector"
                                            d="M13.3847 8.81616H15.2307C15.613 8.81616 15.923 8.50617 15.923 8.12382C15.923 7.74146 15.613 7.43152 15.2307 7.43152H13.3846C13.0023 7.43152 12.6923 7.7415 12.6923 8.12386C12.6923 8.50622 13.0023 8.81621 13.3846 8.81621L13.3847 8.81616Z"
                                            stroke-width="0.2" />
                                        <path id="Vector_2"
                                            d="M23.3077 10.2008H18.2307V0.739219C18.2307 0.356859 17.9207 0.046875 17.5384 0.046875H6.46163C6.07927 0.046875 5.76928 0.356859 5.76928 0.739219V10.2008H0.692344C0.309984 10.2008 0 10.5106 0 10.893V21.0469C0 21.4292 0.309984 21.7392 0.692344 21.7392H23.3077C23.69 21.7392 24 21.4292 24 21.0469V10.893C24 10.5106 23.69 10.2008 23.3077 10.2008ZM16.3847 11.5852H18.6923V14.8162H16.3847V11.5852ZM13.1539 1.43156V4.66228H10.846V1.43152L13.1539 1.43156ZM7.15387 1.43156H9.46153V5.35458C9.46153 5.73694 9.77137 6.04692 10.1539 6.04692H13.846C14.2285 6.04692 14.5384 5.73694 14.5384 5.35458V1.43156H16.846V10.2008H7.15392L7.15387 1.43156ZM7.38459 11.5853V14.8162H5.07694V11.5853H7.38459ZM1.38459 11.5853H3.69225V15.5085C3.69225 15.8909 4.00228 16.2009 4.38459 16.2009H8.07694C8.45925 16.2009 8.76928 15.8909 8.76928 15.5085V11.5853H11.3076V20.3545H1.38469L1.38459 11.5853ZM22.6154 20.3545H12.6923V11.5852H15V15.5085C15 15.8908 15.31 16.2008 15.6923 16.2008H19.3847C19.767 16.2008 20.077 15.8908 20.077 15.5085V11.5852H22.6154V20.3545Z"
                                            stroke-width="0.2" />
                                        <path id="Vector_3"
                                            d="M19.1539 17.5852C18.7714 17.5852 18.4616 17.8952 18.4616 18.2775C18.4616 18.6599 18.7714 18.9699 19.1539 18.9699H21C21.3823 18.9699 21.6923 18.6599 21.6923 18.2775C21.6923 17.8952 21.3823 17.5852 21 17.5852H19.1539ZM9.46163 17.5852H7.61532C7.23301 17.5852 6.92297 17.8952 6.92297 18.2775C6.92297 18.6599 7.23301 18.9699 7.61532 18.9699H9.46158C9.8439 18.9699 10.1539 18.6599 10.1539 18.2775C10.1539 17.8952 9.8439 17.5852 9.46158 17.5852H9.46163Z"
                                            stroke-width="0.2" />
                                    </g>
                                </g>
                                <defs>
                                    <clipPath id="clip0_2229_647">
                                        <rect width="24" height="24" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                            <span class="mini-click-non">Stock</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a class="{{ Route::is('new-stock') ? 'active' : '' }}" title="New Stock"
                                    href="{{ route('new-stock') }}"><span class="mini-sub-pro">New Stock</span></a>
                            </li>
                            <li><a class="{{ Route::is('stock-list') ? 'active' : '' }}" title="Stock-list"
                                    href="{{ route('stock-list') }}"><span class="mini-sub-pro">Stock-list</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ Route::is('cash-manage') ? 'active' : '' }}">
                        <a href="{{ route('cash-manage') }}" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M17.5 5H6.5H9.5C10.5609 5 11.5783 5.42143 12.3284 6.17157C13.0786 6.92172 13.5 7.93913 13.5 9C13.5 10.0609 13.0786 11.0783 12.3284 11.8284C11.5783 12.5786 10.5609 13 9.5 13H6.5L12.5 19M6.5 9H17.5"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span class="mini-click-non">Cash Manage</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </nav>
</div>
