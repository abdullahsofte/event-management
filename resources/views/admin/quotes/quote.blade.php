@extends('layouts.admin');
@section('admin-content')   
@push('admin-css')
<style>
  #printable{
    display: none !important;
  }
  td{
    border:1px solid #B4B5B6
  }
  thead{
    background-color: red;
    color:#FFFFFF;
  }
  .quote-img{
    height: 50px;
    width: auto;
  }
  .company-name{
    color:red;
    font-size: 40px;
    padding-bottom: 5px;
    border-bottom: 3px solid red;
    margin-bottom: 0px;
  }
  .center{
    display: flex;
    justify-content: center
  }
</style>
@endpush     
@php $route = url()->current(); @endphp 
<div class="container my-4">
  <div style=" margin: auto;" >
    <div class="row">
        <div class="col-xs-12">
            <div class="card mb-3 px-2" >
                <div class="card-body" id="printableArea">    
                    <div style="display:flex;justify-content:center;">
                      <div style="width:90%; display:flex; margin-bottom:25px">
                          <div style="width:30%; align-self:center" >
                            <div style="float:right">
                              <img src="{{asset($content->logo)}}" alt="" class="quote-img">
                            </div>
                          </div>
                          <div style="width:70%; padding-top:0p;margin-top:0px">
                            <h6 class="company-name" style="padding: 2px 0px; margin:0px">{{ $content->company_name }}</h6>
                            <strong style="padding: 5px 0px; font-size:14px">Phone: {{ $content->phone_1 }}, {{  $content->phone_2  }}, Email: {{ $content->email }}</strong>                      
                            <strong style="padding: 5px 0px;" class="href">{{ $route }}</strong>
                          </div>
                      </div>
                   </div>

                    <div class="table-responsive">
                          <table style="border-collapse: collapse;width: 100%;">
                            <thead style=" padding:10px;">
                              <tr>
                                  <th style="padding:10px;">#</th>
                                  <th style="padding:10px;text-align:left">Product Name</th>
                                  <th style="padding:10px; text-align:center">Quantity</th>
                                  <th style="text-align: right; padding:10px;">Unit cost</th>
                                  <th style="text-align: right; padding:10px;">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                                      
                              @foreach($quote->quoteDetails as $id=>$item)
                              <tr style="text-align: right;">
                                <td style="text-align: center; padding:5px; font-size:13px">{{ ++$id }}</td>
                                <td style="text-align: left; padding:5px; font-size:13px">{{ optional($item->product)->name }}</td>
                                <td  style="text-align:center; padding:5px; font-size:13px">{{ $item->quantity }}</td>
                                <td style="text-align: right; padding:5px; font-size:13px">৳ {{ $item->price }}</td>
                                <td style="text-align: right; padding:5px; font-size:13px">৳ {{ $item->sub_total }}</td>
                              </tr>    
                              @endforeach

                              <tr>
                                <td colspan="4" style="text-align: right; padding:5px; font-size:13px"><strong>Total</strong></td>
                                <td colspan="4" style="text-align: right; padding:5px; font-size:13px">৳ {{ $quote->total }}</td>
                              </tr>
                              
                            </tbody>
                          </table>                       
                    </div> 
                    <style>
                      @media print{                    
                        td{
                            border:1px solid #B4B5B6
                          }
                        thead{
                              background-color: red;
                              color:#FFFFFF;
                          }
                        .quote-img{                        
                            height: 35px;
                            width: auto;
                            align-self: center;
                          }
                          .company-name{
                            color:red;
                            font-size: 25px;
                            padding-bottom:2px;
                            border-bottom: 3px solid red;
                            margin-bottom: 5px
                          }
                          .href{
                            font-size: 14px;
                          }
                      }
                    </style>                 
                </div>
                <div class="container-fluid mb-3">
                  <div class="float-end">
                  <button  onclick="printDiv('printableArea')" class="btn btn-primary btn-sm"><i class="fa fa-print mr-1"></i>&nbsp;Print</button>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>  
@endsection
@push('admin-js')
      <script>
          function printDiv(divName) {
          var printContents = document.getElementById(divName).innerHTML;
          var originalContents = document.body.innerHTML;
          document.body.innerHTML = printContents;
          window.print();
          document.body.innerHTML = originalContents;
      }
      </script>

  @endpush