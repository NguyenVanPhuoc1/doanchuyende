@extends('frontend.layout.master')

@section('title')
    Sản phẩm
@endsection

@section('body')
    <main>
    <h1>SẢN PHẨM</h1>
        <div class="product-list">
            <div class="container">
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-6 col-md-4 col-lg-3 col-xl-3 product-item">
                        <a href="{{ route('products.show', ['id' => $product->id]) }}">
                            <div class="scale-img product-image">
                                <img src="{{ asset('front/public/image/' . $product->image) }}" alt="Ảnh sản phẩm">
                                <div class="product-price">Giá sản phẩm</div>
                            </div>
                            <div class="product-content">
                                <div class="product-name">{{ $product->name }}</div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- thanh phân trang  -->
        {{-- <ul class="flex-wrap mb-0 pt-4 pb-4 pagination justify-content-center">
            <li class="page-item"><a class="page-link" href="#">Pre</a></li>
            <li class="page-item"><a class="page-link" href="#">...</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item active"><a class="page-link">5</a></li>
            <li class="page-item"><a class="page-link" href="#">6</a></li>
            <li class="page-item"><a class="page-link" href="#">7</a></li>
            <li class="page-item"><a class="page-link" href="#">...</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
            <li class="page-item"><a class="page-link" href="#">Last</a></li>
          </ul> --}}
    </main>
@endsection