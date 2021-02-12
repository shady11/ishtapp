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
                                {{$patient->getFullName()}}
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-widget13">
                        <div class="m-widget13__item">
                            <span class="m-widget13__desc m--align-right">
                                Имя пользователя
                            </span>
                            <span class="m-widget13__text text-dark m--font-bolder">
                                {{$patient->username}}
                            </span>
                        </div>
                        <div class="m-widget13__item">
                            <span class="m-widget13__desc m--align-right">
                                Вопрос-1
                            </span>
                            <span class="m-widget13__text text-dark m--font-bolder">
                                {{$patient->userquestion($patient->question1_id)->name_ru}}
                            </span>
                        </div>
                        <div class="m-widget13__item">
                            <span class="m-widget13__desc m--align-right">
                            Ответ-1
                            </span>
                            <span class="m-widget13__text text-dark m--font-bolder">
                                {{$patient->answer1}}
                            </span>
                        </div>
                        <div class="m-widget13__item">
                            <span class="m-widget13__desc m--align-right">
                                Вопрос-2
                            </span>
                            <span class="m-widget13__text text-dark m--font-bolder">
                                {{$patient->userquestion($patient->question2_id)->name_ru }}
                            </span>
                        </div>
                        <div class="m-widget13__item">
                            <span class="m-widget13__desc m--align-right">
                                Ответ-2
                            </span>
                            <span class="m-widget13__text text-dark m--font-bolder">
                                {!! $patient->answer2 !!}
                            </span>
                        </div>
                        <div class="m-widget13__item">
                            <span class="m-widget13__desc m--align-right">
                                Пин-код
                            </span>
                            <span class="m-widget13__text text-dark m--font-bolder">
                                {!! $patient->pin_kod !!}
                            </span>
                        </div>
                        <div class="m-widget13__item">
                            <span class="m-widget13__desc m--align-right">
                                Дата добавления
                            </span>
                            <span class="m-widget13__text text-dark m--font-bolder">
                                {{$patient->getCreatedDate()}} {{$patient->getCreatedTime()}}
                            </span>
                        </div>
                        <div class="m-widget13__action m--align-right">
                            <a href="{{route('patients.index')}}" class="m-widget__detalis btn btn-secondary">
                                Назад
                            </a>
                            <a href="{{route('patients.edit', $patient)}}" class="m-widget__detalis btn btn-info">
                                Редактировать
                            </a>
{{--                            <a href="{{route('patients.destroy', $patient)}}" class="btn btn-danger">--}}
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

