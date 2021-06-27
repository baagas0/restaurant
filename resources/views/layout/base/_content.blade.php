{{-- Content --}}
@if(session()->has('msg'))
<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="container">
            <div class="alert alert-custom alert-{{ session()->get('color') }}" role="alert">
                <div class="alert-icon"><i class="flaticon-{{ session()->get('color') == 'success' ? 'flaticon2-check-mark' : 'warning' }}"></i></div>
                <div class="alert-text">{{ session()->get('msg') }}!</div>
            </div>
        </div>
    </div>
</div>
@endif
@if (config('layout.content.extended'))
    @yield('content')
@else
    <div class="d-flex flex-column-fluid">
        <div class="{{ Metronic::printClasses('content-container', false) }}">
            @yield('content')
        </div>
    </div>
@endif
