@extends('layouts.master')
@section('title')
						
إضافة شحنة جديدة
					@stop
					
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">  إضافة شحنة جديدة
                            </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
						</div>
					</div>
				
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
					
					
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

					
						<!-- row -->
						<div class="row">
					
							<div class="col-lg-12 col-md-12">
								<div class="card">
									<div class="card-body">
										<form action="{{route('Shipment.store')}}" method="post" enctype="multipart/form-data"
											autocomplete="off">
											{{ csrf_field() }}
											{{-- 1 --}}
					
											<div class="row">
												

												<div class="col">
													<label for="inputName" class="control-label">    كود العميل </label>
													<input type="text" class="form-control" id="inputName" name="customer_code" autocomplete="off"
														 >
												</div>

                                                <div class="col">
													<label for="inputName" class="control-label">    اسم العميل </label>
													<input type="text" class="form-control" id="inputName" name="customer_name" autocomplete="off"
														 >
												</div>

                                                <div class="col">
													<label for="inputName" class="control-label">    اسم المرسل </label>
													<input type="text" class="form-control" id="inputName" name="sender_name" autocomplete="off"
														 >
												</div>
                                                <div class="col">
													<label for="inputName" class="control-label">    رقم المرسل </label>
													<input type="text" class="form-control" id="inputName" name="sender_num" autocomplete="off"
														 >
												</div>

                                            
					
											</div><br><br>
					
											{{-- 2 --}}
											<div class="row">

                                                <div class="col">
													<label for="inputName" class="control-label">    اسم المستلم </label>
													<input type="text" class="form-control" id="inputName" name="represent_name" autocomplete="off"
														 >
												</div>

                                                <div class="col">
													<label for="inputName" class="control-label">     رقم المستلم </label>
													<input type="text" class="form-control" id="inputName" name="represent_num" autocomplete="off"
														 >
												</div>

                                                <div class="col">
													
													<label for="inputName" class="control-label">الفرع</label>
													<select class='form-control' name='branche_id' >
														<!--placeholder-->
													
														<option value="" selected disabled>حدد الفرع</option>
														@foreach ($Branch as $Branchs)
															<option value="{{ $Branchs->id }}"> {{ $Branchs->branche_name }}</option>
														@endforeach
														</select>
												</div>
                                                <div class="col">
													<label for="inputName" class="control-label">     كود الطرد  </label>
													<input type="text" class="form-control" id="inputName" name="cargo_code" autocomplete="off" >
												</div>                                               


                                             
											</div><br><br>
												<div class="row">
													
                                                    
												<div class="col">
													<label for="inputName" class="control-label">  يسمح بفتحه نعم/لا  </label>
													<select class='form-control' name='openable' >
														<option value="" selected>اختار من القائمة</option>
														<option value="نعم">نعم</option>
														<option value="لا">لا</option>
													</select>
												</div>
                                                <div class="col">
													<label for="inputName" class="control-label">     حالة الطرد  </label>
													<input type="text" class="form-control" id="inputName" name="condition_cargo" autocomplete="off"
														 >
												</div>
                                                
                                                    <div class="col">
                                                        <label for="inputName" class="control-label">    عدد الطرود  </label>
                                                        <input type="text" class="form-control" id="inputName" name="count_cargo" autocomplete="off"
                                                             >
                                                    </div>

                                                    <div class="col">
                                                        <label for="inputName" class="control-label">     رصيد البضائع  </label>
                                                        <input type="text" class="form-control" id="inputName" name="balance_cargo" autocomplete="off"
                                                             >
                                                    </div>


																			
												</div>
												
											<br><br>
                                            <div class="row">
                                                <div class="col">
													<label for="inputName" class="control-label">    رصيد العموله  </label>
													<input type="text" class="form-control" id="inputName" name="balance_commossion" autocomplete="off"
													 >
												</div>		
												
												<div class="col">
													<label for="inputName" class="control-label">    رصيد الطلب  </label>
													<input type="text" class="form-control" id="inputName" name="balance_order" autocomplete="off"
													 >
												</div>			

                                                <div class="col">
													<label for="inputName" class="control-label">    المدينة   </label>
													<input type="text" class="form-control" id="inputName" name="city" autocomplete="off"
													 >
												</div>

												
                                                <div class="col">
													<label for="inputName" class="control-label">    المنطقة   </label>
													<input type="text" class="form-control" id="inputName" name="part" autocomplete="off"
													 >
												</div>
											
                                                <div class="col">
													<label for="inputName" class="control-label">    كود المدينة   </label>
													<input type="text" class="form-control" id="inputName" name="city_code" autocomplete="off"
													 >
												</div></div><br><br>
									
												<div class="col">
													
													<label for="exampleTextarea">ملاحظات الطرد </label>
													<textarea class="form-control" id="exampleTextarea" name="package_notes" rows="3"></textarea>
												</div>
										<br>
									
											
											<br><br><br>
																
											<div class="d-flex justify-content-center">
												<button type="submit" class="btn btn-primary">حفظ البيانات</button>
											</div>
											<br><br>
										</div>
											
					
										</form>
									</div>
								</div>
							</div>
						</div>
					
						</div>
					
						<!-- row closed -->
						</div>
						<!-- Container closed -->
						</div>
						<!-- main-content closed -->
					@endsection
					@section('js')
						<!-- Internal Select2 js-->
						<script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
						<!--Internal Fileuploads js-->
						<script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
						<script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
						<!--Internal Fancy uploader js-->
						<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
						<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
						<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
						<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
						<script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
						<!--Internal  Form-elements js-->
						<script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
						<script src="{{ URL::asset('assets/js/select2.js') }}"></script>
						<!--Internal Sumoselect js-->
						<script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
						<!--Internal  Datepicker js -->
						<!--Internal  jquery.maskedinput js -->
						<script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
						<!--Internal  spectrum-colorpicker js -->
						<script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
						<!-- Internal form-elements js -->
						<script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>
					
						
						
					
					
					
					@endsection
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection