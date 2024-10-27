@extends('layouts.website')
@push('website-css')
    <link rel="stylesheet" href="{{ asset('website') }}/css/cart.css">
@endpush
@section('website-content')
    <!-- Start of Page Header -->
    <div class="page-header" style="height: 180px; ">
        <div class="container">
            <h1 class="page-title mb-0">Brand</h1>
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Home</a> ></li>
                <li>Latest Brand</li>
            </ul>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- cart-section  section start-->
    <section class="news-section py-3">
        <div class="container custom-container">
            <div class="section-title">
                <h3>Brand</h3>
            </div>
            <div class="row">
                @foreach ($brand as $item)
                    <div class="col-lg-2 mb-3 col-md-4 col-4 ">
                        <div class="news-box">
                            <a href="{{ route('brand.wise', $item->id) }}" class="text-decoration-none text-black ">
                                <div class="card w-100">
                                    <img src="{{ asset($item->image) }}" class="card-img-top" alt="..."
                                        style="height: 90px; width:100%; object-fit:contain">
                                    <div class="category-name-news">
                                        <h5 class="text-danger text-center">{{ $item->name }}</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>
    @push('website-js')
    @endpush
@endsection
