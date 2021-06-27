{{-- Extends layout --}}
@extends('layout.default')
@section('page_title', $data->customer_name)
@section('page_description')
{{-- <span class="label label-{{ !$data->transaction()->exists() ? 'danger' : 'success'}} label-inline font-weight-normal mr-2">{{ !$data->transaction()->exists() ? 'Pending Payment' : 'Payed'}}</span> --}}
@endsection
{{-- Content --}}
@section('content')
<div class="d-flex flex-column-fluid">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<div class="card card-custom gutter-b card-stretch">
					<div class="card-header card-header-tabs-line">
						<div class="card-toolbar">
							<ul class="nav nav-tabs nav-tabs-space-lg nav-tabs-line nav-tabs-bold nav-tabs-line-3x" role="tablist">
								<li class="nav-item mr-3">
									<a class="nav-link active" data-toggle="tab" href="#order-detail">
										<span class="nav-icon mr-2">
											<span class="svg-icon mr-3">
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<path d="M4.875,20.75 C4.63541667,20.75 4.39583333,20.6541667 4.20416667,20.4625 L2.2875,18.5458333 C1.90416667,18.1625 1.90416667,17.5875 2.2875,17.2041667 C2.67083333,16.8208333 3.29375,16.8208333 3.62916667,17.2041667 L4.875,18.45 L8.0375,15.2875 C8.42083333,14.9041667 8.99583333,14.9041667 9.37916667,15.2875 C9.7625,15.6708333 9.7625,16.2458333 9.37916667,16.6291667 L5.54583333,20.4625 C5.35416667,20.6541667 5.11458333,20.75 4.875,20.75 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
														<path d="M2,11.8650466 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.23590829,11 3.04485894,11.3127315 2,11.8650466 Z M6,7 C5.44771525,7 5,7.44771525 5,8 C5,8.55228475 5.44771525,9 6,9 L15,9 C15.5522847,9 16,8.55228475 16,8 C16,7.44771525 15.5522847,7 15,7 L6,7 Z" fill="#000000" />
													</g>
												</svg>
											</span>
										</span>
										<span class="nav-text font-weight-bold">Orders Details</span>
									</a>
								</li>
								<li class="nav-item mr-3">
									<a class="nav-link" data-toggle="tab" href="#payment">
										<span class="nav-icon mr-2">
											<span class="svg-icon mr-3">
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<path d="M13,18.9450712 L13,20 L14,20 C15.1045695,20 16,20.8954305 16,22 L8,22 C8,20.8954305 8.8954305,20 10,20 L11,20 L11,18.9448245 C9.02872877,18.7261967 7.20827378,17.866394 5.79372555,16.5182701 L4.73856106,17.6741866 C4.36621808,18.0820826 3.73370941,18.110904 3.32581341,17.7385611 C2.9179174,17.3662181 2.88909597,16.7337094 3.26143894,16.3258134 L5.04940685,14.367122 C5.46150313,13.9156769 6.17860937,13.9363085 6.56406875,14.4106998 C7.88623094,16.037907 9.86320756,17 12,17 C15.8659932,17 19,13.8659932 19,10 C19,7.73468744 17.9175842,5.65198725 16.1214335,4.34123851 C15.6753081,4.01567657 15.5775721,3.39010038 15.903134,2.94397499 C16.228696,2.49784959 16.8542722,2.4001136 17.3003976,2.72567554 C19.6071362,4.40902808 21,7.08906798 21,10 C21,14.6325537 17.4999505,18.4476269 13,18.9450712 Z" fill="#000000" fill-rule="nonzero" />
														<circle fill="#000000" opacity="0.3" cx="12" cy="10" r="6" />
													</g>
												</svg>
											</span>
										</span>
										<span class="nav-text font-weight-bold">Payment</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="card-body">
						<div class="tab-content pt-5">
							<div class="tab-pane active" id="order-detail" role="tabpanel" >
								<div class="d-flex flex-wrap">
									<div class="mr-12 d-flex flex-column mb-7">
										<span class="d-block font-weight-bold mb-4">Start Date</span>
										<span class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text">{{ $data->created_at->format('d M Y H:i') }}</span>
									</div>
									<div class="mr-12 d-flex flex-column mb-7">
										<span class="d-block font-weight-bold mb-4">Due Date</span>
										<span class="btn btn-light-danger btn-sm font-weight-bold btn-upper btn-text">{{ Carbon\Carbon::parse('last day of this month')->format('d M Y H:i') }}</span>
									</div>
									<div class="flex-row-fluid mb-7">
										<span class="d-block font-weight-bold mb-4">Progress</span>
										<div class="d-flex align-items-center pt-2">
											<div class="progress progress-xs mt-2 mb-2 w-100">
												<div class="progress-bar bg-warning" role="progressbar" id="menu-serve-bar" style="width: {{ $progress }}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
											<span class="ml-3 font-weight-bolder" id="menu-serve-complete">{{ $progress }}%</span>
										</div>
									</div>
								</div>
								<p class="mb-7 mt-3">
									I distinguish three main text objectives.First, your objective could be merely to inform people.A second be to persuade people.
								</p>
								<div class="d-flex flex-wrap">
									<div class="mr-12 d-flex flex-column mb-7">
										<span class="font-weight-bolder mb-4">Customer Name</span>
										<span class="font-weight-bolder font-size-h5 pt-1">
											<span class="font-weight-bold text-dark-50"></span>{{ $data->customer_name }}
											<span class="label label-{{ !$data->transaction()->exists() ? 'danger' : 'success'}} label-inline font-weight-normal mr-2">{{ !$data->transaction()->exists() ? 'Pending Payment' : 'Payed'}}</span>
										</span>
									</div>
									<div class="mr-12 d-flex flex-column mb-7">
										<span class="font-weight-bolder mb-4">Income</span>
										<span class="font-weight-bolder font-size-h5 pt-1">
											<span class="font-weight-bold text-dark-50">IDR </span>{{ number_format($data->list->sum('amount'), 2) }}
										</span>
									</div>
									<div class="mr-12 d-flex flex-column mb-7">
										<span class="font-weight-bolder mb-4">Amount Menu Order</span>
										<span class="font-weight-bolder font-size-h5 pt-1">
											{{ count($data->list) }} Orders
										</span>
									</div>
									<div class="mr-12 d-flex flex-column mb-7">
										<span class="font-weight-bolder mb-4">Being Coocked</span>
										<span class="font-weight-bolder font-size-h5 pt-1">
											{{ count($data->list->whereNull('serve_at')) }} Menu
										</span>
									</div>
									<div class="mr-12 d-flex flex-column mb-7">
										<span class="font-weight-bolder mb-4">Has been served</span>
										<span class="font-weight-bolder font-size-h5 pt-1">
											{{ count($data->list->whereNotNull('serve_at')) }} Orders
										</span>
									</div>
									<div class="mr-12 d-flex flex-column mb-7" style="display:none!important;">
										<button class="btn btn-primary font-weight-bolder">
											<span class="svg-icon svg-icon-md">
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<circle fill="#000000" cx="9" cy="15" r="6" />
														<path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
													</g>
												</svg>
											</span>
											Proccess Payment
										</button>
									</div>
								</div>
								<div class="d-flex flex-wrap row" id="menu-item">
									<div class="menu-col col-md-4" id="menu-order-list">
										<div class="card-header border-0">
											<h3 class="card-title text-dark">Order List</h3>
											@foreach($data->list->where('status', '0') as $key => $item)
											<div class="d-flex align-items-center mb-3">
												<span id="menu-span-{{ $item->id }}" class="bullet bullet-bar bg-{{ empty($item->serve_at) ? 'danger' : 'success' }} align-self-stretch"></span>
												<label id="menu-label-{{ $item->id }}" class="checkbox checkbox-lg checkbox-light-{{ empty($item->serve_at) ? 'danger' : 'success' }} checkbox-inline flex-shrink-0 m-0 mx-4">
													<input type="checkbox" class="menu_check" name="menu" id="menu-checkbox-{{ $item->id }}" {{ empty($item->serve_at) ? '' : 'checked' }} value="{{ $item->id }}" />
													<span></span>
												</label>
												<div class="d-flex flex-column flex-grow-1">
													<a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg mb-1">{{ $item->order_amount }}x | {{ $item->menu->name }}</a>
													<span class="text-muted font-weight-bold" id="menu_status{{ $item->id }}">{{ isset($item->serve_at) ? 'Serve at '.c($item->serve_at)->format('H:i').' WIB' : 'Being cooked' }}</span>
												</div>
											</div>
											@endforeach
										</div>
									</div>
									<div class="menu-col col-md-4" id="menu-order-addon">
										<div class="card-header border-0">
											<h3 class="card-title text-dark">Add on Menu</h3>
											@foreach($data->list->where('status', '1') as $key => $item)
											<div class="d-flex align-items-center mb-3">
												<span id="menu-span-{{ $item->id }}" class="bullet bullet-bar bg-{{ empty($item->serve_at) ? 'danger' : 'success' }} align-self-stretch"></span>

												<label id="menu-label-{{ $item->id }}" class="checkbox checkbox-lg checkbox-light-{{ empty($item->serve_at) ? 'danger' : 'success' }} checkbox-inline flex-shrink-0 m-0 mx-4">
													<input type="checkbox" class="menu_check" name="menu" id="menu-checkbox-{{ $item->id }}" {{ empty($item->serve_at) ? '' : 'checked' }} value="{{ $item->id }}" />
													<span></span>
												</label>

												<div class="d-flex flex-column flex-grow-1">
													<a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg mb-1">{{ $item->order_amount }}x | {{ $item->menu->name }}</a>
													<span class="text-muted font-weight-bold" id="menu_status{{ $item->id }}">{{ isset($item->serve_at) ? 'Serve at '.c($item->serve_at)->format('H:i').' WIB' : 'Being cooked' }}</span>
												</div>
											</div>
											@endforeach
										</div>
									</div>

									@if(!$data->transaction()->exists())
									<div class="menu-col col-md-4" id="menu-order-add">
										<form action="{{ route('order.menu.addon', $id) }}" method="POST">
											@csrf	
											<div class="card-header border">
												<h3 class="card-title text-dark">Add Menu</h3>
												@foreach($menuAll as $key => $item)
												<h6>{{ $key }}</h6>
												@foreach($item as $menu)
												<div class="d-flex align-items-center mb-3">
													<span id="menu-span-{{ $menu->id }}" class="bullet bullet-bar bg-warning align-self-stretch"></span>

													<label id="menu-label-{{ $menu->id }}" class="checkbox checkbox-lg checkbox-light-warning checkbox-inline flex-shrink-0 m-0 mx-4">
														<input type="checkbox" class="add_menu_check" name="menu[{{ $menu->id }}][menu_id]" value="{{ $menu->id }}" />
														<span></span>	
													</label>

													<div class="d-flex flex-wrap align-items-center justify-content-between w-100">
														<div class="d-flex flex-column flex-grow-1">
															<a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg mb-1">{{ $menu->name }}</a>
														</div>
														<div class="form-group row">
															<div style="display: none;" id="tc{{ $menu->id }}">
																<div class="col-lg-12 col-md-9 col-sm-12">
																	<input type="text" class="form-control menu_order" value="" menu-id="{{ $menu->id }}" menu-price="{{ $menu->price }}" name="menu[{{ $menu->id }}][order_amount]" placeholder="How many?"/>
																</div>
															</div>
														</div>
													</div>
												</div>
												@endforeach
												@endforeach
												<div class="separator separator-dashed my-3"></div>
												<button type="submit" class="btn btn-danger btn-sm text-uppercase font-weight-bolder ml-2">Save</button>
											</div>
										</form>
									</div>
									@endif
								</div>
							</div>
							<div class="tab-pane " id="payment" role="tabpanel">
								<form class="form" method="POST" action="{{ route('order.transaction', $id) }}">
									@csrf
									<div class="row">
										<div class="col-lg-9 col-xl-6 offset-xl-3">
											<div class="alert alert-custom alert-light-{{ !$data->transaction()->exists() ? 'danger' : 'success'}} fade show mb-9" role="alert">
												<div class="alert-icon">
													<i class="flaticon-warning"></i>
												</div>
												<div class="alert-text">{{ !$data->transaction()->exists() ? 'Make sure you checking before submit!' : 'Transaction record for this order has ben already!' }}</div>
												<div class="alert-close">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">
															<i class="ki ki-close"></i>
														</span>
													</button>
												</div>
											</div>
										</div>
									</div>

									@if(!$data->transaction()->exists())
									<div class="row">
										<div class="col-lg-9 col-xl-6 offset-xl-3">
											<h3 class="font-size-h6 mb-5">Payment Proccess:</h3>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right">Payment Method</label>
										<div class="col-lg-9 col-xl-6">
											<select class="form-control form-control-lg form-control-solid" id="payment-method" name="paymentMethod">
												<option value="cash">Cash</option>
											</select>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right">Amount</label>
										<div class="col-lg-9 col-xl-6">
											<div class="input-group input-group-lg">
												<div class="input-group-prepend">
													<span class="input-group-text">
														IDR
													</span>
												</div>
												<input type="text" class="form-control form-control-lg" id="amount" value="{{ number_format($data->list->sum('amount'), 2) }}" placeholder="0" disabled />
											</div>
											<span class="form-text text-muted">
												Input just number of money amount. no sapparate no comma no spacy
											</span>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right">Money Receive</label>
										<div class="col-lg-9 col-xl-6">
											<div class="input-group input-group-lg">
												<div class="input-group-prepend">
													<span class="input-group-text">
														IDR
													</span>
												</div>
												<input type="text" class="form-control form-control-lg" id="money-receive" name="moneyReceive" value="" placeholder="10000" />
											</div>
											<span class="form-text text-muted">
												Input just number of money amount. no sapparate no comma no spacy
											</span>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right">Money Changes</label>
										<div class="col-lg-9 col-xl-6">
											<div class="input-group input-group-lg">
												<div class="input-group-prepend">
													<span class="input-group-text">
														IDR
													</span>
												</div>
												<input type="text" class="form-control form-control-lg" id="money-changes" disabled="" value="" placeholder="10,000.00" />
											</div>
										</div>
									</div>
									<div class="form-group row" style="display:none;">
										<label class="col-xl-3 col-lg-3 col-form-label text-right">Name On Card</label>
										<div class="col-lg-9 col-xl-6">
											<input type="text" class="form-control form-control-lg" id="name-on-card" value="" placeholder="Bagas Aditya Mahendra" />
										</div>
									</div>
									<div class="form-group row" style="display:none;">
										<label class="col-xl-3 col-lg-3 col-form-label text-right">Card Refrence</label>
										<div class="col-lg-9 col-xl-6">
											<input type="number" class="form-control form-control-lg" id="card-refrence" value="" placeholder="5379 4190 3752 6696" />
										</div>
									</div>

									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right"></label>
										<div class="col-lg-9 col-xl-6">
											<button type="submit" class="btn btn-light-primary font-weight-bold btn-sm">Proccess Pament</button>
										</div>
									</div>
									@endif
								</div>
							</div>
						</div>
					</div>
				</div>

				@endsection

				@section('styles')

				@endsection

				@section('scripts')

				<script>
					$(document).ready(function() {
						toastr.options = {
							"closeButton": false,
							"debug": false,
							"newestOnTop": false,
							"progressBar": false,
							"positionClass": "toast-top-right",
							"preventDuplicates": false,
							"onclick": null,
							"showDuration": "300",
							"hideDuration": "1000",
							"timeOut": "5000",
							"extendedTimeOut": "1000",
							"showEasing": "swing",
							"hideEasing": "linear",
							"showMethod": "fadeIn",
							"hideMethod": "fadeOut"
						};

						function c_decode(number){
							return Number(number.replace(/[^0-9\.]+/g,""));
						}

						$('.menu_check').click(function(){
							if ($(this).is(':checked')) {
								var type = 'serve';
							}else {
								var type = 'cooked';
							}
							var id = $(this).val();
							$.ajax({
								type: "POST",
								url: "{{ route('order.update.menu.status') }}/"+type,
								data: {
									id: id,
								},
								success: function(data){
									console.log(data);
									if (data == 'transaction exist') {
										toastr.error("Transactio record already exist");
										$('#menu-checkbox-'+id).prop('checked', 0);
									}else{
										$('#menu_status'+data.id).text('Serve at '+data.time);
										if (type == 'serve') {
											$('#menu-span-' +data.id).attr('class', 'bullet bullet-bar bg-success align-self-stretch');
											$('#menu-label-'+data.id).attr('class', 'checkbox checkbox-lg checkbox-light-success checkbox-inline flex-shrink-0 m-0 mx-4');
											toastr.success("Menu successfully serve!");
										}else {
											$('#menu-span-' +data.id).attr('class', 'bullet bullet-bar bg-danger align-self-stretch');
											$('#menu-label-'+data.id).attr('class', 'checkbox checkbox-lg checkbox-light-danger checkbox-inline flex-shrink-0 m-0 mx-4');
											toastr.warning("Menu change to cooked!");
										}

										$('#menu-serve-bar').attr('style', 'width: '+data.progress+'%;');
										$('#menu-serve-complete').html(data.progress+'%');
									}

								},
								error: function(error){
									alert(error);
									console.log(error);
								}
							})
						});

						function formatRupiah(angka, prefix){
							var number_string = angka.toString().replace(/[^,\d]/g, '').toString(),
							split   		= number_string.split(','),
							sisa     		= split[0].length % 3,
							rupiah     		= split[0].substr(0, sisa),
							ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

							if(ribuan){
								separator = sisa ? ',' : '';
								rupiah += separator + ribuan.join(',');
							}

							rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
							return rupiah;
						}


						$('.add_menu_check').click(function() {
							var menu_id = $(this).val();

							if($(this).is(':checked')){
								$('#tc'+menu_id).show();
							}else{
								$('#tc'+menu_id).hide();

							}
						});


						$('#money-receive').blur(function() {
								// var Currencyamount = $('#amount').val();
								var amount = c_decode($('#amount').val());
								var moneyReceive = c_decode($(this).val());

								var idr = parseInt(moneyReceive) - parseInt(amount);

								// alert(idr);
								if (idr < 1) {
									$(this).val('');
									$('#money-changes').val('money is not enough');
								}else {
									$(this).val(formatRupiah(moneyReceive));
									$('#money-changes').val(formatRupiah(idr));
								}
							});

					});
				</script>

				<script>
					var KTSelect2 = function() {
						var demos = function() {

							$('select').select2({
								placeholder: "Select a state"
							});
						}
						return {
							init: function() {
								demos();
							}
						};

					}();
					var KTFormRepeater = function() {

						var demo1 = function() {
							$('#kt_repeater_1').repeater({
								isFirstItemUndeletable: false,
								initEmpty: false,
								defaultValues: {
									'text-input': 'foo'
								},

								show: function () {
									$(this).slideDown();
									KTSelect2.init();
								},

								hide: function (deleteElement) {
									$(this).slideUp(deleteElement);
								}
							});
						}

						return {
							init: function() {
								demo1();
							}
						};
					}();
					var KTKBootstrapTouchspin = function() {
						var subTotal = '{{ isset($order) ? $order->amount : '0' }}';


						var demos = function() {
							$('.menu_order').TouchSpin({
								buttondown_class: 'btn btn-secondary',
								buttonup_class: 'btn btn-secondary',

								min: 0,
								max: 100,
								step: 1,
								boostat: 1,
								maxboostedstep: 1,
							}).on('touchspin.on.startupspin', function () {
								subTotal = parseInt(subTotal) + parseInt($(this).attr('menu-price'));
								$('#amount').val(subTotal);
							}).on('touchspin.on.startdownspin', function () {
								subTotal = parseInt(subTotal) - parseInt($(this).attr('menu-price'));
								$('#amount').val(subTotal);
							});
						}

						return {
							init: function() {
								demos();
							}
						};
					}();

					jQuery(document).ready(function() {
						KTFormRepeater.init();
						KTSelect2.init();
						KTKBootstrapTouchspin.init();
					});
				</script>
				@endsection
