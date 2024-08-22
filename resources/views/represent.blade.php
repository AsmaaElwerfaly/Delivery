@extends('layouts.master')
@section('title')
المندوبين 
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
                            <h4 class="content-title mb-0 my-auto"> المندوبين </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">
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
                                <a class="modal-effect btn btn-outline-primary " data-effect="effect-scale" data-toggle="modal" href="#modaldemo8"> إضافة مندوب +</a>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1">
										<thead>
                                            <tr>
                                                <th >ت</th>
                                                <th >المندوب </th>
                                                <th >الكود </th>
                                                <th >الفرع</th>
                                                <th >كلمة السر </th>
                                                <th >العمليات</th>

                                            </tr>
                						</thead>
										<tbody>
                                            
											<tr>
                                                <?php $i =0?>
                                                @foreach($Represent as $x)
                                                <?php $i++?>
                                           
                                                <td>{{$i}}</td>
                                                <td>{{$x->name_represent}}</td>
                                                <td>{{$x->code}}</td>
                                                <td>{{ $x->branches->branche_name}}</td>
                                                <td>{{$x->password}}</td>

                                            <td>

                                               
                                                
                                                    <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                        data-id="{{ $x->id }}" data-name_represent="{{ $x->name_represent }}" data-code="{{ $x->code }}"
                                                         data-branche_name="{{$x->branches->branche_name}}" data-password="{{ $x->password }}" 
                                                         data-toggle="modal"
                                                        href="#exampleModal2" title="تعديل"><i class="las la-pen"></i></a>
                                              
                                              
                                                    <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                        data-id="{{ $x->id }}" data-name_represent="{{ $x->name_represent }}"
                                                        data-toggle="modal" href="#modaldemo9" title="حذف"><i
                                                            class="las la-trash"></i></a>
                                              
                                            </td>
                                        </tr>
                                        @endforeach
        
        
										</tbody>
                                    </table>

                                    </div>
                                  
                                    
                                </div>
                        </div>
                                    <!-- bd -->
                                   
                                    <div class="modal" id="modaldemo8">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content modal-content-demo">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">اضافة مندوب</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                        type="button"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('represent.store')}}" enctype="multipart/form-data" method="post" autocomplete="off">
                                                        {{ csrf_field() }}
                                
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">المندوب  </label>
                                                            <input type="hidden" class="form-control" id="id" name="id">

                                                            <input type="text" class="form-control" id="name_represent" name="name_represent">
                                                        </div>


                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">الفرع </label>
                                                            <select class='form-control' name='branche_id'>
                                                                <option value="" selected disabled>حدد الفرع</option>

                                                                @foreach ($Branch as $Branchs)
                                                                    <option value="{{ $Branchs->id }}"> {{ $Branchs->branche_name }}</option>
                                                                @endforeach
                                                                </select>
                                                        </div>
                                                        
                                                    

                                                        

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">الكود </label>
                                                            <input type="text" class="form-control" id="code" name="code">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">كلمة السر  </label>
                                                            <input type="text" class="form-control" id="password" name="password">
                                                        </div>

                                                       



                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">تاكيد</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    
                                    </div>
                                   
<!--report donation-->
   



    </div>

    </div>





                                <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">تعديل </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                               
                                                <form action="represent2/update" method="post" enctype="multipart/form-data" autocomplete="off">
                                                    @csrf
                                                    @method('patch')
                                                   
                                                    <div class="form-group">
                                                        <input type="hidden" name="id" id="id" value="">
                                                        <label for="recipient-name" class="col-form-label"> المندوب</label>
                                                        <input class="form-control" name="name_represent" id="name_represent" type="text">
                                                    </div>
                                                   

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1" class="control-label">الفرع </label>
                                                        <select class='form-control' name='branche_name' id="branche_name" >
                                                            <!--placeholder-->
                                                            @foreach ($Branch as $Branchs)

                                                            <option > {{$Branchs->branche_name}}</option>
                                                            @endforeach
                                                            </select>
                                                    </div>

                                                   
                                                   <div class="form-group">
                                                       
                                                        <label for="recipient-name" class="col-form-label"> الكود</label>
                                                        <input class="form-control" name="code" id="code" type="text">
                                                    </div>

                                                    
                                                    <div class="form-group">
                                                       
                                                        <label for="recipient-name" class="col-form-label"> كلمة السر</label>
                                                        <input class="form-control" name="password" id="password" type="text">
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
                            
                                
                            </div>
                                                  
                      </div>
                                           
             <!-- row closed -->
                 </div>
                                      
              </div>
                                    
         </div>
                 </div>                       
             </div>
         </div>
       
            <div class="modal" id="modaldemo9">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h6 class="modal-title">حذف </h6><button aria-label="Close" class="close" data-dismiss="modal"
                                type="button"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <form action="represent2/destroy" method="post">
                            {{ method_field('delete') }}
                            {{ csrf_field() }}
                            <div class="modal-body">
                                <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                <input type="hidden" name="id" id="id" value="">
                                <input class="form-control" name="name_represent" id="name_represent" type="text" readonly>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                                <button type="submit" class="btn btn-danger">تاكيد</button>
                            </div>
                    </div>
                    </form>
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
        var name_represent = button.data('name_represent')
        var branche_name = button.data('branche_name')
        var code = button.data('code')
        var password = button.data('password')

        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #name_represent').val(name_represent);
        modal.find('.modal-body #branche_name').val(branche_name);
        modal.find('.modal-body #code').val(code);
        modal.find('.modal-body #password').val(password);

    })

</script>



<script>
    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var name_represent = button.data('name_represent')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #name_represent').val(name_represent);
    })

</script>


@endsection