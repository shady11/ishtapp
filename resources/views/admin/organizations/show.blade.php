@extends('admin.layouts.app')

@section('content')

    @subheader
        Организация
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
                                {{ $organization->id }}
                            </span>
                        </div>
                        <div class="m-widget13__item">
                            <span class="m-widget13__desc m--align-right">
                                Наименования
                            </span>
                            <span class="m-widget13__text text-dark m--font-bolder">
                                {{ $organization->name}}
                            </span>
                        </div>
                        <div class="m-widget13__item">
                            <span class="m-widget13__desc m--align-right">
                                Город
                            </span>
                            <span class="m-widget13__text text-dark m--font-bolder">
                                {{$organization->address_city}}
                            </span>
                        </div>
                        <div class="m-widget13__item">
                            <span class="m-widget13__desc m--align-right">
                                Улица
                            </span>
                            <span class="m-widget13__text text-dark m--font-bolder">
                                {{$organization->address_street}}
                            </span>
                        </div>
                        <div class="m-widget13__item">
                            <span class="m-widget13__desc m--align-right">
                                Телефон
                            </span>
                            <span class="m-widget13__text text-dark m--font-bolder">
                                {{$organization->phone}}
                            </span>
                        </div>
                        <div class="m-widget13__item">
                            <span class="m-widget13__desc m--align-right">
                                Рабочие часы
                            </span>
                            <span class="m-widget13__text text-dark m--font-bolder">
                                {{$organization->working_hours}}
                            </span>
                        </div>
                        <div class="m-widget13__item">
                            <span class="m-widget13__desc m--align-right">
                                Дата добавления
                            </span>
                            <span class="m-widget13__text text-dark m--font-bolder">
                                {{$organization->getCreatedDate()}} {{$organization->getCreatedTime()}}
                            </span>
                        </div>
                        <div class="m-widget13__action m--align-right">
                            <a href="{{ route('organizations.index') }}" class="m-widget__detalis btn btn-secondary">
                                Назад
                            </a>
                            <a href="{{ route('organizations.edit', $organization) }}"
                               class="m-widget__detalis btn btn-info">
                                Редактировать
                            </a>
{{--                            <a href="{{ route('organizations.destroy', $organization) }}"--}}
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


