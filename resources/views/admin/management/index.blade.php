@extends('layouts.admin')
@section('title', 'Management Add')
@section('admin-content')
<main>
   <div class="container ">
    <div class="heading-title p-2 my-2">
        <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="{{route('admin.index')}}">Home</a> >Management Add</span>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-user-plus"></i>
            Management form
        </div>
        <div class="card-body table-card-body p-3 mytable-body">
            <form action="{{route('management.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                     <div class="col-md-6">
                         <div class="row">
                            <div class="col-md-4">
                                <label> Rank </label>
                            </div>
                            <div class="col-md-1 text-right">
                                 <span class="clone">:</span>
                             </div>
                            <div class="col-md-7">
                                 <input type="text" name="rank" class="form-control my-form-control @error('rank') is-invalid @enderror">
                                 @error('rank')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span> 
                                 @enderror 
                             </div> 
                            <div class="col-md-4">
                                <label> Name </label>
                            </div>
                            <div class="col-md-1 text-right">
                                 <span class="clone">:</span>
                             </div>
                            <div class="col-md-7">
                                 <input type="text" name="name" class="form-control my-form-control @error('name') is-invalid @enderror">
                                 @error('name')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span> 
                                 @enderror 
                             </div> 
                             <div class="col-md-4">
                                <label>Designation </label>
                            </div>
                            <div class="col-md-1 text-right">
                                 <span class="clone">:</span>
                             </div>
                             <div class="col-md-7">
                                <input type="text" name="designation" class="form-control my-form-control  @error('designation') is-invalid @enderror" >
                                @error('designation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> 
                                @enderror 
                             </div> 
                         </div>
                     </div>
                     <div class="col-md-6">
                        <div class="row right-row">
                       
                             <div class="col-md-4">
                                <label>Image </label>
                            </div>
                            
                            <div class="col-md-1 text-right">
                                 <span class="clone">:</span>
                             </div>
                             <div class="col-md-5">
                                <input type="file" class="form-control my-form-control  @error('image') is-invalid @enderror" id="image" name="image" onchange="readURL(this);">
                                <small>Image(540*640 px)</small>
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> 
                                @enderror 
                            </div>
                            <div class="col-md-2 ps-0">
                                <img class="form-controlo img-thumbnail w-100" src="#" id="previewImage" style="height:80px; background: #3f4a49;">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-sm mt-2 float-right" value="Submit">Submit</button>
                            </div>
                        </div>
                    </div>  
                </div>
            </form>
        </div>
   </div>
        <div class="row">
            <div class="col-12">
               <div class="card"> 
                <div class="card-header">
                    <div class="table-head"><i class="fas fa-table me-1"></i>Management List</div>
                </div>
                <div class="card-body table-card-body p-3">
                    <table id="datatablesSimple">
                        <thead class="text-center bg-light">
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Rank</th>
                                <th>Image</th> 
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($management as $key=> $item)
                           <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->designation }}</td>
                                <td>{{ $item->rank }}</td>
                                <td><img class="tbl-image" src="{{ asset($item->image) }}" alt=""></td>
                                <td class="text-center">
                                    <a href="{{ route('management.edit', $item->id) }}" class="btn btn-edit"><i class="fas fa-pencil-alt"></i></a>
                                    <button type="submit" class="btn btn-delete" onclick="deleteUser({{ $item->id }})"><i class="far fa-trash-alt"></i></button>
                                        <form id="delete-form-{{ $item->id }}" action="{{ route('management.destroy', $item) }}"
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
</main>        
@endsection
@push('admin-js')
<script src="{{ asset('admin/js/sweetalert2.all.js') }}"></script>
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
                    .width(100);
                   
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