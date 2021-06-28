@php
	$direction = config('layout.extras.user.offcanvas.direction', 'right');
@endphp
 {{-- User Panel --}}
<div id="kt_quick_user" class="offcanvas offcanvas-{{ $direction }} p-10">
	{{-- Header --}}
	<div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
		<h3 class="font-weight-bold m-0">
			User Profile
			{{-- <small class="text-muted font-size-sm ml-2">12 messages</small> --}}
		</h3>
		<a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
			<i class="ki ki-close icon-xs text-muted"></i>
		</a>
	</div>

	{{-- Content --}}
    <div class="offcanvas-content pr-5 mr-n5">
		{{-- Header --}}
        <div class="d-flex align-items-center mt-5">
            <div class="symbol symbol-100 mr-5">
                <div class="symbol-label" style="background-image:url('{{ asset('media/svg/humans/custom-14.svg') }}')"></div>
				<i class="symbol-badge bg-success"></i>
            </div>
            <div class="d-flex flex-column">
                <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">
					{{ auth()->user()->name }}
				</a>
                <div class="text-muted mt-1">
                    Manager Cafe
                </div>
                <div class="navi mt-2">
                    <a href="#" class="navi-item">
                        <span class="navi-link p-0 pb-2">
                            <span class="navi-icon mr-1">
								{{ Metronic::getSVG("media/svg/icons/Communication/Mail-notification.svg", "svg-icon-lg svg-icon-primary") }}
							</span>
                            <span class="navi-text text-muted text-hover-primary">jm@softplus.com</span>
                        </span>
                    </a>
                </div>
            </div>
        </div>

		{{-- Separator --}}
		<div class="separator separator-dashed mt-8 mb-5"></div>

		{{-- Nav --}}
		<div class="navi navi-spacer-x-0 p-0">
		    {{-- Item --}}
		    <a href="{{ route('report') }}" class="navi-item">
		        <div class="navi-link">
		            <div class="symbol symbol-40 bg-light mr-3">
		                <div class="symbol-label">
							{{ Metronic::getSVG("media/svg/icons/General/Notification2.svg", "svg-icon-md svg-icon-success") }}
						</div>
		            </div>
		            <div class="navi-text">
		                <div class="font-weight-bold">
		                    Profile Saya
		                </div>
		                <div class="text-muted">
		                    Pengaturan akun
		                    <span class="label label-light-danger label-inline font-weight-bold">update</span>
		                </div>
		            </div>
		        </div>
		    </a>

		    {{-- Item --}}
		    <a href="{{ route('report') }}"  class="navi-item">
		        <div class="navi-link">
					<div class="symbol symbol-40 bg-light mr-3">
						<div class="symbol-label">
 						   {{ Metronic::getSVG("media/svg/icons/Shopping/Chart-bar1.svg", "svg-icon-md svg-icon-warning") }}
 					   </div>
				   	</div>
		            <div class="navi-text">
		                <div class="font-weight-bold">
		                    Statistik Cafe
		                </div>
		                <div class="text-muted">
		                    Menampilkan statistik dan laporan cafe
		                </div>
		            </div>
		        </div>
		    </a>

		    {{-- Item --}}
		    <a href="{{ route('report') }}"  class="navi-item">
		        <div class="navi-link">
					<div class="symbol symbol-40 bg-light mr-3">
						<div class="symbol-label">
							{{ Metronic::getSVG("media/svg/icons/Files/Selected-file.svg", "svg-icon-md svg-icon-danger") }}
						</div>
				   	</div>
		            <div class="navi-text">
		                <div class="font-weight-bold">
		                    Log aktifitas
		                </div>
		                <div class="text-muted">
		                    Menampilkan riwayat log
		                </div>
		            </div>
		        </div>
		    </a>

		    {{-- Item --}}
		    <form method="POST" action="{{ route('logout') }}">
		    	@csrf
		    	<a href="{{ route('logout') }}"
		    	onclick="event.preventDefault();
		    	this.closest('form').submit();" style="width: 100%;" class="btn bg-light-danger btn-text-dark-50 btn-icon-primary font-weight-bold btn-hover-bg-light">
		    	<i class="flaticon2-pie-chart"></i> Logout
		    </a>
		</form>
		    <a href="#" class="navi-item">
		        {{-- <div class="navi-link">
					<div class="symbol symbol-40 bg-light mr-3">
						<div class="symbol-label">
							{{ Metronic::getSVG("media/svg/icons/Communication/Mail-opened.svg", "svg-icon-md svg-icon-primary") }}
						</div>
				   	</div>
		            <div class="navi-text">
		                <div class="font-weight-bold">
		                    My Tasks
		                </div>
		                <div class="text-muted">
		                    latest tasks and projects
		                </div>
		            </div>
		        </div> --}}
		    </a>
		</div>

		{{-- Separator --}}
		<div class="separator separator-dashed my-7"></div>

		{{-- Notifications --}}
		<div>
			{{-- Heading --}}
        	<h5 class="mb-5">
            	Notifikasi
        	</h5>

			{{-- Item --}}
	        <div class="d-flex align-items-center bg-light-warning rounded p-5 gutter-b">
	            <span class="svg-icon svg-icon-warning mr-5">
	                {{ Metronic::getSVG("media/svg/icons/Home/Library.svg", "svg-icon-lg") }}
	            </span>

	            <div class="d-flex flex-column flex-grow-1 mr-2">
	                <a href="#" class="font-weight-normal text-dark-75 text-hover-primary font-size-lg mb-1">Pendapatan</a>
	                <span class="text-muted font-size-sm">Hari ini</span>
	            </div>

	            <span class="font-weight-bolder text-warning py-1 font-size-lg">IDR {{ number_format(2560000) }}</span>
	        </div>

	        {{-- Item --}}
	        <div class="d-flex align-items-center bg-light-success rounded p-5 gutter-b">
	            <span class="svg-icon svg-icon-success mr-5">
	                {{ Metronic::getSVG("media/svg/icons/Home/Library.svg", "svg-icon-lg") }}
	            </span>
	            <div class="d-flex flex-column flex-grow-1 mr-2">
	                <a href="#" class="font-weight-normal text-dark-75 text-hover-primary font-size-lg mb-1">Pendapatan</a>
	                <span class="text-muted font-size-sm">Kemarin</span>
	            </div>

	            <span class="font-weight-bolder text-success py-1 font-size-lg">IDR {{ number_format(3750000) }}</span>
	        </div>

	        {{-- Item --}}
	        <div class="d-flex align-items-center bg-light-danger rounded p-5 gutter-b">
	            <span class="svg-icon svg-icon-danger mr-5">
	                {{ Metronic::getSVG("media/svg/icons/Home/Library.svg", "svg-icon-lg") }}
	            </span>
	            <div class="d-flex flex-column flex-grow-1 mr-2">
	                <a href="#" class="font-weight-normel text-dark-75 text-hover-primary font-size-lg mb-1">Pendapatan</a>
	                <span class="text-muted font-size-sm">2 Hari yang lalu</span>
	            </div>

	            <span class="font-weight-bolder text-danger py-1 font-size-lg">IDR {{ number_format(2350000) }}</span>
	        </div>
		</div>
    </div>
</div>
