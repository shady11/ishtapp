@extends('admin.layouts.app')

@section('content')

    @subheader
        Настроение
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
                                {{--                                {{$patient->getFullName()}}--}}
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-widget13">
                        <div class="m-widget13__item">
                            <span class="m-widget13__desc m--align-right">
                                #id
                            </span>
                            <span class="m-widget13__text text-dark m--font-bolder">
                                {{ $patientmood->id }}
                            </span>
                        </div>
                        <div class="m-widget13__item">
                            <span class="m-widget13__desc m--align-right">
                                Пациент id
                            </span>
                            <span class="m-widget13__text text-dark m--font-bolder">
                                {{ $patientmood->patient_id}}
                            </span>
                        </div>
                        <div class="m-widget13__item">
                            <span class="m-widget13__desc m--align-right">
                                Названия
                            </span>
                            <span class="m-widget13__text text-dark m--font-bolder">
                                {{$patientmood->title}}
                            </span>
                        </div>
                        <div class="m-widget13__item">
                            <span class="m-widget13__desc m--align-right">
                                Названия файла
                            </span>
                            <span class="m-widget13__text text-dark m--font-bolder">
                                {{$patientmood->file_name}}
                            </span>
                        </div>
                        <div class="m-widget13__item">
                            <span class="m-widget13__desc m--align-right">
                                Дата
                            </span>
                            <span class="m-widget13__text text-dark m--font-bolder">
                                {{$patientmood->date}}
                            </span>
                        </div>
                        <div class="m-widget13__item">
                            <span class="m-widget13__desc m--align-right">
                                Дата добавления
                            </span>
                            <span class="m-widget13__text text-dark m--font-bolder">
                                {{$patientmood->getCreatedDate()}} {{$patientmood->getCreatedTime()}}
                            </span>
                        </div>
                        <div class="m-widget13__action m--align-right">
                            <a href="{{ route('patientmoods.index') }}" class="m-widget__detalis btn btn-secondary">
                                Назад
                            </a>
                            <a href="{{ route('patientmoods.edit', $patientmood) }}"
                               class="m-widget__detalis btn btn-info">
                                Редактировать
                            </a>
{{--                            <a href="{{ route('patientmoods.destroy', $patientmood) }}"--}}
{{--                               class="btn btn-danger">--}}
{{--                                Удалить--}}
{{--                            </a>--}}
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Portlet-->
        </div>
    </div>
    @endcontent

@endsection

