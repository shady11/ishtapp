<!DOCTYPE html>
<html lang="en" >

<!-- begin::Head -->

<head>
    <meta charset="utf-8" />
    <title>
        {{ __('auth.authorization') }}
    </title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!--end::Web font -->
    <!--begin::Base Styles -->
    <link href="{{asset('assets/vendors/base/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/demo/default/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/admin/app.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Base Styles -->
    <link rel="shortcut icon" href="{{asset('assets/demo/default/media/img/logo/favicon.ico')}}" />
</head>
<!-- end::Head -->
<!-- end::Body -->
<body  class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-grid--tablet-and-mobile m-grid--hor-tablet-and-mobile m-login m-login--1 m-login--signin" id="m_login">
        <div class="m-grid__item m-grid__item--order-tablet-and-mobile-2 m-login__aside">

            <div class="m-stack m-stack--hor m-stack--desktop">
                <div class="m-stack__item m-stack__item--fluid">
                    <ul style="float: right;">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="flag-icon flag-icon-us"> </span> {{__('auth.language')}}</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown09">
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <a class="dropdown-item" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        <span class="flag-icon flag-icon-us"> </span>  {{ $properties['native'] }} </a>
                                @endforeach
                            </div>
                        </li>
                    </ul>

                    <div class="m-login__wrapper d-flex align-items-center">
                        <div class="m-login__signin w-100">
                            <div class="m-login__head">
                                <h3 class="m-login__title">
                                    {{ __('auth.authorization') }}
                                </h3>
                            </div>

                            {!! Form::open(['route' => 'login', 'role' => 'form', 'method' => 'POST', 'class' => 'm-login__form m-form']) !!}

                                @if(session()->has('login_failed'))
                                    <span class="has-error">{{session('login_failed')}}</span>
                                @endif

                                <div class="form-group m-form__group">
                                    <input class="form-control m-input" type="text" placeholder="{{ __('auth.eladress') }}" name="email">
                                    @if($errors->login->first('email'))
                                        <span class="has-error">
											{{$errors->login->first('email')}}
										</span>
                                    @endif
                                </div>
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input m-login__form-input--last" type="password" placeholder="{{ __('auth.password') }}" name="password">
                                    @if($errors->login->first('password'))
                                        <span class="has-error">
											{{$errors->login->first('password')}}
										</span>
                                    @endif
                                </div>
                                <div class="row m-login__form-sub">
                                    <div class="col m--align-right">
                                        <a href="javascript:;" id="m_login_forget_password" class="m-link">
                                            {{ __('auth.forgot_pass') }} ?
                                        </a>
                                    </div>
                                </div>
                                <div class="m-login__form-action">
                                    <button class="btn btn-primary m-btn m-btn--custom m-btn--air">
                                        {{ __('auth.login') }}
                                    </button>
                                </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="m-login__forget-password w-100">
                            <div class="m-login__head">
                                <h3 class="m-login__title">
                                    Восстановление пароля
                                </h3>
                                <div class="m-login__desc">
                                    Введите Ваш эл.адрес для сброса пароля
                                </div>
                            </div>
                            <form class="m-login__form m-form" action="">
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input" type="text" placeholder="Эл.адрес" name="email" id="m_email" autocomplete="off">
                                </div>
                                <div class="m-login__form-action">
                                    <button id="m_login_forget_password_submit" class="btn btn-focus m-btn m-btn--custom m-btn--air">
                                        Отправить
                                    </button>
                                    <button id="m_login_forget_password_cancel" class="btn btn-outline-focus m-btn m-btn--custom">
                                        Отмена
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--center m-grid--hor m-grid__item--order-tablet-and-mobile-1	m-login__content" style="background-image: url({{asset('assets/app/media/img//bg/bg-5.jpg')}})">
            <div class="m-grid__item m-grid__item--middle">
                <img src="{{asset('img/logo.png')}}" alt="">
            </div>
        </div>
    </div>
</div>
<!-- end:: Page -->
<!--begin::Base Scripts -->
<script src="{{asset('assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/demo/default/base/scripts.bundle.js')}}" type="text/javascript"></script>
<!--end::Base Scripts -->
<!--begin::Page Snippets -->
<script src="{{asset('assets/snippets/custom/pages/user/login.js')}}" type="text/javascript"></script>
<!--end::Page Snippets -->
</body>
<!-- end::Body -->
</html>
