@extends('admin.layouts.app')

@section('content')

    @subheader
        Пользователи
    @endsubheader

    @content
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Список пользователей
                        </h3>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
                <!--begin: Search Form -->
                <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                    <div class="row align-items-center">
                        <div class="col-xl-8 order-2 order-xl-1">
                            <div class="form-group m-form__group row align-items-center">
                                <div class="col-md-4">
                                    <div class="m-input-icon m-input-icon--left">
                                        <input type="text" class="form-control m-input" placeholder="Search..." id="generalSearch">
                                        <span class="m-input-icon__icon m-input-icon__icon--left">
                                                <span>
                                                        <i class="la la-search"></i>
                                                </span>
                                         </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                            <a href="{{route('categorytests.create')}}" class="btn btn-primary m-btn m-btn--custom m-btn--air m-btn--pill">
                                <span>
                                    <span>
                                        Создать категорию
                                    </span>
                                </span>
                            </a>
                            <a href="{{route('questiontests.create')}}" class="btn btn-primary m-btn m-btn--custom m-btn--air m-btn--pill">
                                <span>
                                    <span>
                                        Добавить вопросы
                                    </span>
                                </span>
                            </a>
                            <div class="m-separator m-separator--dashed d-xl-none"></div>
                        </div>
                    </div>
                </div>
                <!--end: Search Form -->
                <!--begin: Datatable -->

                <div id="demo" class="collapse">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </div>
                    <div class="table-responsive">
                        <table class="table table-striped- table-bordered table-hover table-checkable m_datatable" id="dataTable">
                            <thead>
                            <tr>
                                <th>#Id</th>
                                <th>Имя на кыргызском</th>
                                <th>Имя на русском</th>
                                <th>Тип</th>
                                <th>Действия</th>
                                <th></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                <!--end: Datatable -->
            </div>
        </div>
    @endcontent

@endsection

@section('scripts')


    <script type="text/javascript">
        $(function () {

            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('categorytests.api') }}',
                columns: [
                    { data: 'id'},
                    { data: 'name_kg'},
                    { data: 'name_ru'},
                    { data: 'type'},
                    { data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                pageLength: 25,
                language: {
                    "url": "{{asset('js/russian.json')}}"
                }
            });
        });
    </script>


@endsection

