@extends('layouts.admin')
@section('title', 'Edit Service')
@section('admin-content')
<main>
    <div class="container">
        <div class="heading-title p-2 my-2">
            <span class="my-3 heading">
                <i class="fas fa-home"></i>
                <a href="{{ route('admin.index') }}">Home</a> > Update Service
            </span>
        </div>

        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-cogs"></i> Update Service
            </div>
            <div class="card-body table-card-body p-3 mytable-body">
                <form action="{{ route('service.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-4">

                            <label>Title</label>
                            <input type="text" name="title" value="{{ $service->title }}"
                                class="form-control @error('title') is-invalid @enderror">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <div id="feature-container">
                                <label>Service Features</label>

                                <!-- Loop through existing features -->
                                @foreach ($service->features as $feature)
                                <div class="mb-3">
                                    <!-- Feature Name Input + Minus Button -->
                                    <div class="input-group mb-2">
                                        <input type="text" name="features[{{ $feature->id }}]"
                                            value="{{ old('features.' . $feature->id, $feature->feature_name) }}"
                                            class="form-control" placeholder="Feature Name">
                                        <button type="button" class="btn btn-danger btn-sm"
                                            onclick="removeFeature(this)">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>

                                    <!-- Image Input + Preview -->
                                    <div class="input-group mb-2">
                                        <input type="file" name="feature_images[{{ $feature->id }}]"
                                            class="form-control"
                                            onchange="readURLF(this, 'previewImage{{ $feature->id }}')">
                                        <img id="previewImage{{ $feature->id }}"
                                            src="{{ asset($feature->feature_image) }}" class="img-thumbnail ms-2"
                                            style="width: 50px; height: 30px; background: #3f4a49;">
                                    </div>
                                </div>
                                @endforeach

                                <!-- Add New Feature Inputs -->
                                <div class="mb-3">
                                    <!-- Feature Name Input + Plus Button -->
                                    <div class="input-group mb-2">
                                        <input type="text" name="features[]" class="form-control"
                                            placeholder="Add New Feature">
                                        <button type="button" class="btn btn-success btn-sm" onclick="addFeature()">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>

                                    <!-- Image Input + Preview -->
                                    <div class="input-group mb-2">
                                        <input type="file" name="feature_images[]" class="form-control"
                                            onchange="readURLF(this, 'previewImageNew')">
                                        <img id="previewImageNew" src="/noimage.png" class="img-thumbnail ms-2"
                                            style="width: 50px; height: 30px; background: #3f4a49;">
                                    </div>
                                </div>
                            </div>





                            <label>Image</label>
                            <input type="file" class="form-control" id="image" name="image" onchange="readURL(this);">
                            <img class="img-thumbnail" src="{{ asset($service->image) }}" id="previewImage"
                                style="height: 100px; width: 100px; background: #3f4a49;">
                        </div>

                        <div class="col-md-8">
                            <label>Short Description</label>
                            <textarea name="short_details" cols="30" rows="4"
                                class="form-control @error('short_details') is-invalid @enderror">{{ $service->short_details }}</textarea>
                            @error('short_details')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <label>Description</label>
                            <textarea name="details" id="description" cols="30" rows="3"
                                class="form-control @error('description') is-invalid @enderror">{{ $service->description }}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary btn-sm mt-2">Update</button>
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
let featureCount = {{ $service->features->count() }}; // Track feature count

// Add new feature dynamically
function addFeature() {
    const featureContainer = document.getElementById('feature-container');

    const featureGroup = document.createElement('div');
    featureGroup.className = 'mb-3';

    const previewImageId = `previewImage${featureCount}`;

    featureGroup.innerHTML = `
        <!-- Feature Name Input + Minus Button -->
        <div class="input-group mb-2">
            <input type="text" name="features[]" class="form-control" placeholder="Enter feature name">
            <button type="button" class="btn btn-danger btn-sm" onclick="removeFeature(this)">
                <i class="fas fa-minus"></i>
            </button>
        </div>

        <!-- Image Input + Preview -->
        <div class="input-group mb-2">
            <input type="file" name="feature_images[]" class="form-control" 
                   onchange="readURLF(this, '${previewImageId}')">
            <img id="${previewImageId}" src="/noimage.png" 
                 class="img-thumbnail ms-2" 
                 style="width: 50px; height: 50px; background: #3f4a49;">
        </div>
    `;

    featureContainer.appendChild(featureGroup);
    featureCount++;
}

// Remove feature group
function removeFeature(button) {
    button.closest('.mb-3').remove();
}

// Preview uploaded image
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
document.addEventListener('DOMContentLoaded', function() {
    // Initialize CKEditor
    ClassicEditor.create(document.querySelector('#description')).catch(error => {
        console.error(error);
    });

    // Image preview function
    window.readURL = function(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewImage').src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    };
});
</script>
@endpush