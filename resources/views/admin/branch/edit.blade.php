@extends('layouts.admin')
@section('title', 'Edit Branch')
@section('admin-content')
<main>
   <div class="container ">
    <div class="heading-title p-2 my-2">
        <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="{{route('admin.index')}}">Home</a> > Branch Update</span>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-cogs"></i>
            Update Branch
        </div>
        <div class="card-body table-card-body p-3 mytable-body">
            <form action="{{ route('branch.update',$branch->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-12">
                    <div class="col-md-12 mb-2">
                        <label for="name">Name<span class="text-danger">*</span> </label>
                        <input type="text" name="name" value="{{$branch->name}}"  class="form-control form-control-sm shadow-none @error('name') is-invalid @enderror" id="name" placeholder="Enter Name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="city">City<span class="text-danger">*</span> </label>
                        <input type="text" name="city" value="{{$branch->name}}"  class="form-control form-control-sm shadow-none @error('city') is-invalid @enderror" id="city" placeholder="Enter city">
                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                
                    <div class="col-md-12 mb-2">
                        <label for="phone">Phone<span class="text-danger">*</span> </label>
                        <input type="text" name="phone" value="{{$branch->phone}}"  class="form-control form-control-sm shadow-none @error('phone') is-invalid @enderror" id="name" placeholder="Enter Phone">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="postal">Postal Code</label>
                        <input type="text" name="postal" value="{{$branch->postal}}"  class="form-control form-control-sm shadow-none" placeholder="Enter postal code">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="province">Province</label>
                        <input type="text" name="province" value="{{$branch->province}}"  class="form-control form-control-sm shadow-none" placeholder="Enter province">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="description">Description <span class="text-danger">*</span> </label>
                        <textarea name="description" value="{{ old('description') }}"  class="form-control form-control-sm shadow-none @error('description') is-invalid @enderror" id="description" placeholder="descriptions Here" rows="3">{{$branch->description}}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    <div class="col-md-12 mb-2">
                        <label for="map">Google Map <span class="text-danger">*</span> </label>
                        <textarea name="map" value="{{ old('map') }}"  class="form-control form-control-sm shadow-none @error('description') is-invalid @enderror" id="map" rows="3">{{$branch->map}}</textarea>
                        @error('map')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>

                    </div>
                    <div class="col-md-6 col-12">
                        <div class="col-md-12 mb-2">
                            <label for="country">Country<span class="text-danger">*</span> </label>
                            <input type="text" name="country" value="{{$branch->country}}"  class="form-control form-control-sm shadow-none @error('country') is-invalid @enderror" id="country" placeholder="Enter country">
                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="street_address">Street Address<span class="text-danger">*</span> </label>
                            <input type="text" name="street_address" value="{{$branch->street_address}}"  class="form-control form-control-sm shadow-none @error('street_address') is-invalid @enderror" id="street_address" placeholder="Enter street address">
                                @error('street_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="street_address">Street Address Two<span class="text-danger">*</span> </label>
                            <input type="text" name="street_address2" value="{{$branch->street_address2}}"  class="form-control form-control-sm shadow-none @error('street_address2') is-invalid @enderror" id="street_address" placeholder="Enter street address two">
                                @error('street_address2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                     <div class="col-md-12 mb-2">
                        <label for="address">Address <span class="text-danger">*</span> </label>
                        <textarea name="address" value="{{ old('address') }}"  class="form-control form-control-sm shadow-none @error('address') is-invalid @enderror" id="address" placeholder="Address Here" rows="3">{{$branch->address}}</textarea>
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                  
                      <div class="col-md-12">
                        <label for="image">Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" type="file" size="100" name="image" onchange="readURL(this);">
                        <div class="form-group mt-2 mb-2">
                            <img class="form-controlo img-thumbnail" src="#" id="previewImage" style="width: 100px;height: 80px; background: #3f4a49;">
                          
                        </div>
                      </div>
                    </div>
                </div>
                <div class="float-end">
                <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>  
        </div>
   </div>
      
    </div>
</main>        
@endsection
@push('admin-js')
<script> 
function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload=function(e) {
                $('#previewImage')
                    .attr('src', e.target.result)     
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    document.getElementById("previewImage").src="{{ asset($branch->image) }}";
    
    
</script> 

@endpush