@extends('layouts.admin')
@section('title', 'Origin Entry')
@section('admin-content')
<main>
   <div class="container ">
    <div class="heading-title p-2 my-2">
        <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="{{route('admin.index')}}">Home</a> > Origin Entry</span>
    </div>
    
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <form action="{{route('origin.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-header">
                                    <div class=""><i class="fas fa-cogs me-1"></i>Add Origin</div>
                                </div>
                                <div class="card-body table-card-body">
                                    <div class="row">
                                        
                                        <div class="col-md-3">
                                            <strong><label>Name</label><span class="float-right">:</span></strong>
                                        </div>
                                        <div class="col-md-9">
                                        <input type="text" class="form-control my-form-control @error('name') is-invalid @enderror" name="name">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-primary float-right mt-2" value="Submit">Create</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="card"> 
                            <div class="card-header">
                                <div class="table-head"><i class="fas fa-table me-1"></i>Origin List <a href="" class="float-right"><i class="fas fa-print"></i></a></div>
                            </div>
                            <div class="card-body table-card-body p-3">
                                <table id="datatablesSimple">
                                    <thead class="text-center bg-light">
                                        <tr>
                                            <th>SL</th>
                                            <th> Name</th>
                                            <th width="20%" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($origin as $key=> $item)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$item->name}}</td>
                                                <td class="text-center">
                                                    <a href="{{route('origin.edit',$item->id)}}" class="btn btn-edit btn-sm"><i class="fas fa-edit"></i></a> 
                                                    <button type="submit" class="btn btn-delete" onclick="deleteUser({{ $item->id }})"><i class="far fa-trash-alt"></i></button>
                                                    <form id="delete-form-{{ $item->id }}" action="{{ route('origin.destroy', $item->id) }}"
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
@endpush