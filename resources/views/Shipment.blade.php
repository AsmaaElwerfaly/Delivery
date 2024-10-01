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
                                       


                                         


									<table class="dataTables_wrapper dt-bootstrap4" id="example1">
										<thead>
                                            <tr>
                                                <th >ت</th>
                                                <th >العميل </th>
                                                <th >اسم المرسل</th>
                                                <th >رقم المرسل  </th>
                                                <th >اسم المستلم  </th>
                                                <th >رقم المستلم  </th>
                                                <th >حالة الطرد   </th>
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
                                                <td>{{$x->customer_name}}</td>
                                                <td>{{$x->sender_name}}</td>
                                                <td>{{$x->sender_num}}</td>
                                                <td>{{$x->represent_name}}</td>
                                                <td>{{$x->represent_num}}</td>
                                                <td>{{$x->condition_cargo ?? 'جاري الارسال'}}</td>
                                                <td>{{ $x->branches->branche_name}}</td>
                                                <td>{{ $x->represents->name_represent ?? ' لا يوجد'}}</td>



                                            <td>
                                             
                                                    <a class="modal-effect btn btn-sm btn-primary" data-effect="effect-scale"
                                                        data-id="{{ $x->id }}"   data-branche_id="{{ $x->branche_id }}" data-name_represent="{{ $x->represents->name_represent ?? ' لا يوجد'}}"
                                                        data-toggle="modal"
                                                        href="#exampleModal2" title="اسناد مندوب"><i class="las la-user"></i></a>


                                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                        data-id="{{ $x->id }}" data-condition_cargo="{{ $x->condition_cargo }}"  data-customer_code="{{ $x->customer_code }}"  data-cargo_code="{{ $x->cargo_code }}"  data-openable="{{ $x->openable }}"
                                                        data-count_cargo="{{ $x->count_cargo }}"  data-balance_cargo="{{ $x->balance_cargo }}"  data-balance_commossion="{{ $x->balance_commossion }}"  data-balance_order="{{ $x->balance_order }}"
                                                        data-package_notes="{{ $x->package_notes }}"  data-city="{{ $x->city }}"  data-part="{{ $x->part }}" data-city_code="{{ $x->city_code }}" 

                                                        data-toggle="modal"  data-customer_name="{{ $x->customer_name }}"  data-sender_name="{{ $x->sender_name }}"  data-sender_num="{{ $x->sender_num }}"  data-represent_name="{{ $x->represent_name }}"  data-represent_num="{{ $x->represent_num }}"
                                                         data-branche_name="{{ $x->branches->branche_name}}"
                                                        href="#exampleModal3" title="تعديل الحاله"><i class="las la-pen"></i></a>


                                                        <a class="modal-effect btn btn-sm btn-success" data-effect="effect-scale"
                                                        data-id="{{ $x->id }}"  data-customer_code="{{ $x->customer_code }}"  data-cargo_code="{{ $x->cargo_code }}"  data-openable="{{ $x->openable }}"
                                                        data-count_cargo="{{ $x->count_cargo }}"  data-balance_cargo="{{ $x->balance_cargo }}"  data-balance_commossion="{{ $x->balance_commossion }}"  data-balance_order="{{ $x->balance_order }}"
                                                        data-package_notes="{{ $x->package_notes }}"  data-city="{{ $x->city }}"  data-part="{{ $x->part }}"
                                                        data-toggle="modal"
                                                        data-city_code="{{ $x->city_code }}"
                                                        href="#exampleModal4" title="تفاصيل الشحنة "><i class="las la-eye"></i></a>

                                                        <a type="button" class="btn btn-sm btn-danger" href="print/{{ $x->id }}"><i class=" fas fa-print" title="طباعة "></i></a>

                                                                                            
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
                                @foreach ($bracnh_rep as $bracnh_rep)

                                <option > {{$bracnh_rep->name_represent}}</option>
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


                    <div class="row">
                
                        <div class="col">
                         <input type="hidden" name="id" id="id" value="">
                             <label for="inputName" class="control-label">   العميل  </label>
                             <input type="text"  class="form-control" name="customer_name" id="customer_name"   >
                         </div>
         
                         <div class="col">
                            <label for="inputName" class="control-label">  كود العميل  </label>
                            <input type="text"  class="form-control" name="customer_code" id="customer_code"   >
                            
                         </div>

                        
                     </div><br>

                    <div class="row">
                
                        <div class="col">
                            <label for="inputName" class="control-label">  اسم المرسل   </label>
                            <input type="text"  class="form-control" name="sender_name" id="sender_name"  >
                         </div>
         
                         <div class="col">
                            <label for="inputName" class="control-label">  رقم المرسل   </label>
                            <input type="text"  class="form-control" name="sender_num" id="sender_num"  >
                         </div>
                         
                     </div><br>
                

                     <div class="row">
                
                        <div class="col">
                            <label for="inputName" class="control-label">  اسم المستلم   </label>
                            <input type="text"  class="form-control" name="represent_name" id="represent_name"  >
                         </div>
         
                         <div class="col">
                            <label for="inputName" class="control-label">  رقم المستلم   </label>
                            <input type="text"  class="form-control" name="represent_num" id="represent_num"  >
                         </div>
                         
                     </div><br>
                        
                       <div class="row">
                        <div class="col">
                            <label for="inputName" class="control-label">  كود الطرد  </label>
                            <input type="text"  class="form-control" name="cargo_code" id="cargo_code"  >
                        </div> 
                         <div class="col">
                             <label for="inputName" class="control-label">  يسمح بفتحه/لا   </label>
                             <input type="text"  class="form-control" name="openable" id="openable"  >
                         </div>
         
                         
                         <div class="col">
                             <label for="inputName" class="control-label">   عدد الطرود   </label>
                             <input type="text" class="form-control" name="count_cargo" id="count_cargo"  >
                         </div>
                     </div><br>
            
                     <div class="row">
                         <div class="col">
                             <label for="inputName" class="control-label">   رصيد البضائع    </label>
                             <input type="text"  class="form-control" name="balance_cargo" id="balance_cargo"  >
                         </div>
         
                         
                         <div class="col">
                             <label for="inputName" class="control-label">   رصيد العمولة     </label>
                             <input type="text"  class="form-control" name="balance_commossion" id="balance_commossion"  >
                         </div>

                         <div class="col">
                            <label for="inputName" class="control-label">   رصيد الطلب     </label>
                            <input type="text"  class="form-control" name="balance_order" id="balance_order"  >
                        </div>
                     </div><br>
         
         
                     <div class="row">
                         <div class="col">
                             <label for="inputName" class="control-label">    المدينة     </label>
                             <input type="text"  class="form-control" name="city" id="city"  >
                         </div>
         
                         <div class="col">
                             <label for="inputName" class="control-label">    المنطقة     </label>
                             <input type="text"  class="form-control" name="part" id="part"  >
                         </div>

                         <div class="col">
                            <label for="inputName" class="control-label">    كود المدينة     </label>
                            <input type="text"  class="form-control" name="city_code" id="city_code"  >
                        </div>
                     </div><br>
         
                  
                     <div class="row">

                        <div class="form-group">
                            <label for="exampleInputEmail1" class="control-label">الفرع </label>
                            <select class='form-control' name='branche_name' id="branche_name" >
                                <!--placeholder-->
                                @foreach ($Branch as $Branch)

                                <option > {{$Branch->branche_name}}</option>
                                @endforeach
                                </select>
                        </div>

                        <div class="col">
                            <label for="inputName" class="control-label">   ملاحظات الطرد     </label>
                            <input type="text"  class="form-control" name="package_notes" id="package_notes"  >
                        </div>
                    </div><br>


                                <div class="col">
                                    <label for="inputName" class="control-label">  حالة الطرد </label>
                                    <select class='form-control' name='condition_cargo' >
                                        <option value="" selected>اختار من القائمة</option>
                                        <option value="تم التسليم ">تم التسليم</option>
                                        <option value="ارجاع مبيعات">ارجاع مبيعات</option>
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
     
   <!--تعديل -->
   <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">تفاصيل الشحنة</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">

               <form action="Shipment.show" method="post" autocomplete="off">
                   {{ method_field('patch') }}
                   {{ csrf_field() }}

                   <div class="row">
                
               <div class="col">
                <input type="hidden" name="id" id="id" value="">
                    <label for="inputName" class="control-label">  كود العميل  </label>
                    <input type="text"  class="form-control" name="customer_code" id="customer_code" readonly  >
                </div>

                <div class="col">
                    <label for="inputName" class="control-label">  كود الطرد  </label>
                    <input type="text"  class="form-control" name="cargo_code" id="cargo_code" readonly >
                </div>
            </div><br>
       
               
              <div class="row">
                <div class="col">
                    <label for="inputName" class="control-label">  يسمح بفتحه/لا   </label>
                    <input type="text"  class="form-control" name="openable" id="openable" readonly >
                </div>

                
                <div class="col">
                    <label for="inputName" class="control-label">   عدد الطرود   </label>
                    <input type="text" class="form-control" name="count_cargo" id="count_cargo" readonly >
                </div>
            </div><br>
   
            <div class="row">
                <div class="col">
                    <label for="inputName" class="control-label">   رصيد البضائع    </label>
                    <input type="text"  class="form-control" name="balance_cargo" id="balance_cargo" readonly >
                </div>

                
                <div class="col">
                    <label for="inputName" class="control-label">   رصيد العمولة     </label>
                    <input type="text"  class="form-control" name="balance_commossion" id="balance_commossion" readonly >
                </div>
            </div><br>

            <div class="row">
                <div class="col">
                    <label for="inputName" class="control-label">   رصيد الطلب     </label>
                    <input type="text"  class="form-control" name="balance_order" id="balance_order" readonly >
                </div>

                <div class="col">
                    <label for="inputName" class="control-label">   ملاحظات الطرد     </label>
                    <input type="text"  class="form-control" name="package_notes" id="package_notes" readonly >
                </div>
            </div><br>

            <div class="row">
                <div class="col">
                    <label for="inputName" class="control-label">    المدينة     </label>
                    <input type="text"  class="form-control" name="city" id="city"  readonly>
                </div>

                <div class="col">
                    <label for="inputName" class="control-label">    المنطقة     </label>
                    <input type="text"  class="form-control" name="part" id="part"  readonly>
                </div>
            </div><br>

            <div class="row">
                <div class="col">
                    <label for="inputName" class="control-label">    كود المدينة     </label>
                    <input type="text"  class="form-control" name="city_code" id="city_code" readonly >
                </div>

            </div><br>

                      </div>
                                <div class="modal-footer">
                                 <button type="button" class="btn btn-primary" data-dismiss="modal">اغلاق</button>
                                </div>
           </form>
       </div>
   </div>
</div>
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

<!--update -->
<script>
    $('#exampleModal3').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var condition_cargo = button.data('condition_cargo')
        var customer_code = button.data('customer_code')
        var cargo_code = button.data('cargo_code')
        var openable = button.data('openable')
        var count_cargo = button.data('count_cargo')
        var balance_cargo = button.data('balance_cargo')
        var balance_commossion = button.data('balance_commossion')
        var balance_order = button.data('balance_order')
        var package_notes = button.data('package_notes')
        var city = button.data('city')
        var part = button.data('part')
        var city_code = button.data('city_code')

        var customer_name = button.data('customer_name')
        var sender_name = button.data('sender_name')
        var sender_num = button.data('sender_num')
        var represent_name = button.data('represent_name')
        var represent_num = button.data('represent_num')
        var branche_name = button.data('branche_name')

        

        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #condition_cargo').val(condition_cargo);
        modal.find('.modal-body #customer_code').val(customer_code);
        modal.find('.modal-body #cargo_code').val(cargo_code);
        modal.find('.modal-body #openable').val(openable);
        modal.find('.modal-body #count_cargo').val(count_cargo);
        modal.find('.modal-body #balance_cargo').val(balance_cargo);
        modal.find('.modal-body #balance_commossion').val(balance_commossion);
        modal.find('.modal-body #balance_order').val(balance_order);
        modal.find('.modal-body #package_notes').val(package_notes);
        modal.find('.modal-body #city').val(city);
        modal.find('.modal-body #city_code').val(city_code);
        modal.find('.modal-body #part').val(part);

        modal.find('.modal-body #customer_name').val(customer_name);
        modal.find('.modal-body #sender_name').val(sender_name);
        modal.find('.modal-body #sender_num').val(sender_num);
        modal.find('.modal-body #represent_name').val(represent_name);
        modal.find('.modal-body #represent_num').val(represent_num);
        modal.find('.modal-body #branche_name').val(branche_name);

      
    })

</script>



<script>
    $('#exampleModal4').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var customer_code = button.data('customer_code')
        var cargo_code = button.data('cargo_code')
        var openable = button.data('openable')
        var count_cargo = button.data('count_cargo')
        var balance_cargo = button.data('balance_cargo')
        var balance_commossion = button.data('balance_commossion')
        var balance_order = button.data('balance_order')
        var package_notes = button.data('package_notes')
        var city = button.data('city')
        var part = button.data('part')
        var city_code = button.data('city_code')



        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #customer_code').val(customer_code);
        modal.find('.modal-body #cargo_code').val(cargo_code);
        modal.find('.modal-body #openable').val(openable);
        modal.find('.modal-body #count_cargo').val(count_cargo);
        modal.find('.modal-body #balance_cargo').val(balance_cargo);
        modal.find('.modal-body #balance_commossion').val(balance_commossion);
        modal.find('.modal-body #balance_order').val(balance_order);
        modal.find('.modal-body #package_notes').val(package_notes);
        modal.find('.modal-body #city').val(city);
        modal.find('.modal-body #city_code').val(city_code);

        modal.find('.modal-body #part').val(part);


      
    })

</script>

@endsection