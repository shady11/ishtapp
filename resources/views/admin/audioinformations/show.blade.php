@extends('admin.layouts.app')

@section('content')

    @subheader
    Информация о ВИЧ
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
                                {{ $audioinformation->id }}
                            </span>
                        </div>
                        <div class="m-widget13__item">
                            <span class="m-widget13__desc m--align-right">
                                Категория
                            </span>
                            <span class="m-widget13__text text-dark m--font-bolder">
                                {{ $audioinformation->category_name()}}
                            </span>
                        </div>
                        <div class="m-widget13__item">
                            <span class="m-widget13__desc m--align-right">
                                Названия
                            </span>
                            <span class="m-widget13__text text-dark m--font-bolder">
                                {{ $audioinformation->name}}
                            </span>
                        </div>
                        <div class="m-widget13__item">
                            <span class="m-widget13__desc m--align-right">
                                Дата добавления
                            </span>
                            <span class="m-widget13__text text-dark m--font-bolder">
                                {{$audioinformation->getCreatedDate()}} {{$audioinformation->getCreatedTime()}}
                            </span>
                        </div>
                        <div class="m-widget13__action m--align-right">
                            <a href="{{ route('audioinformations.index') }}" class="m-widget__detalis btn btn-secondary">
                                Назад
                            </a>
                            <a href="{{ route('audioinformations.edit', $audioinformation) }}"
                               class="m-widget__detalis btn btn-info">
                                Редактировать
                            </a>
{{--                            <a href="{{ route('audioinformations.destroy', $audioinformation) }}"--}}
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

