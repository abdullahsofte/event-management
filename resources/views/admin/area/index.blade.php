@extends('layouts.admin')
@section('title', 'Area')
@section('admin-content')
<main>
   <div class="container ">
    <div class="heading-title p-2 my-2">
        <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="{{route('admin.index')}}">Home</a> >Area</span>
    </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class=""><i class="fas fa-cogs me-1"></i>Add Area</div>
                    </div>
                    <div class="card-body table-card-body">
                        <form action="{{route('area.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <strong><label>District Name</label> <span class="float-right">:</span></strong>
                                </div>
                                <div class="col-md-8 mb-1">
                                <select name="district_id" id="district_id" class="form-control" >
                                    <option value="">Select District</option>
                                    @foreach ($district as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('thana_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                                </div>
                                <div class="col-md-4">
                                    <strong><label>Thana Name</label> <span class="float-right">:</span></strong>
                                </div>
                                <div class="col-md-8  ">
                                <select name="upazila_id" id="upazila_id" class="form-control" >
                                    <option value="">Select Thana</option>
                                  
                                </select>
                                    @error('upazila_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="col-md-4 ">
                                    <strong><label>Area Name</label> <span class="float-right">:</span></strong>
                                </div>
                                <div class="col-md-8 mt-2">
                                <input type="text" class="form-control  @error('name') is-invalid @enderror " name="name" placeholder="Area Name" >
                                @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                                </div>
                                <div class="col-md-4">
                                    <strong><label>Charge Amount</label> <span class="float-right">:</span></strong>
                                </div>
                                <div class="col-md-8">
                                <input type="text" class="form-control  @error('amount') is-invalid @enderror " name="amount" placeholder="Charge Amount" >
                                @error('amount')
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
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card"> 
                    <div class="card-header">
                        <div class="table-head"><i class="fas fa-table me-1"></i>Area List <a href="" class="float-right"><i class="fas fa-print"></i></a></div>
                    </div>
                    <div class="card-body table-card-body p-3">
                        <table id="datatablesSimple" class="text-center">
                            <thead class="text-center bg-light">
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Thana</th>
                                    <th>Charge Amount</th>
                                    <th width="20%" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($areas as $key=>$area)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$area->name}}</td>
                                    <td>
                                        @if(isset($area->upazila->name))
                                            {{$area->upazila->name}}
                                        @endif
                                    </td>
                                    <td>{{$area->amount}}</td>
                                    <td>
                                        <a href="{{route('area.edit',$area->id)}}" class="btn btn-edit btn-sm"><i class="fas fa-edit"></i></a> 
                                        <button type="submit" class="btn btn-delete" onclick="deleteUser({{ $area->id }})"><i class="far fa-trash-alt"></i></button>
                                        <form id="delete-form-{{ $area->id }}" action="{{ route('area.destroy', $area->id) }}"
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
<script>
    $(document).ready(function() {
    $('#upazila_id').select2();
    $('#district_id').select2();
});
</script>
<script>
    $(document).on("change", "#district_id", function() {
        var district_id = $("#district_id").val();
        $.ajax({
            url: "{{ route('upazila.change') }}",
            type: "GET",
            data: {
                district_id: district_id
            },
            success: function(data) {
                var html = '<option value=""> Select Thana </option>';
                $.each(data, function(key, v) {
                    html += '<option value="' + v.id + '">' + v.name + ' </option>';
                });
                $("#upazila_id").html(html);
            }
        });
    });
</script>
@endpush