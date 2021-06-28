<!--begin::Advance Table Widget 4-->
<div class="card card-custom {{ @$class }}">
	<!--begin::Header-->
	<div class="card-header border-0 py-5">
		<h3 class="card-title align-items-start flex-column">
			<span class="card-label font-weight-bolder text-dark">Statistik Menu</span>
			<span class="text-muted mt-3 font-weight-bold font-size-sm">Menu terlaris pada bulan ini</span>
		</h3>
		<div class="card-toolbar">
			<a href="#" class="btn btn-info font-weight-bolder font-size-sm mr-3">Export Excel</a>
		</div>
	</div>
	<!--end::Header-->
	<!--begin::Body-->
	<div class="card-body pt-0 pb-3">
		<div class="tab-content">
			<!--begin::Table-->
			<div class="table-responsive">
				<table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
					<thead>
						<tr class="text-left text-uppercase">
							<th style="min-width: 250px" class="pl-7">
								<span class="text-dark-75">Menu</span>
							</th>
							<th style="min-width: 100px">Pendapatan</th>
							<th style="min-width: 100px">Pemesanan</th>
						</tr>
					</thead>
					<tbody>
						@foreach($menu_order as $key => $item)
						<tr>
							<td class="pl-0 py-8">
								<div class="d-flex align-items-center">
									<div class="symbol symbol-50 symbol-light mr-4">
										<span class="symbol-label bg-light-warning rounded">
											{{ Metronic::getSVG("media/svg/icons/Media/Equalizer.svg", "svg-icon-3x svg-icon-warning d-block my-2") }}
										</span>
									</div>
									<div>
										<a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{ $item->menu->name }}</a>
										<span class="text-muted font-weight-bold d-block">{{ ucfirst($item->menu->type) }}</span>
									</div>
								</div>
							</td>
							<td>
								<span class="text-dark-75 font-weight-bolder d-block font-size-lg">IDR {{ number_format($item->incomeOfMenu) }}</span>
								<span class="text-muted font-weight-bold">Pendapatan</span>
							</td>
							<td>
								<span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $item->orderCount }}X</span>
								<span class="text-muted font-weight-bold">Pemesanan</span>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<!--end::Table-->
		</div>
	</div>
	<!--end::Body-->
</div>
<!--end::Advance Table Widget 4-->