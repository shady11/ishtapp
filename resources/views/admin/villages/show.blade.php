@extends('admin.layouts.app')

@section('content')

    @include('admin.partials.subheader')

    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="card card-custom">
                <!--begin::Header-->
                <div class="card-header py-3">
                    <div class="card-title">
                        <h3 class="card-label font-weight-bolder text-dark">{{$region->nameRu}}</h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{route('regions.index')}}" class="btn btn-secondary mr-2">Назад</a>
                        <a href="{{route('regions.edit', $region)}}" class="btn btn-success mr-2">Редактировать</a>
                        <a href="{{route('regions.delete', $region)}}" class="btn btn-danger">Удалить</a>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Form-->
                <form class="form">
                    <div class="card-body">

                        <div class="form-group row align-items-center">
                            <label class="col-xl-3 col-lg-3 col-form-label font-weight-bolder text-left text-lg-right text-uppercase">Название (на кыргызском):</label>
                            <div class="col-lg-9 col-xl-6">
                                <p class="font-weight-bold mb-0">{{$region->nameKg}}</p>
                            </div>
                        </div>

                        <div class="form-group row align-items-center">
                            <label class="col-xl-3 col-lg-3 col-form-label font-weight-bolder text-left text-lg-right text-uppercase">Название (на русском):</label>
                            <div class="col-lg-9 col-xl-6">
                                <p class="font-weight-bold mb-0">{{$region->nameRu}}</p>
                            </div>
                        </div>

                    </div>
                </form>
                <!--end::Form-->
            </div>

            <!--begin::Card-->
            <div class="card card-custom mt-9">
                <!--begin::Header-->
                <div class="card-header py-3">
                    <div class="card-title">
                        <h3 class="card-label font-weight-bolder text-dark">Районы</h3>
                    </div>
                </div>
                <!--end::Header-->
                <div class="card-body">
                    <!--begin::Search Form-->
                    <div class="mb-7">
                        <div class="row align-items-center">
                            <div class="col-lg-9 col-xl-8">
                                <div class="row align-items-center">
                                    <div class="col-md-4 my-2 my-md-0">
                                        <div class="input-icon">
                                            <input type="text" class="form-control" placeholder="Поиск..." id="kt_datatable_search_query" />
                                            <span>
                                                <i class="la la-search"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0 text-right">
                                <a href="{{route('regions.districts.create', $region)}}" class="btn btn-primary font-weight-bold">
                                    <span class="svg-icon svg-icon-md">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <circle fill="#000000" cx="9" cy="15" r="6" />
                                                <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    Добавить
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--end::Search Form-->
                    <!--begin: Datatable-->
                    <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div>
                    <!--end: Datatable-->
                </div>
            </div>
            <!--end::Card-->

        </div>
        <!--end::Container-->
    </div>

@endsection

@section('scripts')

    <script>
        var datatable = $('#kt_datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '{{route("regions.districts.api", $region)}}',
                        params: {
                            region: '{{$region->id}}'
                        },
                        // sample custom headers
                        // headers: {'x-my-custom-header': 'some value', 'x-test-header': 'the value'},
                        map: function(raw) {
                            // sample data mapping
                            var dataSet = raw;
                            if (typeof raw.data !== 'undefined') {
                                dataSet = raw.data;
                            }
                            return dataSet;
                        },
                    },
                },
                pageSize: 10,
                serverPaging: true,
                serverFiltering: true,
                serverSorting: true,
            },

            // layout definition
            layout: {
                scroll: false,
                footer: false,
            },

            // column sorting
            sortable: true,

            pagination: true,

            search: {
                input: $('#kt_datatable_search_query'),
                key: 'generalSearch'
            },

            // columns definition
            columns: [{
                field: 'order',
                title: '#',
                sortable: 'asc',
                width: 30,
                type: 'number',
                selector: false,
            }, {
                field: 'nameKg',
                title: 'Название (на кыргызском)',
            }, {
                field: 'nameRu',
                title: 'Название (на русском)',
            }, {
                field: 'acts',
                title: 'Actions',
                sortable: false,
                autoHide: false,
                textAlign: 'right',
                template: function(row) {
                    return row.actions;
                },
            }],

        });

        $('#kt_datatable_search_status').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'Status');
        });

        $('#kt_datatable_search_type').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'Type');
        });

        $('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();
    </script>

@endsection
