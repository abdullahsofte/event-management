<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            @php
                $prefix = Request::route()->getPrefix();
                $route = Route::current()->getName();
            @endphp
           <div class="nav">
            <a class="nav-link {{ $route == 'admin.index' ? 'active' : '' }}" href="{{ route('admin.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
        
            <a class="nav-link {{ $route == 'bookingList' ? 'active' : '' }}" href="{{ route('bookingList') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-list-alt"></i></div>
                Booking List
            </a>
        
            <a class="nav-link {{ $route == 'service.index' ? 'active' : '' }}" href="{{ route('service.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-concierge-bell"></i></div>
                Service Entry
            </a>
        
            <a class="nav-link {{ $route == 'welcome.note' ? 'active' : '' }}" href="{{ route('welcome.note') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-scroll"></i></div>&nbsp;Welcome Note
            </a>
        
            <a class="nav-link {{ $route == 'about.us' ? 'active' : '' }}" href="{{ route('about.us') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-info-circle"></i></div>&nbsp;About Us Page
            </a>
        
            <a class="nav-link {{ $route == 'company.banner' ? 'active' : '' }}" href="{{ route('company.banner') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-images"></i></div>&nbsp;Slider Entry
            </a>
        
            <a class="nav-link {{ $route == 'photo-gallery.index' ? 'active' : '' }}" href="{{ route('photo-gallery.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-camera-retro"></i></div>&nbsp;Photo Gallery
            </a>
        
            <a class="nav-link {{ $route == 'event.index' ? 'active' : '' }}" href="{{ route('event.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div>&nbsp;News & Event
            </a>
        
            <a class="nav-link {{ $route == 'public.sms' ? 'active' : '' }}" href="{{ route('public.sms') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-sms"></i></div>
                Contact SMS
            </a>
        
            <a class="nav-link {{ $prefix == 'setting' ? '' : 'collapsed' }}" href="#" data-bs-toggle="collapse" 
               data-bs-target="#collapseLayouts4" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                Settings
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
        
            <div class="collapse {{ $prefix == 'setting' ? 'collapse show' : '' }}" id="collapseLayouts4" 
                 aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link {{ $route == 'profile.edit' ? 'active' : '' }}" href="{{ route('profile.edit') }}">
                        <i class="fas fa-user-cog"></i>&nbsp;Company Profile
                    </a>
        
                    <a class="nav-link {{ $route == 'user.index' ? 'active' : '' }}" href="{{ route('user.index') }}">
                        <i class="fas fa-user-plus"></i>&nbsp;User Create
                    </a>
                </nav>
            </div>
        
            <a class="nav-link" href="{{ route('logout') }}" 
               onclick="return confirm('Are you sure logout from Admin Panel')">
                <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                Log Out
            </a>
        </div>
        
        </div>
    </nav>
</div>
