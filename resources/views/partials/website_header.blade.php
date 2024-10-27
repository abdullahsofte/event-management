 <!-- header-section - start
  ================================================== -->
 <header id="header-section" class="header-section sticky-header-section not-stuck clearfix">
     <!-- header-bottom - start -->
     <div class="header-bottom">
         <div class="container">
             <div class="row">

                 <!-- site-logo-wrapper - start -->
                 <div class="col-lg-2">
                     <div class="site-logo-wrapper">
                         <a href="{{ route('home') }}" class="logo">
                             <img src="{{ asset($content->logo) }}" alt="logo_not_found">
                         </a>
                     </div>
                 </div>
                 <!-- site-logo-wrapper - end -->

                 <!-- mainmenu-wrapper - start -->
                 <div class="col-lg-10">
                     <div class="mainmenu-wrapper">
                         <div class="row">

                             <!-- menu-item-list - start -->
                             <div class="col-lg-12">
                                 <div class="menu-item-list ul-li clearfix">
                                     <ul>

                                         <li>
                                             <a href="{{ route('home') }}">home</a>

                                         </li>
                                         <li>
                                             <a href="{{ route('aboutUs') }}">about</a>

                                         </li>
                                         @php
                                             $services = App\Models\Service::where('status', 'a')->take(4)->get();
                                         @endphp

                                         @foreach ($services as $service)
                                             <li><a
                                                     href='{{ route('service.details', $service->slug) }}'>{{ $service->title }}</a>
                                             </li>
                                         @endforeach


                                         <li>
                                             <a href="{{ route('contact.us') }}">contact</a>
                                         </li>

                                     </ul>
                                 </div>
                             </div>
                             <!-- menu-item-list - end -->

                         </div>
                     </div>
                 </div>
                 <!-- mainmenu-wrapper - end -->

             </div>
         </div>
     </div>
     <!-- header-bottom - end -->
 </header>
 <!-- header-section - end
  ================================================== -->

 <!-- altranative-header - start
  ================================================== -->
 <div class="header-altranative">
     <div class="container">
         <div class="logo-area float-left">
             <a href="{{ route('home') }}">
                 <img src="{{ asset($content->logo) }}" alt="logo_not_found">
             </a>
         </div>

         <button type="button" id="sidebarCollapse" class="alt-menu-btn float-right">
             <i class="fas fa-bars"></i>
         </button>
     </div>

     <!-- sidebar menu - start -->
     <div class="sidebar-menu-wrapper">
         <div id="sidebar" class="sidebar">
             <span id="sidebar-dismiss" class="sidebar-dismiss">
                 <i class="fas fa-arrow-left"></i>
             </span>

             <div class="sidebar-header">
                 <a href="{{ route('home') }}">
                     <img src="{{ asset($content->logo) }}" alt="logo_not_found">
                 </a>
             </div>

          

             <!-- main-pages-links - start -->
             <div class="menu-link-list main-pages-links">
                 <ul>
                     <li class="active">
                         <a href="{{ route('home') }}">
                             <span class="icon"><i class="fas fa-home"></i></span>
                             Home
                         </a>
                     </li>
                     <li>
                         <a href="{{ route('aboutUs') }}">
                             <span class="icon"><i class="fas fa-home"></i></span>
                             About
                         </a>
                     </li>
                     @php
                         $services = App\Models\Service::where('status', 'a')->take(4)->get();
                     @endphp

                     @foreach ($services as $service)
                         <li>
                             <a href="{{ route('service.details', $service->slug) }}'">
                                 <span class="icon"><i class="fas fa-home"></i></span>
                                 {{ $service->title }}
                             </a>
                         </li>
                     @endforeach

                     <li>
                         <a href="{{ route('contact.us') }}">
                             <span class="icon"><i class="fas fa-home"></i></span>
                             Contact
                         </a>
                     </li>
                 </ul>
             </div>
             <!-- main-pages-links - end -->



             <div class="overlay"></div>
         </div>
     </div>
     <!-- sidebar menu - end -->
 </div>
 <!-- altranative-header - end
  ================================================== -->
