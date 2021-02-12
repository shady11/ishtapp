@extends('admin.layouts.app')

@section('content')

    @subheader
    Анкета
    @endsubheader

    @content
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Анкета
                    </h3>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div>
                <div class="card rounded">
                    <div class="card-body py-3 px-3">
                        {!! $userChart->container() !!}
                    </div>
                </div>
            </div>
            <div>
                <div class="card rounded">
                    <div class="card-body py-3 px-3">
                        {!! $user_actionChart->container() !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <div class="col-6">
                <div class="card rounded">
                    <div class="card-body py-3 px-3">
                        {!! $sexChart->container() !!}
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card rounded">
                    <div class="card-body py-3 px-3">
                        {!! $intersexChart->container() !!}
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card rounded">
                    <div class="card-body py-3 px-3">
                        {!! $genderChart->container() !!}
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card rounded">
                    <div class="card-body py-3 px-3">
                        {!! $yearChart->container() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="m-portlet__body">
        <div class="table-responsive">
            <table class="table table-striped- table-bordered table-hover table-checkable m_datatable"
                   id="dataTable">
                <thead>
                <tr>
                    <th>#Id</th>
                    <th>Пол</th>
                    <th>Интерсекс</th>
                    <th>Гендер</th>
                    <th>Дата рождения</th>
                    <th>Действия</th>
                </tr>
                </thead>
            </table>
        </div>

        <!--end: Datatable -->
    </div>
    @endcontent

@endsection

@section('scripts')


    <script type="text/javascript">
        $(function () {

            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('questionnaires.api') }}',
                columns: [
                    {data: 'id'},
                    {data: 'get_sex'},
                    {data: 'get_intersex'},
                    {data: 'get_gender'},
                    {data: 'year_of_birth'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                pageLength: 25,
                language: {
                    "url": "{{asset('js/russian.json')}}"
                }
            });
        });
    </script>
    @if($userChart)
        {!! $userChart->script() !!}
    @endif
    @if($user_actionChart)
        {!! $user_actionChart->script() !!}
    @endif
    @if($sexChart)
        {!! $sexChart->script() !!}
    @endif
    @if($intersexChart)
        {!! $intersexChart->script() !!}
    @endif
    @if($genderChart)
        {!! $genderChart->script() !!}
    @endif
    @if($yearChart)
        {!! $yearChart->script() !!}
    @endif
@endsection
