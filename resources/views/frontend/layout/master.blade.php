<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="author" content="www.frebsite.nl" />
        <meta
            name="viewport"
            content="width=device-width minimum-scale=1.0 maximum-scale=1.0 user-scalable=no"
        />
        <title>Nhóm B | @yield('title') </title>
        <link rel="icon" href="./Public/image/logo-3016.png" type="image/x-icon">
        <link rel="shortcut icon" href="./Public/image/logo-3016.png" type="image/x-icon">

        <!-- Add the Font Awesome CSS link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <!-- Link css -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link type="text/css" rel="stylesheet" href="{{ asset('front/public/css/gioithieu.css')}}" />
        <link type="text/css" rel="stylesheet" href="{{ asset('front/public/css/styles.css')}}" />
        <link type="text/css" rel="stylesheet" href="{{ asset('front/public/css/mmenu.css')}}" />
        <link type="text/css" rel="stylesheet" href="{{ asset('front/public/css/sanpham.css')}}" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <!-- Liên kết đến tệp CSS của Slick Carousel qua CDN -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

         <!-- Magic zoom -->
         <link rel="stylesheet" href="{{ asset('front/public/css/magiczoomplus.css')}}">
         <script src="{{ asset('front/public/js/magiczoomplus.js')}}"></script>
        <!-- Load the css and js file in your document -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link href="{{ asset('front/public/css/HoldOn.min.css')}}" rel="stylesheet">
        <script src="{{ asset('front/public/js/HoldOn.min.js')}}"></script>
        <!-- for the one page layout -->
        <style type="text/css">
            #content {
                padding-top: 0;
                padding-bottom: 0;
            }
            section {
                display: flex;
                flex-direction: column;
                justify-content: center;
                min-height: calc(100vh - 44px);
                padding: 50px 0 50px;
                border-top: 1px solid #ccc;
            }

            section:first-child {
                border-top: none;
                padding-top: 0;
            }
        </style>
    </head>
    <body >
        <!-- menu -->
        <nav class="menu" id="menu">
            <ul>
                <li><a href="{{ url('/') }}">Trang chủ</a></li>
                <li><a href="{{ url('/gioi-thieu') }}">Giới Thiệu</a></li>
                <li>
                    <span>Sản Phẩm</span>
                    <ul>
                        <li><a href="#/">Nội Thất Phòng Khách</a></li>
                        <li><a href="#/">Nội Thất Phòng Bếp</a>
                        </li>
                        <li><a href="#/">Nội Thất Phòng Ngủ</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('/chinh-sach') }}">Chính Sách</a></li>
                <li><a href="{{ url('/tin-tuc') }}">Tin Tức</a></li>
                <li class="Divider"><a href="{{ url('/lien-he') }}">Liên Hệ</a></li>
            </ul>
        </nav>
        <!--Content -->
        <div class="page">
            <div class="wrap-header-menu-logo ">
                <div class="wrap-content d-flex align-items-center">
                    <div class="wrap-logo">
                        <a class="logo-header"  href="{{ url('/') }}">
                            <img class="lazy loaded" src="{{ asset('front/public/image/logo_web.png')}}" data-was-processed="true" style="width: 120px; height: 120px;">          
                        </a>
                    </div>
                    <div class="wrap-header-menu">
                        <div class="header d-flex justify-content-between align-items-center" style="border-bottom: 1px solid white;">
                            <p class="info-header">Hotline: <span>0123 456 789</span></p>
                            <div class="box-info__header d-flex align-items-center">
                                <div class="search d-flex">
                                    <form action="{{route('search')}}" method="GET" id="searchForm">
                                        @csrf
                                        <input type="text" name="searchProduct" id="keyword" placeholder="Tìm Kiếm" required>
                                        <p id="searchIcon" onclick="performSearch()">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </p>
                                        <span id="searchError1" class="d-none alert alert-danger" style="position:absolute;"></span>
                                        @if ($errors->has('searchProduct'))
                                            <span id="searchError" class="d-block alert alert-danger" style="position:absolute;">{{ $errors->first('searchProduct') }}</span>
                                        @endif
                                    </form>
                                </div>
                                <div class="lang-header d-flex">
                                    <a href="" class="transition">
                                        <img src="{{ asset('front/public/image/ic-vi.png')}}" alt="vi">
                                    </a>
                                    <a href="" class="transition">
                                        <img src="{{ asset('front/public/image/ic-en.png')}}" alt="en">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="fixed menu ">
                            <div class="wrap-content">
                                <ul class="d-flex align-items-center justify-content-between">
                                    <li><a class="{{ request()->is('/') ? 'active' : '' }} transition" href="{{ url('/') }}" title="Trang chủ">Trang chủ</a></li>
                                    <li class="line"></li>
                                    <li><a class="{{ request()->is('gioi-thieu') ? 'active' : '' }} transition" href="{{ url('/gioi-thieu') }}" title="Giới thiệu">Giới thiệu</a></li>
                                    <li class="line"></li>
                                    <li><a class="{{ request()->is('chinh-sach*') ? 'active' : '' }} transition" href="{{ url('/chinh-sach') }}" title="Chính Sách">Chính Sách</a></li>
                                    <!-- <li class="line"></li> -->
                                    <!-- <li><a class="transition" href="#" title="Dự án">Dự án</a></li> -->
                                    <li class="line"></li>
                                    <li>
                                        <a class="{{ request()->is('san-pham*') ? 'active' : '' }} transition" href="{{ url('/san-pham') }}" title="Sản phẩm">Sản phẩm</a>
                                    </li>
                                    <li class="line"></li>
                                    <li><a class="{{ request()->is('tin-tuc*') ? 'active' : '' }} transition" href="{{ url('/tin-tuc') }}" title="Tin tức">Tin tức</a></li>
                                    <li class="line"></li>
                                    <li><a class="{{ request()->is('lien-he') ? 'active' : '' }} transition" href="{{ url('/lien-he') }}" title="Liên hệ">Liên hệ</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- menu-respo -->
            <div class="menu-res">
                <div class="menu-bar-res">
                    <a id="hamburger" href="#menu" title="Menu"><span></span></a>
                    <div class="box-flex flex-center align-items-center">
                        <div class="search">
                            <form action="# " method="GET" id="searchForm">
                                @csrf
                                <input type="text" name="searchProduct" id="keyword" placeholder="Tìm Kiếm" required>
                                <p id="searchIcon" onclick="">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </p>
                                {{-- @if ($errors->has('searchProduct'))
                                    <span class="alert alert-danger">{{ $errors->first('searchProduct') }}</span>
                                @endif --}}
                            </form>
                        </div>
                        <div class="lang-header">
                            <a class="transition" href="#"><img src="{{ asset('front/public/image/ic-vi.png')}}" alt="vi"></a>
                            <a class="transition" href="#"><img src="{{ asset('front/public/image/ic-en.png')}}" alt="en"></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- difference here -->
            @yield('body')
            <!-- difference here -->

            <!-- Footer -->
            <footer class="text-center text-lg-start text-white" style="background-color: black" >
                <!-- Grid container -->
                <div class="container p-4 pb-0">
                        <!--Grid row-->
                        <div class="row">
                            <!-- Grid column -->
                            <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-3">
                                <h6 class="text-uppercase mb-4 font-weight-bold">
                                    Nhóm B
                                </h6>
                                <p>
                                    Here you can use rows and columns to organize your footer
                                    content. Lorem ipsum dolor sit amet, consectetur adipisicing
                                    elit.
                                </p>
                            </div>
                            <!-- Grid column -->
                
                            <hr class="w-100 clearfix d-md-none" />
                
                            <!-- Grid column -->
                            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                                <h6 class="text-uppercase mb-4 font-weight-bold">Tin Tức</h6>
                                @foreach($listNews as $item)
                                <p>
                                    <a class="text-white" href="{{route('news_detail',['id' => $item->id])}}">{{$item -> news_name}}</a>
                                </p>
                                @endforeach
                            </div>
                            <!-- Grid column -->
                
                            <hr class="w-100 clearfix d-md-none" />
                
                            <!-- Grid column -->
                            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                                <h6 class="text-uppercase mb-4 font-weight-bold">
                                    Chính Sách
                                </h6>
                                @foreach($listPoli as $item)
                                <p>
                                    <a class="text-white" href="#">{{$item->poli_name}}</a>
                                </p>
                                @endforeach
                            </div>
                
                            <!-- Grid column -->
                            <hr class="w-100 clearfix d-md-none" />
                
                            <!-- Grid column -->
                            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                                <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
                                <p><i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
                                <p><i class="fas fa-envelope mr-3"></i> info@gmail.com</p>
                                <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
                                <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
                            </div>
                            <!-- Grid column -->
                        </div>
                        <!--Grid row-->
                    <hr class="my-3">

                    <div class="d-flex justify-content-between ">
                        <div class="footer-copyright">© Copyright © 2023 . All rights reserved. Design by Nhom B TDC</div>
                        <div class="footer-statistic d-flex justify-content-between align-items-center" >
                            <p>Đang online: <span>3</span></p>
                            <p>|</p>
                            <p>Truy cập ngày: <span>21</span></p>
                            <p>|</p>
                            <p>Tổng truy cập: <span>18318</span></p>
                        </div>
                    </div>
                </div>
                <!-- Grid container -->
            </footer>
            <!-- Footer -->
            <!-- difference here -->
            @yield('ggmap')
            <!-- difference here -->

            
            <!-- Tool bar -->
            <div class="toolbar">
                <ul>
                    <li>
                        <a id="goidien" href="tel:0918077948" title="title">
                            <img src="{{ asset('front/public/image/phone.svg')}}" alt="images"><br>
                        </a>
                    </li>
                    <li>
                        <a id="chatzalo" href="#" title="title">
                            <img src="{{ asset('front/public/image/zl.png')}}" alt="images"><br>
                        </a>
                    </li>
                    <li>
                        <a id="chatfb" href="#" title="title">
                            <i class="fab fa-facebook-messenger "></i>
                        </a>
                    </li>
                    <li>
                        <a id="chatfb" href="" title="title">
                            <i class="fas fa-map-marked-alt"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- btn-message -->
            
            <!-- scroll to top -->
            <div class="scrollToTop " >
                <img src="{{ asset('front/public/image/top.png')}}" alt="Go Top">
            </div>
        </div>
        <!-- mmenu scripts -->
        <script src="{{ asset('front/public/js/mmenu.js')}}"></script>
        <!-- Liên kết đến tệp JavaScript của Slick Carousel qua CDN -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
        <!-- Liên kết đến tệp -->
        <script src="{{ asset('front/public/js/index.js')}}"></script>
        <script src="{{ asset('front/public/js/gioithieu.js')}}"></script>

            
        @yield('script')
    </body>
</html>
