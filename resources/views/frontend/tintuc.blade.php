@extends('frontend.layout.master')

@section('title', 'Tin Tức')

@section('body')
<!-- Body -->
<div class="breadCrumbs">
                <div class="wrap-content">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-decoration-none" href="{{url('/trang-chu')}}">
                                <span>Trang chủ</span>
                            </a>
                        </li>
                        <li class="breadcrumb-item ">
                            <a class="text-decoration-none active" href="{{url('/tin-tuc')}}">
                                <span>Tin Tức</span>
                            </a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="wrap-info wrap-content mt-5 mb-5">
                <div class="container">
                    <div class="row">
                        <h1 class="text-black-50 text-uppercase text-center" style="font-size: 30px; font-weight: bold;">Tin Tức</h1>
                            <div class=" col-12 col-lg-6 ">
                                <div class="news_list1" >
                                    <!-- item news -->
                                    <div class="item_news d-flex justify-content-between slick-slider">
                                        <a href="" class="hover_sang2 d-block">
                                            <img src="{{ asset('front/public/image/tin-tuc-1.jpg')}}" alt="tin-tuc-1">
                                        </a>
                                        <div class="content_news_index">
                                            <div class="name_news_index">
                                                <p class="text-split">Thiết kế nội thất phòng khách</p>
                                            </div>
                                            <div class="desc_news_index">
                                                <p class="text-split">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore nulla dolores, possimus praesentium ducimus
                                                    eum facilis corrupti deleniti reiciendis
                                                    eaque molestiae qui sunt odit, quas animi, nobis adipisci cumque accusamus.</p>
                                            </div>
                                            <div class="btn_more_index">
                                                <a href="#" class="text-decoration-none tintuc-xemthem">XEM THÊM</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- item news -->
                                    <!-- item news -->
                                    <div class="item_news d-flex justify-content-between slick-slider">
                                        <a href="" class="hover_sang2 d-block">
                                            <img src="{{ asset('front/public/image/tin-tuc-1.jpg')}}" alt="tin-tuc-1">
                                        </a>
                                        <div class="content_news_index">
                                            <div class="name_news_index">
                                                <p class="text-split">Thiết kế nội thất phòng khách</p>
                                            </div>
                                            <div class="desc_news_index">
                                                <p class="text-split">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore nulla dolores, possimus praesentium ducimus
                                                    eum facilis corrupti deleniti reiciendis
                                                    eaque molestiae qui sunt odit, quas animi, nobis adipisci cumque accusamus.</p>
                                            </div>
                                            <div class="btn_more_index">
                                                <a href="#" class="text-decoration-none tintuc-xemthem">XEM THÊM</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- item news -->
                                    <!-- item news -->
                                    <div class="item_news d-flex justify-content-between slick-slider">
                                        <a href="" class="hover_sang2 d-block">
                                            <img src="{{ asset('front/public/image/tin-tuc-1.jpg')}}" alt="tin-tuc-1">
                                        </a>
                                        <div class="content_news_index">
                                            <div class="name_news_index">
                                                <p class="text-split">Thiết kế nội thất phòng khách</p>
                                            </div>
                                            <div class="desc_news_index">
                                                <p class="text-split">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore nulla dolores, possimus praesentium ducimus
                                                    eum facilis corrupti deleniti reiciendis
                                                    eaque molestiae qui sunt odit, quas animi, nobis adipisci cumque accusamus.</p>
                                            </div>
                                            <div class="btn_more_index">
                                                <a href="#" class="text-decoration-none tintuc-xemthem">XEM THÊM</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- item news -->
                                </div>
                            </div>
                            <div class=" col-12 col-lg-6">
                                <div class="news_list1" >
                                    <!-- item news -->
                                    <div class="item_news d-flex justify-content-between slick-slider">
                                        <a href="" class="hover_sang2 d-block">
                                            <img src="{{ asset('front/public/image/tin-tuc-1.jpg')}}" alt="tin-tuc-1">
                                        </a>
                                        <div class="content_news_index">
                                            <div class="name_news_index">
                                                <p class="text-split">Thiết kế nội thất phòng khách</p>
                                            </div>
                                            <div class="desc_news_index">
                                                <p class="text-split">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore nulla dolores, possimus praesentium ducimus
                                                    eum facilis corrupti deleniti reiciendis
                                                    eaque molestiae qui sunt odit, quas animi, nobis adipisci cumque accusamus.</p>
                                            </div>
                                            <div class="btn_more_index">
                                                <a href="#" class="text-decoration-none tintuc-xemthem">XEM THÊM</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- item news -->
                                    <!-- item news -->
                                    <div class="item_news d-flex justify-content-between slick-slider">
                                        <a href="" class="hover_sang2 d-block">
                                            <img src="{{ asset('front/public/image/tin-tuc-1.jpg')}}" alt="tin-tuc-1">
                                        </a>
                                        <div class="content_news_index">
                                            <div class="name_news_index">
                                                <p class="text-split">Thiết kế nội thất phòng khách</p>
                                            </div>
                                            <div class="desc_news_index">
                                                <p class="text-split">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore nulla dolores, possimus praesentium ducimus
                                                    eum facilis corrupti deleniti reiciendis
                                                    eaque molestiae qui sunt odit, quas animi, nobis adipisci cumque accusamus.</p>
                                            </div>
                                            <div class="btn_more_index">
                                                <a href="#" class="text-decoration-none tintuc-xemthem">XEM THÊM</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- item news -->
                                    <!-- item news -->
                                    <div class="item_news d-flex justify-content-between slick-slider">
                                        <a href="" class="hover_sang2 d-block ">
                                            <img src="{{ asset('front/public/image/tin-tuc-1.jpg')}}    " alt="tin-tuc-1">
                                        </a>
                                        <div class="content_news_index">
                                            <div class="name_news_index">
                                                <p class="text-split">Thiết kế nội thất phòng khách</p>
                                            </div>
                                            <div class="desc_news_index">
                                                <p class="text-split">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore nulla dolores, possimus praesentium ducimus
                                                    eum facilis corrupti deleniti reiciendis
                                                    eaque molestiae qui sunt odit, quas animi, nobis adipisci cumque accusamus.</p>
                                            </div>
                                            <div class="btn_more_index">
                                                <a href="#" class="text-decoration-none tintuc-xemthem">XEM THÊM</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- item news -->
                                </div>
                            </div>
                    </div>
                </div>
            </div>

@endsection