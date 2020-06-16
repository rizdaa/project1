@extends('layouts.ecommerce')

@section('title')
<title>Kategori Belanja</title>
@endsection

@section('css2')
<link rel="stylesheet" href="style/css/bootstrap.min.css">
<link rel="stylesheet" href="style/css/owl.carousel.min.css">
<link rel="stylesheet" href="style/css/flaticon.css">
<link rel="stylesheet" href="style/css/slicknav.css">
<link rel="stylesheet" href="style/css/animate.min.css">
<link rel="stylesheet" href="style/css/magnific-popup.css">
<link rel="stylesheet" href="style/css/fontawesome-all.min.css">
<link rel="stylesheet" href="style/css/themify-icons.css">
<link rel="stylesheet" href="style/css/slick.css">
<link rel="stylesheet" href="style/css/nice-select.css">
<link rel="stylesheet" href="style/css/style.css">
@endsection

@section('content')
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content text-center">
                <h2>Kategori Belanja</h2>
                <div class="page_link">
                    <a href="{{ route('front.index') }}">Home</a>
                    <a href="{{ route('category') }}">Shop Category</a>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="style/img/hero/category.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Kategori Produk</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="latest-product-area latest-padding">
    <div class="container">
        <div class="row product-btn d-flex justify-content-between">
            <div class="properties__button">
                <!--Nav Button  -->
                <nav>                                                                                                
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">All</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">New</a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Featured</a>
                        <a class="nav-item nav-link" id="nav-last-tab" data-toggle="tab" href="#nav-last" role="tab" aria-controls="nav-contact" aria-selected="false">Offer</a>
                    </div>
                </nav>
                <!--End Nav Button  -->
            </div>
            <div class="select-this d-flex">
                <div class="featured">
                    <span>Short by: </span>
                </div>
                <form action="#">
                    <div class="select-itms">
                        <select name="select" id="select1">
                            <option value="">Featured</option>
                            <option value="">Featured A</option>
                            <option value="">Featured B</option>
                            <option value="">Featured C</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>
        <!-- Nav Card -->
        <div class="tab-content" id="nav-tabContent">
            <!-- card one -->
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="row">

                    @forelse ($products as $row)
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="f_p_item">
                            <div class="f_p_img">
                                <img class="img-fluid" src="{{ asset('storage/products/' . $row->image) }}" alt="{{ $row->name }}">
                                <div class="p_icon">
                                    <a href="{{ url('/product/' . $row->slug) }}">
                                        <i class="lnr lnr-cart"></i>
                                    </a>
                                </div>
                            </div>
                            <a href="{{ url('/product/' . $row->slug) }}">
                                <h4>{{ $row->name }}</h4>
                            </a>
                            <h5>Rp {{ number_format($row->price) }}</h5>
                        </div>
                    </div>
                    @empty
                    <div class="col-md-12">
                        <h3 class="text-center">Tidak ada produk</h3>
                    </div>
                    @endforelse
                </div>
            </div>
            <!-- Card two -->
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="row">
                    @forelse ($products as $row)
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="f_p_item">
                            <div class="f_p_img">
                                <img class="img-fluid" src="{{ asset('storage/products/' . $row->image) }}" alt="{{ $row->name }}">
                                <div class="p_icon">
                                    <a href="{{ url('/product/' . $row->slug) }}">
                                        <i class="lnr lnr-cart"></i>
                                    </a>
                                </div>
                            </div>
                            <a href="{{ url('/product/' . $row->slug) }}">
                                <h4>{{ $row->name }}</h4>
                            </a>
                            <h5>Rp {{ number_format($row->price) }}</h5>
                        </div>
                    </div>
                    @empty
                    <div class="col-md-12">
                        <h3 class="text-center">Tidak ada produk</h3>
                    </div>
                    @endforelse
                </div>
            </div>
            <!-- Card three -->
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <div class="row">
                    @forelse ($products as $row)
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="f_p_item">
                            <div class="f_p_img">
                                <img class="img-fluid" src="{{ asset('storage/products/' . $row->image) }}" alt="{{ $row->name }}">
                                <div class="p_icon">
                                    <a href="{{ url('/product/' . $row->slug) }}">
                                        <i class="lnr lnr-cart"></i>
                                    </a>
                                </div>
                            </div>
                            <a href="{{ url('/product/' . $row->slug) }}">
                                <h4>{{ $row->name }}</h4>
                            </a>
                            <h5>Rp {{ number_format($row->price) }}</h5>
                        </div>
                    </div>
                    @empty
                    <div class="col-md-12">
                        <h3 class="text-center">Tidak ada produk</h3>
                    </div>
                    @endforelse
                    
                </div>
            </div>
            <!-- card foure -->
            <div class="tab-pane fade" id="nav-last" role="tabpanel" aria-labelledby="nav-last-tab">
                <div class="row">
                    @forelse ($products as $row)
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="f_p_item">
                            <div class="f_p_img">
                                <img class="img-fluid" src="{{ asset('storage/products/' . $row->image) }}" alt="{{ $row->name }}">
                                <div class="p_icon">
                                    <a href="{{ url('/product/' . $row->slug) }}">
                                        <i class="lnr lnr-cart"></i>
                                    </a>
                                </div>
                            </div>
                            <a href="{{ url('/product/' . $row->slug) }}">
                                <h4>{{ $row->name }}</h4>
                            </a>
                            <h5>Rp {{ number_format($row->price) }}</h5>
                        </div>
                    </div>
                    @empty
                    <div class="col-md-12">
                        <h3 class="text-center">Tidak ada produk</h3>
                    </div>
                    @endforelse
                    
                </div>
            </div>
        </div>
        <!-- End Nav Card -->
    </div>
</section>
@endsection