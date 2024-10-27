@extends('layouts.admin')
@section('title', 'Faq Page')
@section('admin-content')
<main>
   <div class="container ">
    <div class="heading-title p-2 my-2">
        <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="{{route('admin.index')}}">Home</a> > Faq</span>
    </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class=""><i class="fab fa-servicestack me-1"></i>Add Faq</div>
                    </div>
                    <div class="card-body table-card-body">
                        <form id="Service" action="{{route('faq.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <strong><label>Title</label> <span class="float-right">:</span></strong>
                                </div>
                                <div class="col-md-9">
                                <input type="text" id="title" class="form-control my-form-control @error('title') is-invalid @enderror" name="title">
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
                                <textarea class="form-control  @error('description') is-invalid @enderror" name="description" id="details"></textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span> 
                                    @enderror   
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-sm mt-2 float-right  mt-3" value="Submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>  
            </div>
                   
            <div class="col-md-6">
                <div class="card"> 
                    <div class="card-header">
                        <div class="table-head"><i class="fas fa-table me-1"></i>Faq List <a href="" class="float-right"><i class="fas fa-print"></i></a></div>
                    </div>
                    <div class="card-body table-card-body p-3">
                        <table id="datatablesSimple">
                            <thead class="text-center bg-light">
                                <tr>
                                    <th>Title</th>
                                    <th>Details</th>
                                    <th width="20%" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($faq as $item)
                                <tr>
                                    <td>{{$item->title}}</td>
                                    <td>{!!$item->description!!}</td>
                                    <td class="text-center">
                                        
                                        <form action="{{route('faq',$item->id)}}" method="post">
                                            <a href="{{route('faq.edit',$item->id)}}" class="btn btn-edit btn-sm"><i class="fas fa-edit"></i></a> 
                                            @csrf
                                            <button type="submit" class="btn btn-delete"><i class="fas fa-trash"></i></button>
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
<script src="{{ asset('admin/js/ckeditor.js') }}"></script>
<script>
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
</script>
<script>
    // $(document).on('submit', '#Service', function(e){
    //     e.preventDefault();
    //     var url = "{{ route('service.store') }}";
    //     var _token = "{{ csrf_token() }}";

    //     $.ajax({
    //         url: url,
    //         method: 'post',
    //         data: new FormData(this),
    //         contentType: false,
    //         processData: false,
    //         success:function(res){
    //             console.log(res);
    //             $("#short_details").val('');
    //             $("#details").val('');
    //             $("#Service")[0].reset(); 
    //         }
    //     });
    // });

    // function getService() {
    //     $.ajax({
    //         type: "GET",
    //         url: "/service",
    //         dataType: "json",

    //         success:function(res) {

    //         }
    //     });
    // }
</script>
<script>
        // $('#form').on('submit', function(e){
        //     e.preventDefault();

        //     var form = this;
        //     $.ajax({
        //         url:$(form).attr('action'),
        //         method:$(form).attr('method'),
        //         data:new FormData(form),
        //         processData:false,
        //         dataType:'json',
        //         contentType:false,
        //         success:function(data){
        //             if(data.code == 0){
        //                 $.each(data.error, function(prefix,val){
        //                     $(form).find('span.'+prefix+'_error').text(val[0]);
        //                 });
        //             }else{
        //                 $(form)[0].reset();
        //                 // alert(data.msg);
        //                 fetchAllProducts();
        //             }
        //         }
        //     });
        // });
</script>


<script>
    ClassicEditor
        .create( document.querySelector( '#details' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

@endpush