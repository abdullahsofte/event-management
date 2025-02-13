@extends('layouts.admin')
@section('title', 'Edit Ad')
@section('admin-content')
<main>
   <div class="container ">
    <div class="heading-title p-2 my-2">
        <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="{{route('admin.index')}}">Home</a> > Ad Update</span>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-cogs"></i>
            Update Ad
        </div>
        <div class="card-body table-card-body p-3 mytable-body">
            <form action="{{ route('ad.update', $ad->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Title</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="title" value="{{ $ad->title }}" class="form-control  @error('title') is-invalid @enderror">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="link"> Link <span class="text-danger">*</span> </label>
                            </div>
                            <div class="col-md-9 mb-2">
                                <input type="text" name="link" value="{{$ad->link }}"  class="form-control form-control-sm shadow-none @error('link') is-invalid @enderror" id="link" placeholder="Enter Link">
                                @error('link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Image </label>
                                </div>
                                <div class="col-md-8">
                                    <input type="file" class="form-control" id="image" name="image" onchange="readURL(this);">
                                    <small>Image(540*285)</small>

                                </div>
                                <div class="col-md-12 text-center mt-2">
                                    <img class="form-controlo img-thumbnail" src="#" id="previewImage" style="height:120px;width:140px; background: #3f4a49;">
                                </div>
                            </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-sm mt-2" value="Submit">Update</button>
                    </div>
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
    document.getElementById("previewImage").src="{{ asset($ad->image) }}";
    
    
</script> 

@endpush