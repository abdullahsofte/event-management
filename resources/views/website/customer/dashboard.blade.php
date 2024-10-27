@extends('layouts.website')
@section('website-content')
@push('website-css')
<link rel="stylesheet" href="{{ asset('website/css/login.css') }}" type="text/css" media="all">
        <style>
            .select2 {
                width: 100%
            }
       /* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}

</style>
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" > --}}
 @endpush
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
                        <span itemprop="name">Customer Dashboard</span>
                    </a>
                    <meta itemprop="position" content="1">
                </li>

            </ol>

        </nav>

    </div>
</div>
    <div class="container custom-container ">
           <div class="dash_wrap custom_card">
            <div class="row">
                <div class="col-lg-3">
                    <div class="dashboard-left-side ">
                        {{-- <h3 class="dashboard-header">Accounts Details</h3> --}}
                        <ul class="nav nav-tabs left-tab">
                            <li class="nav-item">
                                <a class="nav-link tablinks active" data-bs-toggle="tab" onclick="openTab(event, 'profile')" href="#profile">Profile</a>
                            </li>
                            <li class="nav-item">
                              
                                <a class="nav-link tablinks" data-bs-toggle="tab" onclick="openTab(event, 'menu1')" href="#menu1">Profile Edit</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link tablinks" data-bs-toggle="tab" onclick="openTab(event, 'menu2')"  href="#menu2">Address</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link tablinks" data-bs-toggle="tab" onclick="openTab(event, 'order')"  href="#order">Order</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link tablinks" data-bs-toggle="tab" onclick="openTab(event, 'quote')"  href="#quote">Quote</a>
                            </li> --}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('customer.logout') }}"
                                    onclick="return confirm('Are you sure logout from dashboard!')">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="dashboard-right-side  py-3">
                        <h3 class="dashboard-header">Accounts Details</h3>
                        <hr />
                        <div class="tab-content">
                            <div class="tab-pane tabcontent container active" style="padding: 10px" id="profile">
                                <h5>Personal Information</h5>
    
                                <table class="my-table">
                                    <tr>
                                        <td  width="10%"><b>Name:</b></td>
                                        <td>{{ Auth::guard('customer')->user()->name }}</td>
                                    </tr>
                                    <tr>
                                        <td width="10%"><b>Username:</b></td>
                                        <td>{{ Auth::guard('customer')->user()->username }}</td>
                                    </tr>
                                    <tr>
                                        <td width="10%"><b>Phone:</b></td>
                                        <td>{{ Auth::guard('customer')->user()->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td width="10%"><b>Email:</b></td>
                                        <td> @isset(Auth::guard('customer')->user()->email)
                                                {{ Auth::guard('customer')->user()->email }}
                                            @endisset
                                        </td>
                                    </tr>
                                    {{-- <tr>
                                        <td width="10%"><b>Country:</b></td>
                                        <td> @isset(Auth::guard('customer')->user()->country->name){{ Auth::guard('customer')->user()->country->name }}
                                            @endisset</td>
                                    </tr> --}}
                                    <tr>
                                        <td width="10%"><b>District:</b></td>
                                        <td> @isset(Auth::guard('customer')->user()->district->name)
                                                {{ Auth::guard('customer')->user()->district->name }}
                                            @endisset
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="10%"><b>Upazila:</b></td>
                                        <td> @isset(Auth::guard('customer')->user()->upazila->name)
                                                {{ Auth::guard('customer')->user()->upazila->name }}
                                            @endisset
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="10%"><b>Address:</b></td>
                                        <td> @isset(Auth::guard('customer')->user()->address)
                                                {{ Auth::guard('customer')->user()->address }}
                                            @endisset
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="10%"><b>Photo:</b></td>
                                        <td class="text-center"> @isset(Auth::guard('customer')->user()->profile_picture)
                                                <div id="preview">
                                                    <img src="{{ asset(Auth::guard('customer')->user()->profile_picture) }}"
                                                        alt="">
                                                </div>
                                            @endisset
                                        </td>
                                    </tr>
                                </table>
    
                            </div>
                            <!--- customer update part--->
                            <div class="tab-pane tabcontent container" style="padding: 10px" id="menu1">
                                <h5>Personal Information Edit</h5>
                                <form action="{{ route('auth.customer.update') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group py-1">
                                        <div class="row">
                                            <div class="col-lg-3">  <label for="">Name : </label></div>
                                            <div class="col-lg-9">
                                                <input type="text" name="name" value="{{ Auth::guard('customer')->user()->name }}"
                                                class="form-control">
                                            </div>
                                        </div>
                                      
                                       
                                    </div>
                                    <div class="form-group py-1">
                                        <div class="row">
                                            <div class="col-lg-3"> <label for="">Username : </label></div>
                                            <div class="col-lg-9">
                                                <input type="text" name="username"
                                                value="{{ Auth::guard('customer')->user()->username }}" class="form-control">
                                            </div>
                                        </div>
                                       
                                       
                                    </div>
                                    <div class="form-group py-1">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <label for="">Phone : </label>
                                            </div>
                                            <div class="col-lg-9">
                                                <input type="text" name="phone" value="{{ Auth::guard('customer')->user()->phone }}"
                                                class="form-control">
                                            </div>
                                        </div>
                                       
                                        
                                    </div>
                                    <div class="form-group py-1">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <label for="">Email:</label>
                                            </div>
                                            <div class="col-lg-9">
                                                <input type="email" name="email" value="{{ Auth::guard('customer')->user()->email }}"
                                            class="form-control">
                                            </div>
                                        </div>
                                      
                                        
                                    </div>
                                    <div class="form-group py-1">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <label for="">Photo :</label>
                                            </div>
                                            <div class="col-lg-9">
                                                <input type="file" name="profile_picture" id="image" class="form-control"
                                            onchange="readURL(this);">
                                            <span class="ms-auto"> <img src="" alt="" id="previewImage"
                                                class="me-auto"></span>
                                            </div>
                                        </div>
                                      
                                    </div>
                                    <div class="form-group mt-3">
                                        <div id="preview" class="d-flex">
                                            <span><button type="submt" class="btn btn-success"
                                                    value="Update">Update</button></span>
    
                                           
                                        </div>
                                    </div>
    
                                </form>
                            </div>
    
                            <!------ address bar section --->
                            <div class="tab-pane tabcontent container" style="padding: 10px" id="menu2">
                                <p>Address Edit</p>
                                <div class="container">
                                    <form action="{{ route('auth.customer.address') }}" method="post">
                                        @csrf
                                        <div class="address-edit">
                                            {{-- <div class="form-group my-1">
                                                <label for="">Country:</label>
                                                <select name="country_id" class=" form-control @error('name') is-invalid @enderror">
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}" {{$country->id == Auth::guard('customer')->user()->country_id? 'selected':''}}>{{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('country_id')
                                                  <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                  </span>
                                               @enderror
                                            </div> --}}
                                            <div class="form-group my-1">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label for="">District : </label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <select name="district_id" id="district_id"
                                                        class=" form-control @error('name') is-invalid @enderror">
                                                        <option value="" selected>Select...</option>
                                                        @foreach ($districts as $district)
                                                            <option value="{{ $district->id }}"
                                                                {{ $district->id == Auth::guard('customer')->user()->district_id ? 'selected' : '' }}>
                                                                {{ $district->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('district_id')
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
                                                        <label for="">Upazila : </label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <select name="upazila_id" id="upazila_id"
                                                        class=" form-control @error('name') is-invalid @enderror">
                                                        <option value="" selected>Select...</option>
                                                        @foreach ($upazilas as $upazila)
                                                            <option value="{{ $upazila->id }}"
                                                                {{ $upazila->id == Auth::guard('customer')->user()->upazila_id ? 'selected' : '' }}>
                                                                {{ $upazila->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('upazila_id')
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
                                                        <label for="">Address :</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <textarea name="address" id="" class="form-control @error('name') is-invalid @enderror" rows="2">{{ Auth::guard('customer')->user()->address }}</textarea>
                                                    </div>
                                                </div>
                                            
                                            </div>
                                            <input type="submit" class="btn btn-success" value="Update">
                                        </div>
                                    </form>
                                </div>
    
                            </div>
                            <!------ order  section start --->
                            <div class="tab-pane tabcontent container" style="padding: 10px" id="order">
                                <h5 class="text-center">Order List</h5>
                                <div class="container">
                                    <table class="w-100">
                                        <thead>
                                            <tr class="order_invoice">
                                                <th>Invoice No.</th>
                                                <th>Date</th>
                                                <th>Order Status</th>
                                                <th>Payment Status</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order as $item)
                                                <tr>
                                                    <td>{{ $item->invoice_no }}</td>
                                                    <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                                                    <td>
                                                        @if ($item->status == 'p')
                                                            Pending
                                                        @elseif($item->status == 'on')
                                                            Processing
                                                        @elseif($item->status == 'w')
                                                            On the way
                                                        @elseif($item->status == 'd')
                                                            Delivered
                                                        @elseif($item->status == 'c')
                                                            Cancel
                                                        @endif
                                                    </td>
                                                    <td>Pending</td>
                                                    <td>৳ {{ $item->total_amount }}</td>
                                                    <td class="text-center">
                                                        @if ($item->status == 'p')
                                                            <a href="{{ route('auth.order.delete', $item->id) }}"
                                                                style="font-size: 20px;"> <i
                                                                    class="fa fa-trash-o text-danger"></i></a>
                                                        @endif
    
                                                    </td>
                                                </tr>
                                            @endforeach
    
                                        </tbody>
                                    </table>
                                </div>
    
                            </div>
                            <!-- order end -->
    
                            <!------ quote  section start --->
                            {{-- <div class="tab-pane tabcontent container " id="quote">
                                <h5 class="text-center">Quotation List</h5>
                                <div class="container">
                                    <table class="w-100">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Date</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($quote as $key => $item)
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                                                    <td>৳ {{ $item->total }}</td>
                                                    <td>
                                                        <a href="{{ route('quote-details.website', $item->id) }}" class=" btn btn-success">
                                                            <i class="fas fa-eye"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
    
                                        </tbody>
                                    </table>
                                </div>
    
                            </div> --}}
                            <!-- quote end -->
                        </div>
                    </div>
                </div>
            </div>
           </div>
    </div>


<script>
function openTab(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>

    @push('website-js')
    <script type="text/javascript" src="{{asset('website/js/jquery.min.js')}}"></script>
        <script>
            $(document).ready(function() {
                $('#country').select2();
                $('#district').select2();
            });
        </script>
        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#previewImage')
                            .attr('src', e.target.result)
                            .width(100);

                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
            document.getElementById("previewImage").src =
                "{{ Auth::guard('customer')->user()->image ? Auth::guard('customer')->user()->image : '/noimage.png' }} ";
        </script>
    @endpush


    
@endsection
