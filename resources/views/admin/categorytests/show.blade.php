@extends('admin.layouts.app')

@section('content')

    @subheader
        Пользователь
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
                                Имя на кыргызском
                            </span>
                            <span class="m-widget13__text text-dark m--font-bolder">
                                {{$categorytest->name_kg}}
                            </span>
                        </div>
                        <div class="m-widget13__item">
                            <span class="m-widget13__desc m--align-right">
                                Имя на русском
                            </span>
                            <span class="m-widget13__text text-dark m--font-bolder">
                                {{$categorytest->name_ru}}
                            </span>
                        </div>
                        <div class="m-widget13__item">
                            <span class="m-widget13__desc m--align-right">
                                Тип
                            </span>
                            <span class="m-widget13__text text-dark m--font-bolder">
                                {{$categorytest->type}}
                            </span>
                        </div>
                        <div class="m-widget13__item">
                            <span class="m-widget13__desc m--align-right">
                                Дата добавления
                            </span>
                            <span class="m-widget13__text text-dark m--font-bolder">
                                {{$categorytest->getCreatedDate()}} {{$categorytest->getCreatedTime()}}
                            </span>
                        </div>
                        <div class="m-widget13__action m--align-right">
                            <a href="{{route('categorytests.index')}}" class="m-widget__detalis btn btn-secondary">
                                Назад
                            </a>
                            <a href="{{route('categorytests.edit', $categorytest)}}" class="m-widget__detalis btn btn-info">
                                Редактировать
                            </a>
{{--                            <a href="{{route('categorytests.destroy', $categorytest)}}" class="btn btn-danger">--}}
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

