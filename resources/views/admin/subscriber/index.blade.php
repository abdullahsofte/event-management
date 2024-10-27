@extends('layouts.admin')
@section('title', 'Service And Repair')
@section('admin-content')
@push('admin-css')
<style>
    .dataTable-table th a {
    text-decoration: none;
    color: inherit;
    text-align: left;
}
.dataTable-table th a:nth-last-child() {
    text-decoration: none;
    color: inherit;
    text-align: center;
}
</style>
@endpush
<main>
   <div class="container ">
    <div class="heading-title p-2 my-2">
        <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="{{route('admin.index')}}">Home</a> > Service And Repair</span>
    </div>
    <form action="#" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="card"> 
                            <div class="card-header">
                                <div class="table-head"><i class="fas fa-table me-1"></i>Service And Repair <a href="" class="float-right"><i class="fas fa-print"></i></a></div>
                            </div>
                            <div class="card-body table-card-body p-3">
                                <div class="tab-content" id="myTabContent">
                                  <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="home-tab">
                                       <table id="first_table">
                                        <thead class=" bg-light">
                                            <tr>
                                                <th width="10%">SL</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Message</th>
                                                <th width="10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($service as $key=> $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->phone }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->message }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('service.delete', $item) }}" class="btn btn-delete"><i class="far fa-trash-alt"></i></a>
                                               
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
            </form> 
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