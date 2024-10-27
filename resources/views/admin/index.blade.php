@extends('layouts.admin')
@section('title', 'Home')
<style>
    .card-body{
        color: #000;
        text-decoration: none;
    }
</style>
@section('admin-content')
<main class="">
    <div class="container-fluid">
        <div class="heading-title p-2">
            <span class="my-3 heading"><i class="fas fa-home"></i> 
                <a href="">Home</a> > Dashboard
            </span>
        </div>
        <div class="row mt-3">
            <div class="dashboard-logo text-center pt-3 pb-4">
                <img class="border p-2" style="height: 100px;" src="{{ asset($content->logo) }}" alt="">
            </div>

            <div class="col-xl-2 col-md-6">
                <div class="card mb-3 dashboard-card" style="background-color: #ccddef">
                    <a href="{{ route('bookingList') }}" class="card-body mx-auto">
                        <div class="d-flex justify-content-center align-items-center">
                            <i class="fas fa-list-alt fa-2x"></i>
                        </div>
                        <p class="dashboard-card-text">Booking List</p>
                    </a>
                </div>
            </div>

            <div class="col-xl-2 col-md-6">
                <div class="card mb-3 dashboard-card" style="background-color: #ccddef">
                    <a href="{{ route('service.index') }}" class="card-body mx-auto">
                        <div class="d-flex justify-content-center align-items-center">
                            <i class="fas fa-concierge-bell fa-2x"></i>
                        </div>
                        <p class="dashboard-card-text">Service Entry</p>
                    </a>
                </div>
            </div>

            <div class="col-xl-2 col-md-6">
                <div class="card mb-3 dashboard-card" style="background-color: #ccddef">
                    <a href="{{ route('welcome.note') }}" class="card-body mx-auto">
                        <div class="d-flex justify-content-center align-items-center">
                            <i class="fas fa-comment-dots fa-2x"></i>
                        </div>
                        <p class="dashboard-card-text">Welcome Note</p>
                    </a>
                </div>
            </div>

            <div class="col-xl-2 col-md-6">
                <div class="card mb-3 dashboard-card" style="background-color: #ccddef">
                    <a href="{{ route('about.us') }}" class="card-body mx-auto">
                        <div class="d-flex justify-content-center align-items-center">
                            <i class="fas fa-info-circle fa-2x"></i>
                        </div>
                        <p class="dashboard-card-text">About Us</p>
                    </a>
                </div>
            </div>

            <div class="col-xl-2 col-md-6">
                <div class="card mb-3 dashboard-card" style="background-color: #ccddef">
                    <a href="{{ route('event.index') }}" class="card-body mx-auto">
                        <div class="d-flex justify-content-center align-items-center">
                            <i class="fas fa-calendar-alt fa-2x"></i>
                        </div>
                        <p class="dashboard-card-text">News And Event</p>
                    </a>
                </div>
            </div>

            <div class="col-xl-2 col-md-6">
                <div class="card mb-3 dashboard-card" style="background-color: #ccddef">
                    <a href="{{ route('company.banner') }}" class="card-body mx-auto">
                        <div class="d-flex justify-content-center align-items-center">
                            <i class="fas fa-images fa-2x"></i>
                        </div>
                        <p class="dashboard-card-text">Slider Entry</p>
                    </a>
                </div>
            </div>

            <div class="col-xl-2 col-md-6">
                <div class="card mb-3 dashboard-card" style="background-color: #ccddef">
                    <a href="{{ route('photo-gallery.index') }}" class="card-body mx-auto">
                        <div class="d-flex justify-content-center align-items-center">
                            <i class="fas fa-camera-retro fa-2x"></i>
                        </div>
                        <p class="dashboard-card-text">Photo Gallery</p>
                    </a>
                </div>
            </div>

            <div class="col-xl-2 col-md-6">
                <div class="card mb-3 dashboard-card" style="background-color: #ccddef">
                    <a href="{{ route('public.sms') }}" class="card-body mx-auto">
                        <div class="d-flex justify-content-center align-items-center">
                            <i class="fas fa-sms fa-2x"></i>
                        </div>
                        <p class="dashboard-card-text">Contact SMS</p>
                    </a>
                </div>
            </div>

            <div class="col-xl-2 col-md-6">
                <div class="card mb-3 dashboard-card" style="background-color: #ccddef">
                    <a href="{{ route('profile.edit') }}" class="card-body mx-auto">
                        <div class="d-flex justify-content-center align-items-center">
                            <i class="fas fa-building fa-2x"></i>
                        </div>
                        <p class="dashboard-card-text">Company Profile</p>
                    </a>
                </div>
            </div>

            <div class="col-xl-2 col-md-6">
                <div class="card mb-3 dashboard-card" style="background-color: #ccddef">
                    <a href="{{ route('user.index') }}" class="card-body mx-auto">
                        <div class="d-flex justify-content-center align-items-center">
                            <i class="fas fa-users fa-2x"></i>
                        </div>
                        <p class="dashboard-card-text">User Create</p>
                    </a>
                </div>
            </div>

            <div class="col-xl-2 col-md-6">
                <div class="card mb-3 dashboard-card" style="background-color: #ccddef">
                    <div class="card-body mx-auto">
                        <div class="d-flex justify-content-center align-items-center">
                            <i class="fas fa-sign-out-alt fa-2x"></i>
                        </div>
                        <p class="dashboard-card-text">
                            <a href="{{ route('logout') }}" style="text-decoration: none; color: black;" 
                               onclick="return confirm('Are you sure you want to log out from the Admin Panel?')">Logout</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
