@extends('layouts.admin')
@section('title', 'Order Record')
@section('admin-content')
<main>
  <div class="container">
      <div class="heading-title p-2 my-2">
          <span class="my-3 heading "><i class="fas fa-home"></i> <a class=""
                  href="{{ route('admin.index') }}">Home</a> >Quotation Record</span>
      </div>
      <div class="card">
          <div class="card-header">
              <div class="table-head text-left"><i class="fas fa-table me-1"></i>Quotation Record <a href=""
                      class="float-right"><i class="fas fa-print"></i></a></div>
          </div>
          <div class="card-body">
            <form action="{{ route('actionCheck.store') }}" method="post" id="actionForm">
                @csrf
                @method('POST') </form>
                <div class="row my-2">
                    <div class="col-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="checkAll" form="actionForm">
                            <label class="form-check-label" for="checkAll">
                              Select All
                            </label>
                          </div>
                    </div>

                    <div class="col-8">
                        <button class="btn  btn-primary btn-sm" type="submit" form="actionForm">Delete</button>
                    </div>

                </div>


              <form action="{{ route('quote.record.search') }}" method="get">
                  <div class="row">        
                      <div class="col-3">
                         <select name="customer_id" id="" class="form-control js-example-basic-multiple" required>
                             <option value="">Select Customer</option>
                             @foreach ($customer as $item)
                             <option value="{{$item->customer_id}}">{{optional($item->customer)->name}}</option>
                             @endforeach
                         </select>
                          @error('start_date')
                              <span class="invalid-feedback" role="alert">
                                  {{ $message }}
                              </span>
                          @enderror
                      </div>
                      <div class="col-3">
                          <input type="date" name="start_date" value="<?php echo date('Y-m-d'); ?>"  class="form-control @error('start_date') is-invalid @enderror">
                          @error('start_date')
                              <span class="invalid-feedback" role="alert">
                                  {{ $message }}
                              </span>
                          @enderror
                      </div>
                      <div class="col-3">
                          <input type="date" name="end_date" value="<?php echo date('Y-m-d'); ?>" class="form-control @error('end_date') is-invalid @enderror">
                          @error('end_date')
                          <span class="invalid-feedback" role="alert">
                              {{ $message }}
                          </span>
                      @enderror
                      </div>
                      <div class="col-3">
                          <button class="btn  btn-primary btn-sm" type="submit">search</button>
                      </div>
                  </div>
              </form>
          </div>
          <div class="card-body table-card-body p-3">
              <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="home-tab">
                      <table id="first_table">
                          <thead class="text-center bg-light">
                              <tr>
                                <th class="text-nowrap">Select</th>
                                  <th class="text-nowrap">SL</th>
                                  <th class="text-nowrap">Customer Name</th>
                                  <th class="text-nowrap">Created at</th>
                                  <th class="text-nowrap">Total</th>
                                  <th class="text-nowrap">Action</th>
                                
                              </tr>
                          </thead>
                          <tbody class="text-center">
                           @if(isset($quote))
                              @foreach ($quote as $key=> $item)
                                <tr>
                                    <td><input type="checkbox" value="{{ $item->id }}" form="actionForm" name="actionChk[]" class="check"></td>
                                    <td>{{$key+1}}</td>
                                    <td>{{optional($item->customer)->name}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->total}}</td>
                                    <td><a href="{{ route('quote-details.admin', $item->id) }}" class="btn btn-edit"><i class="fas fa-eye"></i></a></td>                            
                                </tr>
                               @endforeach
                            
                          </tbody>
                          @endif
                      </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection
@push('admin-js')
<script>
    $("#checkAll").click(function () {
        $(".check").prop('checked', $(this).prop('checked'));
    });
</script>
@endpush