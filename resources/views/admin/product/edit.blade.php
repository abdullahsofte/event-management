@extends('layouts.admin')
@section('title', 'Product Edit')
@section('admin-content')
<main class="mb-5">
    <div class="container">
     <div class="heading-title p-2 my-2">
         <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="">Home</a> > Update Product</span>
     </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header py-1"><span style="font-size: 14px;
                        font-weight: 600;
                        color: #0e2c96;">Update Product</span> </div>
                        <div class="card-body table-card-body my-table">
                          <form action="{{ route('product.update',$product->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <strong><label>Product Code</label><span class="color-red">*</span>
                                                <span class="my-label">:</span> </strong>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="code" value="{{ $product->code }}"
                                                class="form-control my-form-control"  placeholder="Code">
                                        </div>

                                        <div class="col-md-4">
                                            <strong><label>Name</label><span class="color-red">*</span> <span
                                                    class="my-label">:</span> </strong>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="name" value="{{$product->name }}"
                                                placeholder="Product Name" 
                                                class="form-control my-form-control @error('name') is-invalid @enderror">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                       

                                        <div class="col-md-4">
                                            <strong><label>Price</label> <span
                                                    class="my-label">:</span> </strong>
                                        </div>

                                        <div class="col-md-8">
                                            <input type="text" name="price" value="{{ $product->price }}"
                                                placeholder="price"
                                                class="form-control my-form-control @error('price') is-invalid @enderror">
                                            @error('price')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        {{-- <div class="col-md-4">
                                            <strong><label>Size</label> <span
                                                    class="my-label">:</span> </strong>
                                        </div>

                                        <div class="col-md-8">
                                            <input type="text" name="size" value="{{ $product->size }}"
                                                placeholder="Size"
                                                class="form-control my-form-control @error('size') is-invalid @enderror">
                                            @error('size')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> --}}

                                       
                                       
                                       
                                        <div class="col-md-4">
                                            <strong><label>Short Description</label> <span
                                                    class="my-label">:</span> </strong>
                                        </div>
                                        <div class="col-md-8">
                                            <textarea name="short_details"
                                                class="form-control short_description @error('short_details') is-invalid @enderror"
                                                id="editor" cols="30" rows="3">{{$product->short_details}}</textarea>
                                            @error('short_details')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <strong><label>Image</label> <span class="my-label">:</span>
                                            </strong>
                                            <small>Image (855*570 px)</small>
                                        </div>
                                        <div class="col-md-5 mt-1">
                                            <input name="image" type="file"
                                                class="form-control form-control-sm @error('image') is-invalid @enderror"
                                                id="image" type="file" onchange="readURL(this);">
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 mt-1">
                                            <img class="form-controlo img-thumbnail" src="#" id="previewImage"
                                                style="width: 100px;height: 80px; background: #3f4a49;">
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <strong><label>Category</label><span class="color-red">*</span> <span
                                                    class="my-label">:</span> </strong>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group input-group-sm">
                                                <select name="category_id" id="category_id"
                                                    class="custom-select js-example-basic-multiple form-control my-select my-form-control @error('category_id') is-invalid @enderror"
                                                    data-live-search="true">
                                                    <option value="">Select Category</option>
                                                    @foreach ($category as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ $product->category_id == $item->id ? 'selected' : '' }}>
                                                            {{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="input-group-append">
                                                    <a class="border rounded my-select my-form-control py-0 px-2"
                                                        href="{{ route('category.index') }}" target="_blank"><i
                                                            class="fas fa-plus"></i></a>
                                                </div>
                                            </div>
                                            @error('category_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        {{-- <div class="col-md-4">
                                            <strong><label>Origin </label><span
                                                    class="my-label">:</span> </strong>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group input-group-sm">
                                                <select name="origin_id" id="origin_id"
                                                    class="custom-select js-example-basic-multiple form-control my-select my-form-control @error('origin_id') is-invalid @enderror"
                                                    data-live-search="true">
                                                    <option value="">Select Origin</option>
                                                    @foreach ($origin as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ $product->origin_id == $item->id ? 'selected' : '' }}>
                                                            {{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="input-group-append">
                                                    <a class="border rounded my-select my-form-control py-0 px-2"
                                                        href="{{ route('origin.index') }}" target="_blank"><i
                                                            class="fas fa-plus"></i></a>
                                                </div>
                                            </div>
                                            @error('origin_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> --}}

                                       
                                        {{-- <div class="col-md-4">
                                            <strong><label> Product Is</label> <span class="my-label">:</span>
                                            </strong>
                                        </div>
                                        <div class="col-md-3 mt-1">
                                            <input type="checkbox" value="1"
                                                {{ $product->is_offer == '1' ? 'checked' : '' }} name="is_offer"
                                                class="@error('is_offer') is-invalid @enderror" id="">
                                            @error('is_offer')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label for="">Best Seller</label>
                                        </div>
                                        <div class="col-md-2 mt-1">
                                            <input type="checkbox" name="is_feature" value="1"
                                                {{$product->is_feature == '1' ? 'checked' : '' }}
                                                class="@error('is_featured') is-invalid @enderror" id="">
                                            @error('is_offer')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label for="">Feature</label>
                                        </div>
                                        <div class="col-md-3 mt-1">
                                            <input type="checkbox" name="new_status" value="1"
                                                {{$product->new_status == '1' ? 'checked' : '' }}
                                                class="@error('new_status') is-invalid @enderror" id="">
                                            @error('new_status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label for="">Upcoming</label>
                                        </div> --}}
                                       
                                        <div class="col-md-4">
                                            <strong><label> Description</label> <span class="my-label">:</span>
                                            </strong>
                                        </div>
                                        <div class="col-md-8 mt-1">
                                            <textarea name="description" class="form-control" id="description"
                                                cols="30" rows="3">{{$product->description}}</textarea>
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                      
                                        {{-- <div class="col-md-4">
                                            <strong><label>Other Image</label> <span class="my-label">:</span> </strong>
                                            <small>Image (255*300 px)</small>
                                        </div>
                                        <div class="col-md-8 mt-1">
                                            <input type="file" class=" form-control form-control-sm" maxlength="5" id="otherImage" name="otherImage[]" multiple />
                                            @foreach($product->productImage as $item)
                                            <span class="pip"> 
                                                <img src="{{ asset($item->otherImage) }}" class="imageThumb" data-image_id="{{ $item->id }}" alt="">
                                                <span class="close-btn remove" data-image_id="{{ $item->id }}">
                                                    remove
                                                </span>
                                              </span>
                                            @endforeach
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-sm float-right mt-2">Update</button>
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
<script>
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
</script>
<script>
    function toggleEnable(id, id2, id3) {
        var textbox = document.getElementById(id);
        var start = document.getElementById(id2);
        var end = document.getElementById(id3);
        if (textbox.disabled) {
            document.getElementById(id).disabled = false;
            document.getElementById(id2).disabled = false;
            document.getElementById(id3).disabled = false;
        } else {
            document.getElementById(id).disabled = true;
            document.getElementById(id2).disabled = true;
            document.getElementById(id3).disabled = true;
        }
    }
</script>

   <script>
     $(document).on('click', '.close-btn', function () {
           
            var imageId = $(this).data('image_id');
            if (imageId) {
                $.ajax({
                    url: '{{url("/")}}/product/remove-other-image/' + imageId,
                    method: 'DELETE',
                    success: function (res) {
                        if (res) {
                            $(this).parent().remove();
                        } else {
                            alert('Something went wrong :(');
                        }
                    }.bind(this)
                })
            }
        });
   </script>
<script src="{{ asset('admin/js/ckeditor.js') }}"></script>
<script>
  function toggleEnable(id) {
    var textbox = document.getElementById(id);
    if (textbox.disabled) {
        document.getElementById(id).disabled = false;
      } else {
          document.getElementById(id).disabled = true;
      }
  }
</script>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<script>
  ClassicEditor
      .create( document.querySelector( '#description' ) )
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
                    .width(100)
                    .height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    document.getElementById("previewImage").src="{{ asset($product->image ) }}";
</script>
<script>
  // multiple image
 $(document).ready(function() {
  if (window.File && window.FileList && window.FileReader) {
    $("#otherImage").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\">Remove</span>" +
            "</span>").insertAfter("#otherImage");
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });
        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});
</script>
@endpush