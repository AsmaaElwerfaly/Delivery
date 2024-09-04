@extends('layouts.master')
@section('title')
الشحنات 
@stop

@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
                            <h4 class="content-title mb-0 my-auto"> الشحنات </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">
                            </span>
                                </div>
					</div>
					
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session()->has('Add'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('Add') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session()->has('delete'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('delete') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session()->has('edit'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('edit') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif









				<!-- row opened -->
				<div class="row row-sm">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
								</div>
                                <a class=" btn btn-outline-primary " href="{{ url('/' . $page='AddShipment') }}" > إضافة شحنة +</a>

							</div>
							<div class="card-body">
								<div class="table-responsive">
                                    <br>
                                  
                                    <div >
                                    <form action="{{route('search.store')}}" method="POST"  autocomplete="off">
                                        {{ csrf_field() }}     
                                        <div class="row">
                                                                     
                                            <div class="col">
                                                <input type="text" class="form-control"  name="cargo_code" placeholder="بحث بكود الطرد ">
                                            </div>  
                                            <div class="col">

                                                <button class=" btn btn-outline-primary "><i class="las la-search"></i></button>
                                            </div>  
          
                                          </form>
                                      </div>
                                       


                                         


									<table class="dataTables_wrapper dt-bootstrap4" id="example2">
										<thead>
                                            <tr>
                                                <th >ت</th>
                                                <th >كود العميل </th>
                                                <th >العميل </th>
                                                <th >اسم المرسل</th>
                                                <th >رقم المرسل  </th>
                                                <th >اسم المستلم  </th>
                                                <th >رقم المستلم  </th>
                                                <th >كود الطرد </th>
                                                <th >يسمح بفتحه نعم/لا    </th>
                                                <th >حالة الطرد   </th>
                                                <th >عدد الطرود   </th>
                                                <th >رصيد البضائع </th>
                                                <th >رصيد العمولة  </th>
                                                <th >رصيد الطلب  </th>

                                                <th >ملاحظات الطرد   </th>
                                                <th >المدينة </th>
                                                <th >المنطقة </th>
                                                <th >كود المدينة </th>
                                                <th >الفرع </th>
                                                <th >المندوب </th>

                                                <th >العمليات</th>

                                            </tr>
                						</thead>
										<tbody>
                                            
											<tr>
                                                <?php $i =0?>
                                                @foreach($Shipment as $x)
                                                <?php $i++?>
                                           
                                                <td>{{$i}}</td>
                                                <td>{{$x->customer_code}}</td>
                                                <td>{{$x->customer_name}}</td>
                                                <td>{{$x->sender_name}}</td>
                                                <td>{{$x->sender_num}}</td>
                                                <td>{{$x->represent_name}}</td>
                                                <td>{{$x->represent_num}}</td>
                                                <td>{{$x->cargo_code}}</td>
                                                <td>{{$x->openable}}</td>
                                                <td>{{$x->condition_cargo}}</td>
                                                <td>{{$x->count_cargo}}</td>
                                                <td>{{$x->balance_cargo}}</td>
                                                <td>{{$x->balance_commossion}}</td>
                                                <td>{{$x->balance_order}}</td>
                                                <td>{{$x->package_notes}}</td>
                                                <td>{{$x->city}}</td>
                                                <td>{{$x->part}}</td>
                                                <td>{{$x->city_code}}</td>
                                                <td>{{ $x->branches->branche_name}}</td>
                                                <td>{{ $x->represents->name_represent ?? ' لا يوجد'}}</td>


                                            <td>
                                             
                                                    <a class="modal-effect btn btn-sm btn-primary" data-effect="effect-scale"
                                                        data-id="{{ $x->id }}"   data-branche_id="{{ $x->branche_id }}" data-name_represent="{{ $x->represents->name_represent ?? ' لا يوجد'}}"
                                                        data-toggle="modal"
                                                        href="#exampleModal2" title="اسناد مندوب"><i class="las la-user"></i></a>

                                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                        data-id="{{ $x->id }}" data-condition_cargo="{{ $x->condition_cargo }}"
                                                        data-toggle="modal"
                                                        href="#exampleModal3" title="تعديل الحاله"><i class="las la-pen"></i></a>
                                              
                                                                                            
                                            </td>
                                        </tr>
                                        @endforeach
        
        
										</tbody>
                                    </table>
                                    </div>

                                </div>
                                    <!-- bd -->

                  
               
        </div>
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">اسناد</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="Shipment/update" method="post" autocomplete="off">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="hidden" name="id" id="id" value="">
                            <input type="hidden" name="branche_id" id="branche_id" value="">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="control-label">المندوب </label>
                            <select class='form-control' name='name_represent' id="name_represent" >
                                <!--placeholder-->
                                @foreach ($Branch as $Branch)

                                <option > {{$Branch->name_represent}}</option>
                                @endforeach
                                </select>
                        </div>

                           
                       
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">تاكيد</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="AddShipment/update" method="post" autocomplete="off">
                    {{ method_field('patch') }}
                    {{ csrf_field() }}

                                <div class="form-group">
                                   <input type="text" name="id" id="id" value="">
                                </div>
                    
                                <div class="col">
                                    <label for="inputName" class="control-label">     حالة الطرد  </label>
                                    <input type="text" class="form-control" id="inputName" name="condition_cargo" autocomplete="off"
                                         >
                                </div>
                   
                   
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">تاكيد</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
            </div>
            </form>
        </div>
    </div>
</div>
     
   <!--تعديل -->
          
                    </div>
    
                    <!-- row closed -->
                </div>
            
                    
                <!-- Container closed -->
            </div>
            
        
    
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>

<script>
    $('#exampleModal2').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var branche_id = button.data('branche_id')

        var name_represent = button.data('name_represent')
        

        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #branche_id').val(branche_id);

        modal.find('.modal-body #name_represent').val(name_represent);
      
    })

</script>


<script>
    $('#exampleModal3').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var condition_cargo = button.data('condition_cargo')
        

        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #condition_cargo').val(condition_cargo);
      
    })

</script>



@endsection