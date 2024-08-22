@extends('layouts.master')
@section('title')
الفروع 
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
                            <h4 class="content-title mb-0 my-auto"> الفروع </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">
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
                                <a class="modal-effect btn btn-outline-primary " data-effect="effect-scale" data-toggle="modal" href="#modaldemo8"> إضافة فرع +</a>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1">
										<thead>
                                            <tr>
                                                <th >ت</th>
                                                <th >الفرع </th>
                                                <th >الكود </th>
                                                <th >كلمة السر </th>
                                                <th >العمليات</th>

                                            </tr>
                						</thead>
										<tbody>
                                            
											<tr>
                                                <?php $i =0?>
                                                @foreach($Branch as $x)
                                                <?php $i++?>
                                           
                                                <td>{{$i}}</td>
                                                <td>{{$x->branche_name}}</td>
                                                <td>{{$x->code}}</td>
                                                <td>{{$x->password}}</td>

                                            <td>
                                             
                                                    <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                        data-id="{{ $x->id }}" data-branche_name="{{ $x->branche_name }}"
                                                        data-code="{{ $x->code }}"
                                                        data-password="{{ $x->password }}"
                                                        data-toggle="modal"
                                                        href="#exampleModal2" title="تعديل"><i class="las la-pen"></i></a>
                                              
                                              
                                                    <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                        data-id="{{ $x->id }}" data-branche_name="{{ $x->branche_name }}"
                                                        data-toggle="modal" href="#modaldemo9" title="حذف"><i
                                                            class="las la-trash"></i></a>
                                              
                                            </td>
                                        </tr>
                                        @endforeach
        
        
										</tbody>
                                    </table>
                                    </div>

                                </div>
                                    <!-- bd -->

                                    <div class="modal" id="modaldemo8">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content modal-content-demo">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">اضافة فرع</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                        type="button"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('Branch.store')}}" method="post" autocomplete="off">
                                                        {{ csrf_field() }}
                                
                                                        <div class="form-group">
                                                            <label for="exampleInput">الفرع </label>
                                                            <input type="text" class="form-control" id="branche_name" name="branche_name">
                                                        </div>
                                                       
                                                        <div class="form-group">
                                                            <label for="exampleInput">الكود </label>
                                                            <input type="text" class="form-control" id="code" name="code">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInput">كلمة السر </label>
                                                            <input type="password" class="form-control" id="password" name="password">
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
                                    


                                 <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">تعديل الفرع</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                            
                                                <form action="Branch/update" method="post" autocomplete="off">
                                                    {{ method_field('patch') }}
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <input type="hidden" name="id" id="id" value="">
                                                        <label for="recipient-name" class="col-form-label"> الفرع:</label>
                                                        <input class="form-control" name="branche_name" id="branche_name" type="text">
                                                    </div>
                                                   
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label"> الايميل:</label>
                                                        <input class="form-control" name="email" id="email" type="email">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label"> الكود:</label>
                                                        <input class="form-control" name="code" id="code" type="text">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label"> كلمة السر:</label>
                                                        <input class="form-control" name="password" id="password" type="password">
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
                            
                                
                            </div><!-- bd -->
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
                <form action="Branch/destroy" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="id" id="id" value="">
                        <input class="form-control" name="branche_name" id="branche_name" type="text" readonly>
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
        var branche_name = button.data('branche_name')
        var email = button.data('email')
        var code = button.data('code')
        var password = button.data('password')

        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #branche_name').val(branche_name);
        modal.find('.modal-body #email').val(email);
        modal.find('.modal-body #code').val(code);
        modal.find('.modal-body #password').val(password);

    })

</script>

<script>
    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var branche_name = button.data('branche_name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #branche_name').val(branche_name);
    })

</script>



@endsection