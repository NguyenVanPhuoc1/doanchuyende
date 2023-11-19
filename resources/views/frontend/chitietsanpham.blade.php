@extends('frontend.layout.master')

@section('title', 'Chi Tiết Sản Phẩm')

@section('body')
        <!-- Body -->
        <main style="background-color: white">
        <div class="wrap-info wrap-content pt-5 pb-5">
            <div class="wrap-pro-detail">
                <div class="box-flex align-items-start">
                    <div class="row">
                        <div class="col-12 left-pro-detail col-lg-5 ">
                            <div class="pro-zoom col ">
                                <a href="./public/image/c2-1918.jpg" class="MagicZoom" id="sanpham"
                                    data-options="zoomMode: on; hint: on; rightClick: true; selectorTrigger: hover; expandCaption: false; history: false;">
                                    <img id="mainImage" src="{{ asset('front/public/image/' . $product->image) }}" alt="Ảnh sản phẩm"
                                        style="max-width: 570px; max-height: 550px;">
                                </a>
                            </div>
                            <div class="gallery-thumb-pro col">
                                <div class="owl-thumb-pro slick-slider">
                                    <a class="thumb-pro-detail slick-slide" data-zoom-id="sanpham"
                                        href="./public/image/c2-1918.jpg" data-image="./Public/image/sp1.jpg">
                                        <img src="./public/image/c2-1918.jpg">
                                    </a>
                                    <a class="thumb-pro-detail slick-slide" data-zoom-id="sanpham"
                                        href="./public/image/c2-1918.jpg" data-image="./Public/image/sp2.jpg">
                                        <img src="./public/image/c2-1918.jpg">
                                    </a>
                                    <a class="thumb-pro-detail slick-slide" data-zoom-id="sanpham"
                                        href="./public/image/c2-1918.jpg" data-image="./Public/image/sp4.jpg">
                                        <img src="./public/image/c2-1918.jpg">
                                    </a>
                                    <a class="thumb-pro-detail slick-slide" data-zoom-id="sanpham"
                                        href="./public/image/c2-1918.jpg" data-image="./Public/image/sp5.jpg">
                                        <img src="./public/image/c2-1918.jpg">
                                    </a>
                                    <a class="thumb-pro-detail slick-slide" data-zoom-id="sanpham"
                                        href="./public/image/c2-1918.jpg" data-image="./Public/image/sp5.jpg">
                                        <img src="./public/image/c2-1918.jpg">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 right-pro-detail col-lg-7 col-12">
                            <p class="title-pro-detail">{{ $product->name }}</p>
                            <ul class="attr-pro-detail p-3">
                                <li>
                                    <div class="attr-content-pro-detail name_product_detail">
                                        <h2>{{ $product->price }} <span>vnd</span></h2>
                                    </div>
                                </li>
                                <li>
                                    <div class="desc-pro-detail">
                                        <h3>Mô tả:</h3>
                                        <p>{{ $product->description }}</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- bình luận đánh giá sản phẩm -->
                <div class="pro-detail">
                    <div class="tabs-pro-detail" id="product-tab">
                        <ul class="tab-nav">
                            <!-- <li class="active"><a data-toggle="tab" href="#tab1">Details</a></li> -->
                            <li><a data-toggle="tab" href="#tab2">Reviews (3)</a></li>
                        </ul>
                        <!-- /product tab nav -->

                        <!-- product tab content -->
                        <div class="tab-content">
                            <!-- tab1  -->
                            <!-- <div id="tab1" class="tab-pane active ">
                                <div class="row">
                                    <div class="col-md-12">
                                        Phuoc
                                    </div>
                                </div>
                            </div> -->
                            <!-- /tab1  -->

                            <!-- tab2  -->
                            <div id="tab2" class="tab-pane ">
                                <div class="row">
                                    <!-- Reviews -->
                                    <div class="col-md-6">
                                        <h3 class="title text-center text-black-50">BÌNH LUẬN</h3>
                                        <div id="reviews">
                                            <ul class="reviews">
                                                <li>
                                                    <div class="review-heading">
                                                        <h5 class="name">Tên </h5>
                                                    </div>
                                                    <div class="review-body">
                                                        <p> Bình Luận 1</p>
                                                    </div>
                                                </li>
                                            </ul>
                                            <ul class="reviews">
                                                <li>
                                                    <div class="review-heading">
                                                        <h5 class="name">Tên </h5>
                                                    </div>
                                                    <div class="review-body">
                                                        <p> Bình Luận 2</p>
                                                    </div>
                                                </li>
                                            </ul>
                                            <ul class="reviews">
                                                <li>
                                                    <div class="review-heading">
                                                        <h5 class="name">Tên </h5>
                                                    </div>
                                                    <div class="review-body">
                                                        <p> Bình Luận 3</p>
                                                    </div>
                                                </li>
                                            </ul>
                                            <ul class="reviews-pagination">
                                                <li class="active">1</li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#">4</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /Reviews -->

                                    <!-- Review Form -->
                                    <div class="col-md-6">
                                        <div id="review-form ">
                                            <form class="review-form" method="post" action="#">
                                                <input class="input form-control" type="text" name="name" id="name"
                                                    placeholder="Your Name">
                                                <input class="input form-control" type="email" name="email" id="email"
                                                    placeholder="Your Email">
                                                <textarea class="input form-control" name="content" id="content"
                                                    placeholder="Your Review"></textarea>
                                                <button class="btn btn-primary" name="submit">Submit</button>

                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- /tab2  -->
                        </div>
                        <!-- /product tab content  -->
                    </div>
                </div>
                <!-- Sản phẩm liên quan -->
                {{-- <div class="box_product_list_tab">
                    <div class="container">
                        <div class="title-main">
                            <span>SẢN PHẨM LIÊN QUAN</span>
                        </div>
                        <div class="page_sanpham">
                            <div class="container ">
                                <div class="row">
                                    <div class="col-6 col-md-4 col-lg-3 col-xl-3 product-item">
                                        <a href="trangchu.html">
                                            <div class="scale-img product-image">
                                                <img src="public/image/np4-1267.jpg" alt="">
                                                <div class="product-price">Giá sản phẩm</div>
                                            </div>
                                            <div class="product-content">
                                                <div class="product-name">Tên sản phẩm tên sản phẩm tên sản phẩm tên sản
                                                    phẩm</div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-6 col-md-4 col-lg-3 col-xl-3 product-item">
                                        <a href="trangchu.html">
                                            <div class="scale-img product-image">
                                                <img src="public/image/np4-1267.jpg" alt="">
                                                <div class="product-price">Giá sản phẩm</div>
                                            </div>
                                            <div class="product-content">
                                                <div class="product-name">Tên sản phẩm tên sản phẩm tên sản phẩm tên sản
                                                    phẩm</div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-6 col-md-4 col-lg-3 col-xl-3 product-item">
                                        <a href="trangchu.html">
                                            <div class="scale-img product-image">
                                                <img src="public/image/np4-1267.jpg" alt="">
                                                <div class="product-price">Giá sản phẩm</div>
                                            </div>
                                            <div class="product-content">
                                                <div class="product-name">Tên sản phẩm tên sản phẩm tên sản phẩm tên sản
                                                    phẩm</div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-6 col-md-4 col-lg-3 col-xl-3 product-item">
                                        <a href="trangchu.html">
                                            <div class="scale-img product-image">
                                                <img src="public/image/np4-1267.jpg" alt="">
                                                <div class="product-price">Giá sản phẩm</div>
                                            </div>
                                            <div class="product-content">
                                                <div class="product-name">Tên sản phẩm tên sản phẩm tên sản phẩm tên sản
                                                    phẩm</div>
                                            </div>
                                        </a>
                                    </div>

                                </div>

                            </div>
                            <div class="clearfix"> </div>
                            <!-- <div  aria-label="Page navigation example">
                                    <ul class="pagination flex-wrap justify-content-center mb-0" >
                                        <li class="page-item"><a class="page-link">Page 1 / 6</a></li>
                                        <li class="page-item"><a class="page-link" href="#">First</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                                        <li class="page-item active"><a class="page-link">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Last</a></li>
                                    </ul>
                                </div> -->
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </main>
@endsection
        