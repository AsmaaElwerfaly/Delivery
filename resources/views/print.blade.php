@extends('layouts.master')
@section('css')
    <style>
        @media print {
            #print_Button {
                display: none;
            }
        }

    </style>
@endsection
@section('title')
    معاينه طباعة الفاتورة
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">تقارير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    معاينة طباعة التقرير</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-md-12 col-xl-12">
            <div class=" main-content-body-invoice" id="print">
                <div class="card card-invoice">
                    <div class="card-body">
                        <div class="invoice-header">
                            <div class="tx-center" >
                                <br><br>
                                <h3 style="text-align:center;">شركة واصل بيتك </h3>
											<h4 style="text-align:center;">    لخدمات التوصيل</h4>
                                   <br>
                                </div><!-- billed-from -->
                            </div><!-- invoice-header -->
                        <div class="row mg-t-20">
                           
                            <div class="col-md">
                                <p class="invoice-info-row"><span>رقم المرسل </span>
                                    <span>{{$Shipment->sender_num}}</span></p>
                                <p class="invoice-info-row"><span>رقم المستلم </span>
                                    <span>{{$Shipment->represent_num}}</span></p>
                                    @php
                                    $total = $Shipment->balance_cargo + $Shipment->balance_commossion + $Shipment->balance_order ;
                                    @endphp
                                <p class="invoice-info-row"><span>الاجمالي </span>
                                    <span>{{$total}}</span></p>
                              
                            </div>
                        </div>
                        <div class="table-responsive mg-t-40">
                            <table class="table table-invoice border text-md-nowrap mb-0">
                                <thead>
                                    <tr>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                      
                                       
                                   
                                    </tr>

                                    <tr>
                                        <td class="valign-middle" colspan="2" rowspan="4">
                                            <div class="invoice-notes">

                                            </div><!-- invoice-notes -->
                                        </td>
                                      
                                  
                                     

                                    </tr>
                                    <tr>
                                        <td class="tx-right tx-uppercase tx-bold tx-inverse">الاجمالي  </td>
                                        <td class="tx-right" colspan="2">
                                            <h4 class="tx-primary tx-bold">{{$total}}</h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr class="mg-b-40">



                        <button class="btn btn-danger  float-left mt-3 mr-2" id="print_Button" onclick="printDiv()"> <i
                                class="mdi mdi-printer ml-1"></i>طباعة</button>
                    </div>
                </div>
            </div>
        </div><!-- COL-END -->
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>


    <script type="text/javascript">
        function printDiv() {
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }

    </script>

@endsection