{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-custom gutter-b example example-compact">
                    <div class="card-header">
                        <h3 class="card-title">New Order Record</h3>
                    </div>
                    <form action="{{ isset($order) ? route('order.updating', $order->id) : route('order.saving') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group mb-8">
                                <div class="alert alert-custom alert-default" role="alert">
                                    <div class="alert-icon">
                                        <span class="svg-icon svg-icon-primary svg-icon-xl">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3" />
                                                    <path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="alert-text">Enter interesting menu data for customers to see, unique menu names can improve the presentation of customer orders.
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Table Number<span class="text-danger">*</span></label>
                                <input type="number" name="table_number" id="table_number" class="form-control" value="{{ isset($order) ? $order->table_number : '' }}" {{ isset($order) ? 'disabled' : '' }} placeholder="Enter name of menu" />
                                <span class="form-text text-muted">Enter table number for your customer's.</span>
                            </div>
                            <div class="form-group">
                                <label>Customer Name<span class="text-danger">*</span></label>
                                <input type="text" name="customer_name" id="customer_name" class="form-control" value="{{ isset($order) ? $order->customer_name : '' }}" placeholder="Enter name of menu" />
                                <span class="form-text text-muted">Use a unique name to attract customer's attention.</span>
                            </div>
                            <div class="form-group row">                                
                                @foreach($menu as $key => $item)
                                <div class="col-md-6">
                                    <div class="card card-custom card-stretch gutter-b">
                                        <div class="card-header border-0">
                                            <h3 class="card-title font-weight-bolder text-dark">{{ $key }}</h3>
                                        </div>
                                        <div class="card-body pt-0">
                                            @foreach($item as $key => $menu)
                                            <div class="">
                                                <div class="d-flex align-items-center flex-grow-1">
                                                    <label class="checkbox checkbox-lg checkbox-lg flex-shrink-0 mr-4">
                                                        <input type="checkbox" class="menu_id" name="menu[{{ $menu->id }}][menu_id]" menu-id="{{ $menu->id }}"  value="{{ $menu->id }}" />
                                                        <span></span>
                                                    </label>
                                                    <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                                                        <div class="d-flex flex-column align-items-cente py-2 w-75">
                                                            <a href="#" class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">{{ $menu->name }} <span class="label label-warning label-pill label-inline mr-2">IDR {{ number_format($menu->price, 2) }}</span></a>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div style="display:none;" id="tc{{ $menu->id }}">
                                                                <div class="col-lg-12 col-md-9 col-sm-12">
                                                                    <input type="text" class="form-control menu_order" value="" menu-id="{{ $menu->id }}" menu-price="{{ $menu->price }}" name="menu[{{ $menu->id }}][order_amount]" placeholder="How many?"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            <div class="separator separator-dashed my-3"></div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label>Amount<span class="text-danger">*</span></label>
                                <input type="text" name="amount" disabled="" id="amount" class="form-control" value="{{ isset($order) ? $order->amount : '' }}" placeholder="Please select a menu" />
                                <span class="form-text text-muted">Automatically filled by system.</span>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button type="reset" class="btn btn-secondary">Cancel</button>
                            </div>
                        </form>
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
            $('.menu_id').click(function() {
                var menu_id = $(this).attr('menu-id');
                if($(this).is(':checked')){
                    $('#tc'+menu_id).show();
                }else{
                    $('#tc'+menu_id).hide();
                    
                }
            });
            $('#amount').on('blur', function() {
                const value = this.value.replace(/,/g, '');
                this.value = parseFloat(value).toLocaleString('en-US', {
                    style: 'decimal',
                    maximumFractionDigits: 2,
                    minimumFractionDigits: 2
                });
            });
        })
    </script>
    <script>


        "use strict";
        $(document).ready(function() {
        });
// Class definition
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
  // public functions
  init: function() {
     demos();
 }
};
}();

jQuery(document).ready(function() {
   KTKBootstrapTouchspin.init();
});


</script>
@endsection
