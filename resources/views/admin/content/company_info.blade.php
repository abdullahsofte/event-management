@extends('layouts.admin')
@section('title', 'Background Image')
@section('admin-content')
<main>
   <div class="container ">
    <div class="heading-title p-2 my-2">
        <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="{{route('admin.index')}}">Home</a> > Background Image</span>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-user-plus"></i>
            Background Image
        </div>
        <div class="card-body table-card-body p-3 mytable-body">
            <form action="{{ route('companyInfo.update',$company) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Title</label>
                                
                            </div>
                            <div class="col-md-9">
                                <input type="text" value="{{$company->company_title}}" name="company_title" class="form-control">
                            </div>
                            {{-- <div class="col-md-3">
                                <label>Description </label>
                            </div>
                            <div class="col-md-9">
                                <textarea name="company_description" class="form-control" id="editor" cols="30" rows="5">
                                    {!! $company->company_description !!}
                                </textarea>
                            </div> --}}

                            <div class="col-md-3">
                                <label> Image </label>
                            </div>
                            <div class="col-md-9">
                                <input type="file" name="company_image" class="form-control" id="image" name="logo" onchange="readURL(this);">
                                <small>Image(1920*230 px)</small>
                            </div>
                            <div class="col-md-12 text-center mt-2 ml-3">
                                <img class="form-controlo img-thumbnail" src="#" id="previewImage" style="height:120px;width:200px; background: #3f4a49;">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary" value="Submit">Update</button>
                            </div>
                        </div>
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
    document.getElementById("previewImage").src="{{asset($company->company_image)}}";
    
</script> 

@endpush