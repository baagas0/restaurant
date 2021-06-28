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
                        <h3 class="card-title">New Restaurant Menu</h3>
                    </div>
                    <form action="{{ route('menu.saving') }}" method="POST">
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
                                    <div class="alert-text">Enter interesting menu data for customers to see, unique menu names can improve the presentation of customer orders.</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Name<span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ isset($menu) ? $menu->name : '' }}" placeholder="Enter name of menu" />
                                <span class="form-text text-muted">Use a unique name to attract customer's attention.</span>
                            </div>
                            <div class="form-group">
                                <label>Price<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">IDR</span>
                                    </div>
                                    <input type="text" name="price" id="price" class="form-control" value="{{ isset($menu) ? number_format($menu->price, 2) : '' }}" placeholder="Enter in IDR format" />
                                </div>
                                <span class="form-text text-muted">Make sure you give a best price for yout curstomer's.</span>
                            </div>
                            <div class="form-group">
                                <label>PPN<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" name="ppn" id="ppn" class="form-control" value="{{ isset($menu) ? $menu->ppn : '' }}" placeholder="Enter in percent format" />
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" type="button">&nbsp;%&nbsp;&nbsp;</button>
                                    </div>
                                </div>
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">IDR</span>
                                    </div>
                                    <input type="text" name="ppnIdr" id="ppnIdr" class="form-control" value="{{ isset($menu) ? number_format($menu->idr_percent, 2) : '' }}" disabled="" placeholder="Auto filled" />
                                </div>
                                <span class="form-text text-muted">Enter the appropriate VAT according to your country's policy..</span>
                            </div>
                            <div class="form-group m-0">
                                <label>Choose Menu Type:</label>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label class="option">
                                            <span class="option-control">
                                                <span class="radio">
                                                    <input type="radio" name="type" value="food" {{ isset($menu) ? ($menu->type == 'food' ? 'checked="checked"' : '') : '' }} />
                                                    <span></span>
                                                </span>
                                            </span>
                                            <span class="option-label">
                                                <span class="option-head">
                                                    <span class="option-title">Food</span>
                                                </span>
                                                <span class="option-body">The absorption and utilization of food by the body is fundamental to nutrition and is facilitated by digestion.</span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="option">
                                            <span class="option-control">
                                                <span class="radio">
                                                    <input type="radio" name="type" value="drink" {{ isset($menu) ? ($menu->type == 'drink' ? 'checked="checked"' : '') : 'checked="checked"' }} />
                                                    <span></span>
                                                </span>
                                            </span>
                                            <span class="option-label">
                                                <span class="option-head">
                                                    <span class="option-title">Drink</span>
                                                </span>
                                                <span class="option-body">Common types of drinks include plain drinking water, milk, coffee, tea, hot chocolate, juice and soft drinks.</span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="option">
                                            <span class="option-control">
                                                <span class="radio">
                                                    <input type="radio" name="type" value="dessert" {{ isset($menu) ? ($menu->type == 'dessert' ? 'checked="checked"' : '') : '' }} />
                                                    <span></span>
                                                </span>
                                            </span>
                                            <span class="option-label">
                                                <span class="option-head">
                                                    <span class="option-title">Dessert</span>
                                                </span>
                                                <span class="option-body">dessert, the last course of a meal. In the United States dessert is likely to consist of pastry, cake, ice cream, pudding, or fresh or cooked fruit.</span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
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
            $('#price').on('blur', function() {
                const value = this.value.replace(/,/g, '');
                this.value = parseFloat(value).toLocaleString('en-US', {
                    style: 'decimal',
                    maximumFractionDigits: 2,
                    minimumFractionDigits: 2
                });
            });

            $('#ppn').keyup(function() {
                var ppn = $(this).val();
                var price = $('#price').val();
                var priceConv = Number(price.replace(/[^0-9.-]+/g,""));

                var calc = (parseInt(ppn) / 100) * priceConv;
                var conv = parseFloat(calc).toLocaleString('en-US', {
                    style: 'decimal',
                    maximumFractionDigits: 2,
                    minimumFractionDigits: 2
                });
                $('#ppnIdr').val(conv);
            })
        });
    </script>
    @endsection
