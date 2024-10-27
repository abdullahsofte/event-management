@extends('layouts.admin')
@section('title', 'Edit Service Category')
@section('admin-content')
    <main>
        <div class="container ">
            <div class="heading-title p-2 my-2">
                <span class="my-3 heading "><i class="fas fa-home"></i> <a class=""
                        href="{{ route('admin.index') }}">Home</a> > Service Category Update</span>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-cogs"></i>
                            Update Service Cateogry
                        </div>
                        <div class="card-body table-card-body p-3 mytable-body">
                            <form action="{{ route('category.update', $category->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Category Name</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="name" value="{{ $category->name }}"
                                            class="form-control">
                                    </div>
                                    {{-- <div class="col-md-3">
                                <label>Details</label>
                            </div>
                            <div class="col-md-9">
                               <textarea name="details" class="form-control" id="" cols="30" rows="3">{{ $category->details }}</textarea>
                            </div> --}}
                                    {{-- <div class="col-md-3">
                                <label for="is_popular"> Is Popular</label>
                            </div> --}}
                                    {{-- <div class="col-md-9">
                                <input type="checkbox" name="is_popular" id="is_popular"{{ !empty($category->is_popular) ? 'checked' : ''}} value="1" title="is popular">
                                <label for="is_popular"> Is Popular</label>
                            </div> --}}
                                    {{-- <div class="col-md-3">
                                <label>Image </label>
                            </div>
                            <div class="col-md-9">
                                <input type="file" class="form-control" id="image" name="image" onchange="readURL(this);">
                                <small>image(110*110px)</small>
                            </div> --}}
                                    {{-- <div class="col-md-12 text-center mt-2">
                                <img class="form-controlo img-thumbnail" src="#" id="previewImage" style="height:120px;width:140px; background: #3f4a49;">
                            </div> --}}
                                </div>

                                <button type="submit" class="btn btn-primary btn-sm mt-2 float-end" value="Submit">Update</button>
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
                reader.onload = function(e) {
                    $('#previewImage')
                        .attr('src', e.target.result)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        document.getElementById("previewImage").src = "{{ asset($category->image) }}";
    </script>
@endpush
