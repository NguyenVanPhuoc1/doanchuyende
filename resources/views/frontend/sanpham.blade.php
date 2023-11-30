@extends('frontend.layout.master')

@section('title')
    Sản phẩm
@endsection

@section('body')
    <div class="breadCrumbs">
        <div class="wrap-content">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a class="text-decoration-none" href="{{ url('/') }}">
                        <span>Trang chủ</span>
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a class="text-decoration-none active" href="{{ url('/san-pham') }}">
                        <span>Sản phẩm</span>
                    </a>
                </li>

            </ol>
        </div>
    </div>
    <main>
        <h1>SẢN PHẨM</h1>
        <div class="product-list">
            <div class="container">
                <div class="row">
                    @if (!is_string($products))
                        @foreach ($products as $product)
                            <div class="col-6 col-md-4 col-lg-3 col-xl-3 product-item">
                                <a href="{{ route('products.show', ['id' => $product->id]) }}">
                                    <div class="scale-img product-image">
                                        <img src="{{ asset('front/public/image/tin-tuc-1.jpg') }}" alt="">
                                        <div class="product-price">Giá sản phẩm</div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-name">{{ $product->name }}</div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                        <!-- thanh phân trang  -->
                        <div class="pagination justify-content-center">
                            {{$products->appends(request()->query())->links('pagination::bootstrap-4')}}
                        </div>
                    @else
                        <div class="alert alert-warning w-100 text-center" role="alert">
                            <strong>{{ $products }}</strong>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
