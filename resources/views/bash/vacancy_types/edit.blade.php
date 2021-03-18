@extends('admin.layouts.app')

@section('content')

    @subheader
        Виды вакансий
    @endsubheader

    @content
    <div class="row">
        <div class="col-lg-12">
            <!--begin::Portlet-->
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Редактировать
                            </h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
            {!! Form::model($vacancy_type, ['route' => ['vacancy_types.update', $vacancy_type], 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']) !!}
            @include('admin.vacancy_types.form', $vacancy_type)
            {!! Form::close() !!}
            <!--end::Form-->
            </div>
            <!--end::Portlet-->
        </div>
    </div>
    @endcontent

@endsection

@section('scripts')
@endsection
