@extends('layouts.admin')
@section('title', 'Branch Entry')
@section('admin-content')
<main class="mb-5">
   <div class="container ">
    <div class="heading-title p-2 my-2">
        <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="">Home</a> > Branch  Entry</span>
    </div>
       <div class="row">
           <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="table-head"><i class="fas fa-cogs me-1"></i>Branch Form</div>
                    </div>
                        <div class="card-body table-card-body p-3">
                        <form action="{{ route('branch.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                <div class="col-md-12 mb-2">
                                    <label for="name">Name<span class="text-danger">*</span> </label>
                                    <input type="text" name="name" value="{{ old('name') }}"  class="form-control form-control-sm shadow-none @error('name') is-invalid @enderror" id="name" placeholder="Enter Name">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="city">City<span class="text-danger">*</span> </label>
                                    <input type="text" name="city" value="{{ old('city') }}"  class="form-control form-control-sm shadow-none @error('city') is-invalid @enderror" id="city" placeholder="Enter city">
                                        @error('city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            
                                <div class="col-md-12 mb-2">
                                    <label for="phone">Phone<span class="text-danger">*</span> </label>
                                    <input type="text" name="phone" value="{{ old('phone') }}"  class="form-control form-control-sm shadow-none @error('phone') is-invalid @enderror" id="name" placeholder="Enter Phone">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="postal">Postal Code</label>
                                    <input type="text" name="postal" value="{{ old('postal') }}"  class="form-control form-control-sm shadow-none" placeholder="Enter postal code">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="province">Province</label>
                                    <input type="text" name="province" value="{{ old('province') }}"  class="form-control form-control-sm shadow-none" placeholder="Enter province">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="description">Description <span class="text-danger">*</span> </label>
                                    <textarea name="description" value="{{ old('description') }}"  class="form-control form-control-sm shadow-none @error('description') is-invalid @enderror" id="description" placeholder="descriptions Here" rows="3"></textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                <div class="col-md-12 mb-2">
                                    <label for="map">Google Map <span class="text-danger">*</span> </label>
                                    <textarea name="map" value="{{ old('map') }}"  class="form-control form-control-sm shadow-none @error('map') is-invalid @enderror" id="map" placeholder="map link here" rows="3"></textarea>
                                    @error('map')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>

                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="col-md-12 mb-2">
                                        <label for="country">Country<span class="text-danger">*</span> </label>
                                        <input type="text" name="country" value="{{ old('country') }}"  class="form-control form-control-sm shadow-none @error('country') is-invalid @enderror" id="country" placeholder="Enter country">
                                            @error('country')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label for="street_address">Street Address<span class="text-danger">*</span> </label>
                                        <input type="text" name="street_address" value="{{ old('street_address') }}"  class="form-control form-control-sm shadow-none @error('street_address') is-invalid @enderror" id="street_address" placeholder="Enter street address">
                                            @error('street_address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label for="street_address">Street Address Two<span class="text-danger">*</span> </label>
                                        <input type="text" name="street_address2" value="{{ old('street_address2') }}"  class="form-control form-control-sm shadow-none @error('street_address2') is-invalid @enderror" id="street_address" placeholder="Enter street address two">
                                            @error('street_address2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                 <div class="col-md-12 mb-2">
                                    <label for="address">Address <span class="text-danger">*</span> </label>
                                    <textarea name="address" value="{{ old('address') }}"  class="form-control form-control-sm shadow-none @error('address') is-invalid @enderror" id="address" placeholder="Address Here" rows="3"></textarea>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                              
                                  <div class="col-md-12">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" type="file" size="100" name="image" onchange="readURL(this);">
                                    <div class="form-group mt-2 mb-2">
                                        <img class="form-controlo img-thumbnail" src="#" id="previewImage" style="width: 100px;height: 80px; background: #3f4a49;">
                                      
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="float-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>  
                    </div> 
                </div>
            </div>
            
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="card"> 
                    <div class="card-header">
                        <div class="table-head"><i class="fas fa-table me-1"></i>Branch List</div>
                    </div>
                    <div class="card-body table-card-body p-3">
                        <table id="datatablesSimple">
                            <thead class="text-center bg-light">
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>City</th>
                                    <th>Country</th>
                                    <th>Province</th>
                                    <th>Postal</th>
                                    <th>Address</th> 
                                    <th>Street Address</th>
                                    <th>Street Address 2</th>
                                    {{-- <th>Description</th> --}}
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($branch as $key=> $item)
                                <tr>
                                    <td class="text-center">{{ $key+1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>{{$item->city}}</td>
                                    <td>{{$item->country}}</td>
                                    <td>{{$item->province}}</td>
                                    <td>{{$item->postal}}</td>
                                    <td>{{$item->address}}</td>
                                    <td>{{$item->street_address}}</td>
                                    <td>{{$item->street_address2}}</td>
                                    {{-- <td>{{$item->description}}</td> --}}
                                    {{-- <td>{{ Str::words($item->phone, 3 , '...')}}</td> --}}
                                    <td class="text-center"><img src="{{ asset($item->image) }}" class="tbl-image" alt=""></td>       
                                    <td class="text-center">
                                        <a href="{{route('branch.edit',$item->id)}}" class="btn btn-edit"><i class="fas fa-pencil-alt"></i></a>
                                        <button type="submit" class="btn btn-delete" onclick="deleteUser({{ $item->id }})"><i class="far fa-trash-alt"></i></button>
                                            <form id="delete-form-{{ $item->id }}" action="{{route('branch.destroy',$item->id)}}"
                                                method="POST" style="display: none;">
                                                @csrf
                                                @method('POST')
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
    document.getElementById("previewImage").src="/noimage.png";

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