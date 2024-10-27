@extends('layouts.admin')
@section('title', 'Organic Healthy Meal')
@section('admin-content')
<main>
   <div class="container ">
    <div class="heading-title p-2 my-2">
        <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="{{route('admin.index')}}">Home</a> > Organic Healthy Meal</span>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-user-plus"></i>
            Organic Healthy Meal
        </div>
        <div class="card-body table-card-body p-3 mytable-body">
            <form action="{{route('organic.update',$company)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-2">
                        <label>Organic Healthy Meal</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" value="{{$company->organic_title}}" name="organic_title" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <label>Description</label>
                    </div>
                    <div class="col-md-10">
                        <textarea name="organic_details" id="editor" class="form-control">
                            {!! $company->organic_details !!}
                        </textarea>
                    </div>
                    <div class="col-md-2 mt-2">
                        <label for="">Image</label>
                    </div>
                    <div class="col-md-4 mt-2">
                        <input type="file" name="organic_image" class="form-control" id="image" name="logo" onchange="readURL(this);">
                        <small>Image(555*530 px)</small>
                    </div>
                    <div class="col-md-2 text-center mt-2 ml-3">
                        <img class="form-controlo img-thumbnail" src="#" id="previewImage" style="height:100px;width:100px; background: #3f4a49;">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary mt-2 float-right" value="Submit">Update</button>
                    </div>
                </div>
            </form>
        </div>
   </div>
      
    </div>
</main>        
@endsection
@push('admin-js')
<script src="{{ asset('admin/js/ckeditor.js') }}"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
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
        document.getElementById("previewImage").src="{{asset($company->organic_image)}}";
        
    </script> 


@endpush