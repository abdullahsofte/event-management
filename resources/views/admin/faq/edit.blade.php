@extends('layouts.admin')
@section('title', 'Edit Faq')
@section('admin-content')
<main>
   <div class="container ">
    <div class="heading-title p-2 my-2">
        <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="{{route('admin.index')}}">Home</a> > Faq</span>
    </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class=""><i class="fab fa-servicestack me-1"></i>Edit Faq</div>
                    </div>
                    <div class="card-body table-card-body">
                        <form method="post" action="{{route('faq.update',$faq->id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <strong><label>Title</label> <span class="float-right">:</span></strong>
                                </div>
                                <div class="col-md-9">
                                <input type="text" id="title" class="form-control my-form-control @error('title') is-invalid @enderror" name="title" value="{{$faq->title}}">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span> 
                                    @enderror   
                                </div>
                        
                                <div class="col-md-3">
                                    <strong><label>Details</label> <span class="float-right">:</span></strong>
                                </div>
                                <div class="col-md-9 mt-2">
                                <textarea class="form-control  @error('description') is-invalid @enderror" name="description" id="details">{{$faq->description}}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span> 
                                    @enderror   
                                </div>
                           
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-sm mt-2 float-right  mt-3 btn-p" value="Submit">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>  
            </div>
           
        </div>
    </div>
</main>        
@endsection
@push('admin-js')
<script src="{{ asset('admin/js/ckeditor.js') }}"></script>
<script>
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
</script>
<script>
//     $(document).on('submit', '#Service', function(e){
//         e.preventDefault();
//         var url = "{{ route('service.store') }}";
//         var _token = "{{ csrf_token() }}";

//         $.ajax({
//             url: url,
//             method: 'post',
//             data: new FormData(this),
//             contentType: false,
//             processData: false,
//             success:function(res){
//                 console.log(res);
//                 $("#short_details").val('');
//                 $("#details").val('');
//                 $("#Service")[0].reset(); 
//             }
//         });
//     });

//     function getService() {
//         $.ajax({
//             type: "GET",
//             url: "/service",
//             dataType: "json",

//             success:function(res) {

//             }
//         });
//     }
// </script>


<script>
    ClassicEditor
        .create( document.querySelector( '#details' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

@endpush