@extends('layouts.admin')
@section('title', 'Client Update')
@section('admin-content')
    <main>
        <div class="container ">
            <div class="heading-title p-2 my-2">
                <span class="my-3 heading "><i class="fas fa-home"></i> <a class=""
                        href="{{ route('admin.index') }}">Home</a> > Client Update</span>
            </div>
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-user-plus"></i>
                    Client Update
                </div>
                <div class="card-body table-card-body p-3 mytable-body">
                    <form action="{{ route('client.update', $team->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label> Title </label>
                                    </div>
                                    <div class="col-md-1 text-right">
                                        <span class="clone">:</span>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="name" value="{{ $team->name }}"
                                            class="form-control my-form-control @error('name') is-invalid @enderror">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label>Image </label>
                                    </div>

                                    <div class="col-md-1 text-right">
                                        <span class="clone">:</span>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="file"
                                            class="form-control my-form-control  @error('image') is-invalid @enderror"
                                            id="image" name="image" onchange="readURL(this);">
                                            <small>Image (200*140 px)</small>
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-2 ps-0">
                                        <img class="form-controlo img-thumbnail w-100" src="#" id="previewImage"
                                            style="height:80px; background: #3f4a49;">
                                    </div>
                                     
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-sm mt-2 float-right"
                                            value="Update">Submit</button>
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
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
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
        document.getElementById("previewImage").src = "{{ asset($team->image) }}";
    </script>
@endpush
