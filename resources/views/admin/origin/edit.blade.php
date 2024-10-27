@extends('layouts.admin')
@section('title', 'Origin Edit')
@section('admin-content')
<main>
   <div class="container ">
    <div class="heading-title p-2 my-2">
        <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="{{route('admin.index')}}">Home</a> > Origin Edit</span>
    </div>
    
                @csrf
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <form action="{{route('origin.update',$origin)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="card-header">
                                    <div class=""><i class="fas fa-cogs me-1"></i>Edit Origin</div>
                                </div>
                                <div class="card-body table-card-body">
                                    <div class="row">
                                       
                                        <div class="col-md-3">
                                            <strong><label>Name</label> <span class="float-right">:</span></strong>
                                        </div>
                                        <div class="col-md-9">
                                        <input type="text" class="form-control my-form-control @error('name') is-invalid @enderror"  value="{{$origin->name}}" name="name">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-primary float-right mt-2" value="Submit">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                   
                    
                </div>
           
    </div>
</main>        
@endsection
@push('admin-js')
@endpush