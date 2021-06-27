{{-- Extends layout --}}
@extends('layout.default')
@section('page_title', 'Pesanan Aktif')
{{-- Content --}}
@section('content')
<div class="d-flex flex-column-fluid">
    <div class="container row">
        @foreach($data as $order)
        <div class="card card-custom">
            <div class="card card-custom card-stretch gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0">
                    <h3 class="card-title font-weight-bolder text-dark">{{ $order->customer_name }} - Meja {{ $order->table_number }}
                    </h3>
                </div>
                <!--end::Header-->
                <div class="separator separator-dashed my-3"></div>
                <!--begin::Body-->
                <div class="card-body pt-0">
                    <!--begin::Item-->
                    @foreach($order->list->whereNull('serve_at') as $item)
                    <div class="d-flex align-items-center mb-6 bg-light-{{ $item->menu->color }} rounded p-5">
                        <!--begin::Icon-->
                        <span class="svg-icon svg-icon-{{ $item->menu->color }} mr-5">
                            <span class="svg-icon svg-icon-lg">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000" />
                                        <rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </span>
                        <!--end::Icon-->
                        <!--begin::Title-->
                        <div class="d-flex flex-column flex-grow-1 mr-2">
                            <a href="#" class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">
                                {{ $item->menu->name }}
                            </a>
                            {{-- <span class="text-muted font-weight-bold">Due in 2 Days</span> --}}
                        </div>
                        <!--end::Title-->
                        <!--begin::Lable-->
                        <span class="font-weight-bolder text-{{ $item->menu->color }} py-1 font-size-lg">X{{ $item->order_amount }}</span>
                        <!--end::Lable-->
                    </div>
                    @endforeach
                    <!--end::Item-->
                    
                </div>
                <!--end::Body-->
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('styles')

@endsection

@section('scripts')

<script>


    "use strict";
// Class definition

var KTDatatableJsonRemoteDemo = function() {
    // Private functions

    // basic demo
    var demo = function() {
        var datatable = $('#kt_datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: '{{ route('table.api') }}',
                pageSize: 10,
            },

            // layout definition
            layout: {
                scroll: false, // enable/disable datatable scroll both horizontal and vertical when needed.
                footer: false // display/hide footer
            },

            // column sorting
            sortable: true,

            pagination: true,

            search: {
                input: $('#kt_datatable_search_query'),
                key: 'generalSearch'
            },

            // columns definition
            columns: [
            {
                field: 'id',
                title: '#',
                sortable: false,
                width: 20,
                type: 'number',
                selector: {
                    class: ''
                },
                textAlign: 'center',
            },
            {
                field: 'number',
                title: 'Table Number',
                sortable: 'asc',
            },
            {
                field: '',
                title: 'Actions',
                sortable: false,
                width: 125,
                autoHide: false,
                overflow: 'visible',
                template: function(row) {
                    var status = {
                        0: {
                            'title': 'Set Close Order',
                            'class': 'bg-light-danger'
                        },
                        1: {
                            'title': 'Set Open Order',
                            'class': 'bg-light-success'
                        },
                    };
                    return '<a href="#" class="btn btn-sm btn-clean btn-icon mr-2 edit-table" onclick="up()" data-table="'+row.id+'" title="Edit details">\
                    <span class="svg-icon svg-icon-md">\
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                    <rect x="0" y="0" width="24" height="24"/>\
                    <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>\
                    <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>\
                    </g>\
                    </svg>\
                    </span>\
                    </a>\
                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete">\
                    <span class="svg-icon svg-icon-md">\
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                    <rect x="0" y="0" width="24" height="24"/>\
                    <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>\
                    <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>\
                    </g>\
                    </svg>\
                    </span>\
                    </a>\
                    ';
                },
            }
            ],

        });

$('#kt_datatable_search_status').on('change', function() {
    datatable.search($(this).val().toLowerCase(), 'status');
});

$('#kt_datatable_search_type').on('change', function() {
    datatable.search($(this).val().toLowerCase(), 'type');
});

$('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();
};

return {
        // public functions
        init: function() {
            demo();
        }
    };
}();

jQuery(document).ready(function() {
    KTDatatableJsonRemoteDemo.init();
});

</script>

<script>
    $(document).ready(function() {
        var update = 0;
        update.onchange = function() {
            alert('s');
        }
        function up() {
            alert('asdasd');
            $('.label-crud').text('U');
        }
        $('#table-number').keyup(function(){
            if (update == 0) {
                $.ajax({
                    type: "POST",
                    url: "{{ route('table.check') }}",
                    data: {
                        number: $(this).val()
                    },
                    success: function(result){
                        console.log(result);
                    },
                    error: function(error){
                        alert(error);
                        console.log(error);
                    }
                })
            }
        })
    });
</script>
@endsection