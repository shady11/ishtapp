@extends('admin.layouts.app')

@section('content')

    @subheader
        Пользователи
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
                                {{$user->getFullName()}}
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-widget13">
{{--                        <div class="m-widget13__item">--}}
{{--                            <span class="m-widget13__desc m--align-right">--}}
{{--                                Аватар--}}
{{--                            </span>--}}
{{--                            <span class="m-widget13__text text-dark m--font-bolder">--}}
{{--                                <img src="{{asset('/storage/'.$user->avatar)}}" alt="{{$user->getFullName()}}">--}}
{{--                            </span>--}}
{{--                        </div>--}}
                        <div class="m-widget13__item">
                            <span class="m-widget13__desc m--align-right">
                                Имя
                            </span>
                            <span class="m-widget13__text text-dark m--font-bolder">
                                {{$user->name}}
                            </span>
                        </div>
                        <div class="m-widget13__item">
                            <span class="m-widget13__desc m--align-right">
                                Фамилия
                            </span>
                            <span class="m-widget13__text text-dark m--font-bolder">
                                {{$user->lastname}}
                            </span>
                        </div>
                        <div class="m-widget13__item">
                            <span class="m-widget13__desc m--align-right">
                                Логин
                            </span>
                            <span class="m-widget13__text text-dark m--font-bolder">
                                {{$user->login}}
                            </span>
                        </div>
                        <div class="m-widget13__item">
                            <span class="m-widget13__desc m--align-right">
                                Эл.адрес
                            </span>
                            <span class="m-widget13__text text-dark m--font-bolder">
                                {{$user->email}}
                            </span>
                        </div>
                        <div class="m-widget13__item">
                            <span class="m-widget13__desc m--align-right">
                                Статус
                            </span>
                            <span class="m-widget13__text text-dark m--font-bolder">
                                {!! $user->getStatus() !!}
                            </span>
                        </div>
                        <div class="m-widget13__item">
                            <span class="m-widget13__desc m--align-right">
                                Дата добавления
                            </span>
                            <span class="m-widget13__text text-dark m--font-bolder">
                                {{$user->getCreatedDate()}} {{$user->getCreatedTime()}}
                            </span>
                        </div>
                        <div class="m-widget13__action m--align-right">
                            <a href="{{route('users.index')}}" class="m-widget__detalis btn btn-secondary">
                                Назад
                            </a>
                            <a href="{{route('users.edit', $user)}}" class="m-widget__detalis btn btn-info">
                                Редактировать
                            </a>
{{--                            <a href="#" class="btn btn-danger">--}}
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

