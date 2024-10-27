@extends('layouts.admin')
@section('title', 'Service Add')
<style>
    .alert {
        padding: 15px;
        background-color: #4CAF50;
        color: white;
        margin-bottom: 20px;
        border-radius: 4px;
    }

    .alert-dismissible .btn-close {
        float: right;
        background: none;
        border: none;
        font-size: 20px;
        cursor: pointer;
        color: white;
    }
</style>
@section('admin-content')
    <main class="mb-5">
        <div class="container ">
            <div class="heading-title p-2 my-2">
                <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="">Home</a> > Add
                    Service</span>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="table-head"><i class="fas fa-cogs me-1"></i>Service</div>
                        </div>


                        <div class="card-body table-card-body p-3">
                            <form action="{{ route('serviceStore') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="row">


                                            <div class="col-md-12 mb-2">
                                                <label for="name"> Title <span class="text-danger">*</span> </label>
                                                <input type="text" name="title" value="{{ old('title') }}"
                                                    class="form-control form-control-sm shadow-none @error('title') is-invalid @enderror"
                                                    id="name" placeholder="Enter name">
                                                @error('title')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                    <div id="feature-container">
                                                        <label for="name">Service Feature <span class="text-danger">*</span></label>

                                                        <div class="d-flex align-items-center mb-2">
                                                            <input type="text" name="features[]" 
                                                                class="form-control form-control-sm shadow-none" 
                                                                placeholder="Enter feature">

                                                            <button type="button" class="btn btn-success btn-sm ms-2" onclick="addFeature()">
                                                                <i class="fas fa-plus"></i>
                                                            </button>
                                                        </div>

                                                        <div class="mb-2">
                                                            <input type="file" name="feature_images[]" 
                                                                class="form-control form-control-sm shadow-none" 
                                                                onchange="readURLF(this, 'previewImageF0')">
                                                        </div>

                                                        <img class="img-thumbnail" id="previewImageF0" 
                                                            src="/noimage.png" style="width: 50px; height: 50px; background: #3f4a49;">
                                                    </div>
                                                </div>



                                            <div class="col-md-12">
                                                <label for="image"> Image <span class="text-danger">*</span> </label>
                                                <input type="file"
                                                    class="form-control @error('image') is-invalid @enderror" id="image"
                                                    type="file" size="100" name="image" onchange="readURL(this);">
                                                @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <div class="form-group mt-2 mb-2">
                                                    <img class="form-controlo img-thumbnail" src="#"id="previewImage" style="width: 100px;height: 100px; background: #3f4a49;">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="col-md-12">
                                            <label for="description">Short Description <span class="text-danger">*</span>
                                            </label>
                                            <textarea name="short_details" id="" cols="30" rows="4"
                                                class="form-control @error('short_details') is-invalid @enderror"></textarea>

                                            @error('short_details')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="description"> Description </label>
                                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                                                id="description" cols="30" rows="5"></textarea>
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="pt-3">
                                            <button type="submit" class="btn btn-primary float-end ">Submit</button>
                                        </div>

                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="table-head"><i class="fas fa-table me-1"></i>Service List</div>
                        </div>
                        <div class="card-body table-card-body p-3">
                            <table id="datatablesSimple">
                                <thead class="text-center bg-light">
                                    <tr>
                                        <th>SL</th>
                                        <th>Title</th>
                                        <th>Short Description</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($service as $key => $item)
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{!! Str::limit($item->short_details, 100) !!}</td>
                                            <td class="text-center"><img src="{{ asset($item->image) }}" class="tbl-image"
                                                    alt=""></td>
                                            <td class="text-center">
                                                <a href="{{ route('service.edit', $item->id) }}" class="btn btn-edit"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                <button type="submit" class="btn btn-delete"
                                                    onclick="deleteUser({{ $item->id }})"><i
                                                        class="far fa-trash-alt"></i></button>
                                                <form id="delete-form-{{ $item->id }}"
                                                    action="{{ route('serviceDelete', $item) }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>



                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@push('admin-js')
    <script src="{{ asset('admin/js/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('admin/js/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });

         
    </script>

<script>
let featureCount = 1; // Track the number of added features

function addFeature() {
    const featureContainer = document.getElementById('feature-container');

    // Create wrapper for the new feature inputs
    const featureGroup = document.createElement('div');
    featureGroup.className = 'mb-3';

    const previewImageId = `previewImageF${featureCount}`; // Unique image preview ID

    // Add feature name and button in one row
    featureGroup.innerHTML = `
        <div class="d-flex align-items-center mb-2">
            <input type="text" name="features[]" 
                class="form-control form-control-sm shadow-none" 
                placeholder="Enter feature">

            <button type="button" class="btn btn-danger btn-sm ms-2" onclick="removeFeature(this)">
                <i class="fas fa-minus"></i>
            </button>
        </div>

        <div class="mb-2">
            <input type="file" name="feature_images[]" 
                class="form-control form-control-sm shadow-none" 
                onchange="readURLF(this, '${previewImageId}')">
        </div>

        <img class="img-thumbnail" id="${previewImageId}" 
             src="/noimage.png" style="width: 50px; height: 50px; background: #3f4a49;">
    `;

    featureContainer.appendChild(featureGroup); // Append the new group to the container
    featureCount++;
}

// Function to remove a feature input group
function removeFeature(button) {
    button.closest('.mb-3').remove();
}

// Function to preview the uploaded image
function readURLF(input, imageId) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById(imageId).src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
}


</script>

    <script>
        //image showing function
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#previewImage')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };
                reader.readAsDataURL(input.files[0]);
        }
        document.getElementById("previewImage").src = "/noimage.png";
    }
      

     //delete function
        function deleteUser(id) {
            swal({
                title: 'Are you sure?',
                text: "You want to Delete this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-' + id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush
