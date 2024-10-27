@extends('layouts.admin')
@section('title', 'Product Create')
@push('admin-css')
    <style>
        header {
            font-size: 9px;
            color: #f00;
            text-align: center;
        }

        @page {
            size: A4;
            margin: 11mm 17mm 17mm 17mm;
        }

        @media print {
            header {
                position: fixed;
                bottom: 0;
            }

            .content-block,
            p {
                page-break-inside: avoid;
            }

            html,
            body {
                width: 210mm;
                height: 297mm;
            }
        }
    </style>
@endpush
@section('admin-content')
    <main class="mb-5">
        <div class="container">
            <div class="heading-title p-2 my-2">
                <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="">Home</a> > Create
                    Product</span>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header py-1"><span
                                style="font-size: 14px;
                                font-weight: 600;
                                color: #0e2c96;">Create
                                Product</span> </div>
                        <div class="card-body table-card-body my-table">
                            <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <strong><label>Product Code</label><span class="color-red">*</span>
                                                    <span class="my-label">:</span> </strong>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" name="code" value="{{ $productCode }}"
                                                    class="form-control my-form-control" placeholder="Product ID">
                                            </div>

                                            <div class="col-md-4">
                                                <strong><label>Name</label><span class="color-red">*</span> <span
                                                        class="my-label">:</span> </strong>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" name="name" value="{{ old('name') }}"
                                                    placeholder="Product Name"
                                                    class="form-control my-form-control @error('name') is-invalid @enderror"
                                                    required>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>


                                            <div class="col-md-4">
                                                <strong><label>Price</label><span class="my-label">:</span> </strong>
                                            </div>

                                            <div class="col-md-8">
                                                <input type="text" name="price" value="{{ old('price') }}"
                                                    placeholder="price"
                                                    class="form-control my-form-control @error('price') is-invalid @enderror">
                                                @error('price')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            {{-- <div class="col-md-4">
                                                <strong><label>Size</label><span class="my-label">:</span> </strong>
                                            </div>

                                            <div class="col-md-8">
                                                <input type="text" name="size" value="{{ old('size') }}"
                                                    placeholder="Size"
                                                    class="form-control my-form-control @error('size') is-invalid @enderror">
                                                @error('size')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div> --}}


                                            <div class="col-md-4">
                                                <strong><label>Short Description</label> <span class="my-label">:</span>
                                                </strong>
                                            </div>
                                            <div class="col-md-8">
                                                <textarea name="short_details" class="form-control short_description @error('short_details') is-invalid @enderror"
                                                    id="editor" cols="30" rows="3"></textarea>
                                                @error('short_details')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <strong><label>Image</label> <span class="my-label">:</span>
                                                </strong> <br>
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
                                                                {{ old('category_id') == $item->id ? 'selected' : '' }}>
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
                                            <div class="col-md-8 mt-1">
                                                <div class="input-group input-group-sm">
                                                    <select name="brand_id" id="brand_id"
                                                        class="js-example-basic-multiple form-control my-form-control @error('sub_category_id') is-invalid @enderror "
                                                        data-live-search="true">
                                                        <option value="">Select brand</option>
                                                        @foreach ($brand as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('brand_id') == $item->id ? 'selected' : '' }}>
                                                                {{ $item->name }}</option>
                                                        @endforeach
                                                        </option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <a class="border rounded my-select my-form-control py-0 px-2"
                                                            href="{{ route('brand.index') }}" target="_blank"><i
                                                                class="fas fa-plus"></i></a>
                                                    </div>
                                                </div>
                                                @error('brand_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            {{-- <div class="col-md-4">
                                                <strong><label>Origin </label>
                                                    <span class="my-label">:</span> </strong>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="input-group input-group-sm">
                                                    <select name="origin_id" id="origin_id"
                                                        class="custom-select js-example-basic-multiple form-control my-select my-form-control @error('origin_id') is-invalid @enderror"
                                                        data-live-search="true">
                                                        <option value="">Select Origin</option>
                                                        @foreach ($origin as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('origin_id') == $item->id ? 'selected' : '' }}>
                                                                {{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group-append">
                                                        <a class="border rounded my-select my-form-control py-0 px-2"
                                                            href="{{ route('origin.index') }}" target="_blank"><i
                                                                class="fas fa-plus"></i></a>
                                                    </div>
                                                </div>
                                                @error('category_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div> --}}


                                            {{-- <div class="col-md-4">
                                                <strong><label>Brand</label><span class="my-label">:</span>
                                                </strong>
                                            </div>

                                            <div class="col-md-8 mt-1">
                                                <div class="input-group input-group-sm">
                                                    <select name="brand_id" id="brand_id"
                                                        class="js-example-basic-multiple form-control my-form-control @error('sub_category_id') is-invalid @enderror "
                                                        data-live-search="true">
                                                        <option value="">Select brand</option>
                                                        @foreach ($brand as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ old('brand_id') == $item->id ? 'selected' : '' }}>
                                                                {{ $item->name }}</option>
                                                        @endforeach
                                                        </option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <a class="border rounded my-select my-form-control py-0 px-2"
                                                            href="{{ route('brand.index') }}" target="_blank"><i
                                                                class="fas fa-plus"></i></a>
                                                    </div>
                                                </div>
                                                @error('brand_id')
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
                                                    {{ old('is_offer') == '1' ? 'checked' : '' }} name="is_offer"
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
                                                    {{ old('is_feature') == '1' ? 'checked' : '' }}
                                                    class="@error('is_featured') is-invalid @enderror" id="">
                                                @error('is_featured')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <label for="">Feature</label>
                                            </div>
                                            <div class="col-md-3 mt-1">
                                                <input type="checkbox" name="new_status" value="1"
                                                    {{ old('new_status') == '1' ? 'checked' : '' }}
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
                                                <textarea name="description" class="form-control" id="description" cols="30" rows="3"></textarea>
                                                @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            {{-- <div class="col-md-4">
                                                <strong><label>Other Image</label> <span class="my-label">:</span></strong>
                                                <br>
                                                <small>Image (255*300 px)</small>
                                            </div>
                                            <div class="col-md-8 mt-1">
                                                <input type="file" class=" form-control form-control-sm"
                                                    maxlength="5" id="otherImage" name="otherImage[]" multiple />
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="btn btn-primary btn-sm float-right mt-2">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- product list --}}
                    <div class="card mt-3">
                        <div class="card-header">
                            <div class="table-head text-left"><i class="fas fa-table me-1"></i>Product List <a
                                    href="" class="float-right"><i class="fas fa-print"
                                        onclick="printable()"></i></a></div>

                        </div>
                        <div class="card-body table-card-body p-3">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="pending" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <table id="first_table">
                                        <thead class="text-center bg-light">
                                            <tr>
                                                <th>SL</th>
                                                <th>Product Code</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Category</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($product as $key => $item)
                                                <tr>
                                                    <td class="text-center">{{ $key + 1 }}</td>
                                                    <td class="text-center">{{ $item->code }}</td>
                                                    <td class="text-center">{{ $item->name }}</td>
                                                    <td class="text-center">{{ $item->price }}</td>
                                                    <td class="text-center">{{ $item->category->name }}</td>
                                                    <td class="text-center"><img src="{{ asset($item->image) }}"
                                                            class="tbl-image" alt=""></td>
                                                    <td class="text-center">
                                                        <a href="{{ route('product.edit', $item->slug) }}"
                                                            class="btn btn-edit"><i class="fas fa-pencil-alt"></i></a>
                                                        <button type="submit" class="btn btn-delete"
                                                            onclick="deleteUser({{ $item->id }})"><i
                                                                class="far fa-trash-alt"></i></button>
                                                        <form id="delete-form-{{ $item->id }}"
                                                            action="{{ route('product.delete', $item->id) }}"
                                                            method="POST" style="display: none;">
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
            </div>
    </main>

@endsection
@push('admin-js')
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <script src="{{ asset('admin/js/ckeditor.js') }}"></script>
    <script src="{{ asset('admin/js/sweetalert2.all.js') }}"></script>
    <script>
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
    {{-- <script>
        $(document).ready(function() {
            $("select[name='category_id']").on('change', function() {
                var category_id = $(this).val();
                $.ajax({
                    url: "{{ url('product/subcategory/list') }}/" + category_id,
                    dataType: "json",
                    method: "GET",
                    success: function(data) {
                        $('#sub_category_id').empty();
                        $.each(data, function(key, value) {
                            $('#sub_category_id').append('<option value="' + value.id +
                                '">' + value.name + '</option>');
                        });
                    }
                });

            });

            $("select[name='sub_category_id']").on('change', function() {
                var sub_category_id = $(this).val();
                // console.log(sub_category_id);
                $.ajax({
                    url: "{{ url('product/subsubcategory-list') }}/" + sub_category_id,
                    dataType: "json",
                    method: "GET",
                    success: function(data){
                        console.log(data);
                        $('#subsubcategory_id').empty();
                        $.each(data, function(key, value) {
                            $('#subsubcategory_id').append('<option value="' + value.id +
                                '">' + value.name + '</option>');
                        });
                    }
                });

            });
        });


    </script> --}}
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
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
                        .width(100)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        document.getElementById("previewImage").src = "/noimage.png";
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
                                "<img class=\"imageThumb\" src=\"" + e.target.result +
                                "\" title=\"" + file.name + "\"/>" +
                                "<br/><span class=\"remove\">Remove</span>" +
                                "</span>").insertAfter("#otherImage");
                            $(".remove").click(function() {
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

    <script>
        var data = "";
        data = data + '<div class="feature-group d-flex">';
        data = data + ' <div class="feature-input">';
        data = data + '<div class="">';
        data = data +
            '<textarea name="features[]" maxlength="200"  class="feature-input-field form-control" id="" cols="30" rows="2"></textarea>';
        data = data + '</div>';
        data = data + '</div>';
        data = data + '<div class="add-delete-section">';
        data = data + '<div class="add-part" onclick="add()">';
        data = data +
            '<a href="javascript:void(0);" class="border add text-success btn rounded my-form-control py-0 px-2 add-area" ><i class="fas fa-plus" ></i></a>';
        data = data + '</div>';
        data = data + '<div class="remove-part" >';
        data = data +
            '<a href="javascript:void(0);" class="border minus text-danger btn rounded my-form-control py-0 px-2 my-1" ><i class="fas fa-minus" ></i></a>';
        data = data + '</div>';
        data = data + '</div>';
        data = data + '</div>';

        function add() {
            $("#add-remove-section").append(data);
        }

        $(document).on('click', '.remove-part', function() {
            $(this).parents('.feature-group').remove();
        })
    </script>

     {{-- <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            $('#category_id').on('change', function() {
                var category_id = $(this).val();
                var subcategoryDropdown = $('#subcategory_id');
                subcategoryDropdown.empty().append('<option value="">Select Sub Category</option>');

                if (category_id) {
                    $.ajax({
                        url: "{{ route('subcategory.list', '') }}/" + category_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            if (data.length > 0) {
                                $.each(data, function(key, value) {
                                    subcategoryDropdown.append(
                                        `<option value="${value.id}">${value.name}</option>`
                                    );
                                });
                            } else {
                                subcategoryDropdown.append(
                                    '<option>No subcategories found</option>');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                            alert('Unable to load subcategories. Please try again.');
                        }
                    });
                }
            });
        });
    </script> --}}
@endpush
