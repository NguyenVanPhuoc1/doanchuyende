@extends('frontend.layout.master')

@section('title', 'Chi Tiết Sản Phẩm')

@section('css')
    <style>
        .carousel {
            position: relative;
            max-width: 800px;
            margin: 0 auto;
            overflow: hidden;
        }

        .carousel-images {
            display: flex;
            transition: transform 0.5s ease;
        }

        .carousel-images img {
            width: 33%;
            height: auto;
            object-fit: cover;
            margin-right: 10px;
        }

        .prev-btn,
        .next-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.2);
            color: white;
            padding: 8px 16px;
            border-radius: 30%;
            border: none;
            cursor: pointer;
        }

        .prev-btn {
            left: 10px;
        }

        .next-btn {
            right: 10px;
        }
    </style>
@endsection
@section('body')
    <!-- Body -->
    <div class="breadCrumbs">
        <div class="wrap-content">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a class="text-decoration-none" href="{{ url('/') }}">
                        <span>Trang chủ</span>
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a class="text-decoration-none" href="{{ url('/san-pham') }}">
                        <span>Sản phẩm</span>
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a class="text-decoration-none active" href="{{ url('/chi-tiet-san-pham/' . $product->id) }}">
                        <span>{{ $product->name }}</span>
                    </a>
                </li>
            </ol>
        </div>
    </div>

    <main style="background-color: white">
        <div class="wrap-info wrap-content pt-5 pb-5">
            <div class="wrap-pro-detail">
                <div class="box-flex align-items-start">
                    <div class="row">
                        <div class="left-pro-detail col-12 col-md-6  col-lg-5 ">
                            {{-- // anh lon --}}
                            <div class="big-image mb-3">
                                @if ($product->images->isNotEmpty())
                                    <img width="100%" src="{{ asset('storage/' . $product->images->first()->file_name) }}"
                                        alt="">
                                @endif

                            </div>

                            {{-- carousel --}}
                            <div class="carousel">
                                <div class="carousel-images">
                                    @if ($product->images->isNotEmpty())
                                            @foreach ($product->images as $image)
                                                <img src="{{ asset('storage/' . $image->file_name) }}" alt="Ảnh sản phẩm">
                                            @endforeach
                                    @endif
                                </div>
                                <button class="prev-btn btn">
                                    <<button class="next-btn btn">>
                                </button>
                            </div>
                        </div>
                        <div class="right-pro-detail col-12 col-md-6 col-lg-7">
                            <p class="title-pro-detail text-center">{{ $product->name }}</p>
                            <div class="desc-pro-detail">
                                <h4 style="font-style: italic">Mô tả:</h4>
                                <hr>
                                {!! $product->description !!}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- bình luận đánh giá sản phẩm -->
                <hr>
                <div class="pro-detail">
                    <div class="tabs-pro-detail" id="product-tab">
                        <!-- product tab content -->
                        <div class="tab-content">
                            <div class="row">
                                <!-- Reviews -->
                                <div class="col-md-6">
                                    <h3 class="title text-center">BÌNH LUẬN</h3>
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
                                            <textarea class="input form-control" name="content" id="content" placeholder="Your Review"></textarea>
                                            <button class="btn btn-primary" name="submit">Submit</button>

                                        </form>
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


@section('script')
    <script>
        const carousel = document.querySelector('.carousel');
        const images = document.querySelector('.carousel-images');
        const prevButton = document.querySelector('.prev-btn');
        const nextButton = document.querySelector('.next-btn');

        let imageIndex = 0;
        const totalImages = images.children.length;
        const imageWidth = images.firstElementChild.clientWidth;

        nextButton.addEventListener('click', () => {
            if (imageIndex < totalImages - 1) {
                imageIndex++;
                updateCarousel();
            }
        });

        prevButton.addEventListener('click', () => {
            if (imageIndex > 0) {
                imageIndex--;
                updateCarousel();
            }
        });

        function updateCarousel() {
            const offset = -imageIndex * imageWidth;
            images.style.transform = `translateX(${offset}px)`;

            // Ẩn/Hiện nút Previous và Next tại hình ảnh đầu và cuối
            prevButton.disabled = (imageIndex === 0);
            nextButton.disabled = (imageIndex === totalImages - 1);
        }
    </script>
@endsection
