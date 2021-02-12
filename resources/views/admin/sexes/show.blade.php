@extends('admin.layouts.app')

@section('content')

    @subheader
        Пол
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
                                {{ $sex->id }}
                            </span>
                        </div>
                        <div class="m-widget13__item">
                            <span class="m-widget13__desc m--align-right">
                                Тема на русском
                            </span>
                            <span class="m-widget13__text text-dark m--font-bolder">
                                {{ $sex->sex_ru}}
                            </span>
                        </div>
                        <div class="m-widget13__item">
                            <span class="m-widget13__desc m--align-right">
                                Тема на кыргызском
                            </span>
                            <span class="m-widget13__text text-dark m--font-bolder">
                                {{$sex->sex_kg}}
                            </span>
                        </div>
                        <div class="m-widget13__item">
                            <span class="m-widget13__desc m--align-right">
                                Дата добавления
                            </span>
                            <span class="m-widget13__text text-dark m--font-bolder">
                                {{$sex->getCreatedDate()}} {{$sex->getCreatedTime()}}
                            </span>
                        </div>
                        <div class="m-widget13__action m--align-right">
                            <a href="{{ route('sexes.index') }}" class="m-widget__detalis btn btn-secondary">
                                Назад
                            </a>
                            <a href="{{ route('sexes.edit', $sex) }}"
                               class="m-widget__detalis btn btn-info">
                                Редактировать
                            </a>
{{--                            <a href="{{ route('sexes.destroy', $sex) }}"--}}
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

