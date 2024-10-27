@extends('layouts.admin')
@section('title', 'Banner')
@section('admin-content')
    <main>
        <div class="container ">
            <div class="heading-title p-2 my-2">
                <span class="my-3 heading "><i class="fas fa-home"></i> <a class=""
                        href="{{ route('admin.index') }}">Home</a> >Banner</span>
            </div>
            <form id="bannerCreate" class="bannerCreate" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header py-1">
                                <div class="addT"><i class="fas fa-images me-1"></i>Add Banner</div>
                                <div class="updateT" style="display: none"><i class="fas fa-images me-1"></i>Update Banner
                                </div>
                            </div>
                            <input type="hidden" id="id" name="id">
                            <div class="card-body table-card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <strong><label>Title</label> <span class="float-right">:</span></strong>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control my-form-control" id="title"
                                            name="title">
                                        <strong><span class="text-danger" id="titleError"></span></strong>
                                    </div>
                                    <div class="col-md-3">
                                        <strong><label>Banner Link</label> <span class="float-right">:</span></strong>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="url" class="form-control my-form-control" id="offer_link"
                                            name="offer_link">
                                        <strong><span class="text-danger" id="offer_link"></span></strong>
                                    </div>
                                    <div class="col-md-3">
                                        <strong><label>Short Details</label> <span class="float-right">:</span></strong>
                                    </div>
                                    <div class="col-md-9">
                                        <textarea name="short_details" id="short_details" class="form-control"></textarea>
                                    </div>

                                    <div class="col-md-3">
                                        <strong><label>Image</label> <span class="float-right">:</span></strong>
                                        <small>Image (1920*1280 px)</small>
                                    </div>
                                    <div class="col-md-5 mt-2">
                                        <input type="file" class="form-control  my-form-control" id="image"
                                            name="image" onchange="readURL(this);">
                                        <strong><span class="text-danger" id="imageError"></span></strong>
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        <img class="form-controlo img-thumbnail" src="#" id="previewImage"
                                            style="height:100px;width:120px; background: #3f4a49;">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary btn-sm mt-2 float-right mt-3 btn-p"
                                            id="createBtn" onclick="addData()" value="Submit">Create</button>
                                        <button type="submit" class="btn btn-primary btn-sm mt-2 float-right mt-3 btn-p"
                                            id="updateBtn" style="display: none" value="Submit">Update</button>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header py-1">
                                <div class="table-head"><i class="fas fa-table me-1"></i>Banner List <a href="#"
                                        class="btn btn-sm float-right"><i class="fas fa-print"></i></a></div>
                            </div>
                            <div class="card-body table-card-body p-3">
                                <table id="datatablesSimple">
                                    <thead class="text-center bg-light">
                                        <tr>
                                            <th> Title</th>
                                            <th>details</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBody">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
@push('admin-js')
    <script src="{{ asset('admin/js/sweetalert2.all.js') }}"></script>

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
        document.getElementById("previewImage").src = "/noimage.png";
    </script>

    <script>
        // AJAX setup for CSRF token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Fetch all banners and populate table
        function allData() {
            $.ajax({
                url: "{{ route('banner.all') }}",
                type: "get",
                dataType: "json",
                success: function(res) {
                    let data = "";
                    $.each(res, function(key, value) {
                        data += `
                    <tr>
                        <td>${value.title}</td>
                        <td>${value.offer_link}</td>
                        <td><img class='tbl-image' src="/${value.image}" width="80"></td>
                        <td class="text-nowrap text-center">
                            <a class="btn btn-info btn-sm" onclick="editData(${value.id})">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" onclick="deleteData(${value.id})">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>`;
                    });
                    $('#tableBody').html(data);
                }
            });
        }
        allData();

        // Handle Create and Update Forms
        $(document).on('submit', '.bannerCreate, .editCreate', function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            let url = $(this).hasClass('editCreate') ? "{{ route('banner.update') }}" :
                "{{ route('banner.store') }}";

            $.ajax({
                url: url,
                type: "POST",
                dataType: "json",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(res) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: $(this).hasClass('editCreate') ? 'Banner updated successfully!' :
                            'Banner added successfully!',
                        timer: 1500,
                        showConfirmButton: false
                    });

                    // Reset the form after adding or updating
                    resetForm();
                    allData();
                },
                error: function(err) {
                    let errors = err.responseJSON.errors;
                    $('#titleError').text(errors.title ?? '');
                    $('#offer_linkError').text(errors.offer_link ?? '');
                    $('#imageError').text(errors.image ?? '');

                    if (errors.title) $('#title').addClass('is-invalid');
                    if (errors.offer_link) $('#offer_link').addClass('is-invalid');
                    if (errors.image) $('#image').addClass('is-invalid');
                }
            });
        });

        // Reset the form and restore default state
        function resetForm() {
            $('#bannerCreate').trigger('reset'); // Clear all form inputs
            $('#short_details').val(''); // Clear the short details textarea
            $('#previewImage').attr('src', '/noimage.png'); // Reset preview image
            $('#createBtn').show(); // Show 'Create' button
            $('#updateBtn').hide(); // Hide 'Update' button
            $('#titleError, #offer_linkError, #imageError').text(''); // Clear error messages
            $('#title, #offer_link, #image').removeClass('is-invalid'); // Remove invalid highlights
            $('#bannerCreate').removeClass('editCreate').addClass('bannerCreate'); // Switch back to 'Create' mode
        }


        // Load data into form for editing
        function editData(id) {
            $.ajax({
                url: `/website-content/banner/edit/${id}`,
                type: "get",
                dataType: "json",
                success: function(res) {
                    $('#createBtn').hide();
                    $('#updateBtn').show();
                    $('#title').val(res.title);
                    $('#short_details').html(res.short_details);
                    $('#offer_link').val(res.offer_link);
                    $('#previewImage').attr('src', res.image);
                    $('#id').val(res.id);
                    $('#bannerCreate').removeClass('bannerCreate').addClass(
                        'editCreate');
                }
            });
        }

        // Delete a banner
        function deleteData(id) {
            if (confirm("Are you sure you want to delete this banner?")) {
                $.ajax({
                    url: `/website-content/banner/delete/${id}`,
                    type: "get",
                    dataType: "json",
                    success: function(res) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            text: 'Banner deleted successfully!',
                            timer: 1500,
                            showConfirmButton: false
                        });
                        allData();
                        resetForm();
                    }
                });
            }
        }

        // Fetch all banners and populate the table
        function allData() {
            $.ajax({
                url: "{{ route('banner.all') }}",
                type: "get",
                dataType: "json",
                success: function(res) {
                    let data = "";
                    $.each(res, function(key, value) {
                        data += `
                    <tr>
                        <td>${value.title}</td>
                        <td>${value.offer_link}</td>
                        <td><img class='tbl-image' src="/${value.image}" width="80"></td>
                        <td class="text-nowrap text-center">
                            <a class="btn btn-info btn-sm" onclick="editData(${value.id})">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" onclick="deleteData(${value.id})">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>`;
                    });
                    $('#tableBody').html(data);
                }
            });
        }

        allData();
    </script>
@endpush
