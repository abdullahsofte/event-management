
@extends('layouts.website')
@push('website-css')
    <link rel="stylesheet" href="{{ asset('website/css/login.css') }}" type="text/css" media="all">
    {{-- <link rel="stylesheet" href="{{asset('website/css/bootstrap.min.css')}}" type="text/css" media="all"> --}}
@endpush
@section('website-content')
  <!--END SLIDER SHOW -->
  <div class="bn-top ">
    <div class="container_img_bread no-img ">
        <p><img class="img-responsive" src="{{asset('website/images/bn-top.jpg')}}" alt="" /></p>

        <nav data-depth="1" class="breadcrumb hidden-sm-down">
            <ol itemscope itemtype="">

                <li itemprop="itemListElement" itemscope itemtype="">
                    <a itemprop="item" href="{{route('home')}}">
                        <span itemprop="name">Home</span>
                    </a>
                    <meta itemprop="position" content="1">
                </li>
                <li itemprop="itemListElement" itemscope itemtype="">
                    <a itemprop="item" href="#">
                        <span itemprop="name">Customer Registration</span>
                    </a>
                    <meta itemprop="position" content="1">
                </li>

            </ol>

        </nav>

    </div>
</div>
<section class="login-section">
    <div class="container custom-container">
                <div class=" login-form">
                    <form action="{{route('customer.register')}}" method="POST">
                        @csrf
                        <h2 class="text-center">Registration Form</h2>
                        <div class="form-group my-1">
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="">Name : </label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" name="name" value="{{old('name')}}" placeholder="Enter Name" class="form-control login-field @error('name') is-invalid @enderror" autocomplete="off" >
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                         
                        </div>
                        <div class="form-group my-1">
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="">Phone:</label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" name="phone"  value="{{old('phone')}}" placeholder="Enter Phone" class="form-control login-field  @error('phone') is-invalid @enderror" autocomplete="off" >
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                        
                        </div>
                        <div class="form-group my-1">
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="">Password : </label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="password" name="password" placeholder="Enter Password" class="form-control login-field  @error('password') is-invalid @enderror" autocomplete="off">
                                    @error('password')
                                        <span class="invalid-feedback" style="color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                           
                           
                        </div>
                        <div class="form-group my-1">
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for=""> Retypre Password : </label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="password" name="cpassword" placeholder="Retype Password" class="form-control login-field" autocomplete="off">
                                </div>
                            </div>
                         
                           
                        </div>
                        <div class="d-flex mt-3">
                            <input type="submit" class="btn btn-danger" value="Sign Up">
                            <a href="{{route('customer.login')}}" class="btn btn-success ms-auto">Login</a>
                        </div>
                        
                    </form>
                </div>
               
    </div>
</section>



@endsection
