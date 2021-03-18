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
    <link href="{{asset('assets/css/pages/login/classic/login-3.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Base Styles -->
    <link rel="shortcut icon" href="{{asset('assets/demo/default/media/img/logo/favicon.ico')}}" />
</head>
<!-- end::Head -->
<!-- end::Body -->
<body id="kt_body" class="header-fixed subheader-enabled page-loading">
<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <!--begin::Login-->
    <div class="login login-3 login-signin-on d-flex flex-row-fluid" id="kt_login">
        <div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url({{asset('assets/media/bg/bg-1.jpg')}});">
            <div class="login-form text-center text-white p-7 position-relative overflow-hidden">
                <!--begin::Login Header-->
                <div class="d-flex flex-center mb-15">
                    <a href="#">
                        <img src="{{asset('assets/media/logos/logo-letter-9.png')}}" class="max-h-100px" alt="" />
                    </a>
                </div>
                <!--end::Login Header-->
                <!--begin::Login Sign in form-->
                <div class="login-signin">
                    <div class="mb-20">
                        <h3>{{ __('auth.authorization') }}</h3>
{{--                        <p class="opacity-60 font-weight-bold">Enter your details to login to your account:</p>--}}
                    </div>
                    {!! Form::open(['route' => 'login', 'role' => 'form', 'method' => 'POST', 'class' => 'form', 'id' => 'kt_login_signin_form']) !!}

                    @if(session()->has('login_failed'))
                        <span class="has-error">{{session('login_failed')}}</span>
                    @endif

                    <div class="form-group">
                        <input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5" type="text" placeholder="{{ __('auth.eladress') }}" name="email">
                        @if($errors->login->first('email'))
                            <span class="has-error">
											{{$errors->login->first('email')}}
										</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5" type="password" placeholder="{{ __('auth.password') }}" name="password">
                        @if($errors->login->first('password'))
                            <span class="has-error">
											{{$errors->login->first('password')}}
										</span>
                        @endif
                    </div>
                    <div class="form-group d-flex flex-wrap justify-content-between align-items-center px-8">
                        <div class="checkbox-inline">
                            <label class="checkbox checkbox-outline checkbox-white text-white m-0">
                                <input type="checkbox" name="remember" />
                                <span></span>Remember me</label>
                        </div>
                        <a href="javascript:;" id="kt_login_forgot" class="text-white font-weight-bold">{{ __('auth.forgot_pass') }} ?</a>
                    </div>
                    <div class="form-group text-center mt-10">
                        <button  type="submit" class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3">
                            {{ __('auth.login') }}
                        </button>
                    </div>
                    {!! Form::close() !!}
                    <div class="mt-10">
                        <span class="opacity-70 mr-4">Don't have an account yet?</span>
                        <a href="javascript:;" id="kt_login_signup" class="text-white font-weight-bold">Sign Up</a>
                    </div>
                </div>
                <!--end::Login Sign in form-->
                <!--begin::Login Sign up form-->
                <div class="login-signup">
                    <div class="mb-20">
                        <h3>Sign Up</h3>
                        <p class="opacity-60">Enter your details to create your account</p>
                    </div>
                    <form class="form text-center" id="kt_login_signup_form">
                        <div class="form-group">
                            <input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="text" placeholder="Fullname" name="fullname" />
                        </div>
                        <div class="form-group">
                            <input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="text" placeholder="Email" name="email" autocomplete="off" />
                        </div>
                        <div class="form-group">
                            <input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="password" placeholder="Password" name="password" />
                        </div>
                        <div class="form-group">
                            <input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="password" placeholder="Confirm Password" name="cpassword" />
                        </div>
                        <div class="form-group text-left px-8">
                            <div class="checkbox-inline">
                                <label class="checkbox checkbox-outline checkbox-white text-white m-0">
                                    <input type="checkbox" name="agree" />
                                    <span></span>I Agree the
                                    <a href="#" class="text-white font-weight-bold ml-1">terms and conditions</a>.</label>
                            </div>
                            <div class="form-text text-muted text-center"></div>
                        </div>
                        <div class="form-group">
                            <button id="kt_login_signup_submit" class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3 m-2">Sign Up</button>
                            <button id="kt_login_signup_cancel" class="btn btn-pill btn-outline-white font-weight-bold opacity-70 px-15 py-3 m-2">Cancel</button>
                        </div>
                    </form>
                </div>
                <!--end::Login Sign up form-->
                <!--begin::Login forgot password form-->
                <div class="login-forgot">
                    <div class="mb-20">
                        <h3>Forgotten Password ?</h3>
                        <p class="opacity-60">Enter your email to reset your password</p>
                    </div>
                    <form class="form" id="kt_login_forgot_form">
                        <div class="form-group mb-10">
                            <input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="text" placeholder="Email" name="email" autocomplete="off" />
                        </div>
                        <div class="form-group">
                            <button id="kt_login_forgot_submit" class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3 m-2">Request</button>
                            <button id="kt_login_forgot_cancel" class="btn btn-pill btn-outline-white font-weight-bold opacity-70 px-15 py-3 m-2">Cancel</button>
                        </div>
                    </form>
                </div>
                <!--end::Login forgot password form-->
            </div>
        </div>
    </div>
    <!--end::Login-->
</div>
<!--end::Main-->
<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
<!--begin::Global Config(global config for global JS scripts)-->
<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#8950FC", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#6993FF", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#EEE5FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#E1E9FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Scripts(used by this page)-->
{{--<script src="{{asset('assets/js/pages/custom/login/login-general.js')}}"></script>--}}
<!--end::Page Scripts-->
</body>
<!--<body  class="m&#45;&#45;skin- m-header&#45;&#45;fixed m-header&#45;&#45;fixed-mobile m-aside-left&#45;&#45;enabled m-aside-left&#45;&#45;skin-dark m-aside-left&#45;&#45;fixed m-aside-left&#45;&#45;offcanvas m-footer&#45;&#45;push m-aside&#45;&#45;offcanvas-default"  >
&lt;!&ndash; begin:: Page &ndash;&gt;
<div class="m-grid m-grid&#45;&#45;hor m-grid&#45;&#45;root m-page">
    <div class="m-grid__item m-grid__item&#45;&#45;fluid m-grid m-grid&#45;&#45;ver-desktop m-grid&#45;&#45;desktop m-grid&#45;&#45;tablet-and-mobile m-grid&#45;&#45;hor-tablet-and-mobile m-login m-login&#45;&#45;1 m-login&#45;&#45;signin" id="m_login">
        <div class="m-grid__item m-grid__item&#45;&#45;order-tablet-and-mobile-2 m-login__aside">

            <div class="m-stack m-stack&#45;&#45;hor m-stack&#45;&#45;desktop">
                <div class="m-stack__item m-stack__item&#45;&#45;fluid">
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
                                    <input class="form-control m-input m-login__form-input&#45;&#45;last" type="password" placeholder="{{ __('auth.password') }}" name="password">
                                    @if($errors->login->first('password'))
                                        <span class="has-error">
											{{$errors->login->first('password')}}
										</span>
                                    @endif
                                </div>
                                <div class="row m-login__form-sub">
                                    <div class="col m&#45;&#45;align-right">
                                        <a href="javascript:;" id="m_login_forget_password" class="m-link">
                                            {{ __('auth.forgot_pass') }} ?
                                        </a>
                                    </div>
                                </div>
                                <div class="m-login__form-action">
                                    <button class="btn btn-primary m-btn m-btn&#45;&#45;custom m-btn&#45;&#45;air">
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
                                    <button id="m_login_forget_password_submit" class="btn btn-focus m-btn m-btn&#45;&#45;custom m-btn&#45;&#45;air">
                                        Отправить
                                    </button>
                                    <button id="m_login_forget_password_cancel" class="btn btn-outline-focus m-btn m-btn&#45;&#45;custom">
                                        Отмена
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="m-grid__item m-grid__item&#45;&#45;fluid m-grid m-grid&#45;&#45;center m-grid&#45;&#45;hor m-grid__item&#45;&#45;order-tablet-and-mobile-1	m-login__content" style="background-image: url({{asset('assets/app/media/img//bg/bg-5.jpg')}})">
            <div class="m-grid__item m-grid__item&#45;&#45;middle">
                <img src="{{asset('img/logo.png')}}" alt="">
            </div>
        </div>
    </div>
</div>
&lt;!&ndash; end:: Page &ndash;&gt;
&lt;!&ndash;begin::Base Scripts &ndash;&gt;
<script src="{{asset('assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/demo/default/base/scripts.bundle.js')}}" type="text/javascript"></script>
&lt;!&ndash;end::Base Scripts &ndash;&gt;
&lt;!&ndash;begin::Page Snippets &ndash;&gt;
<script src="{{asset('assets/snippets/custom/pages/user/login.js')}}" type="text/javascript"></script>
&lt;!&ndash;end::Page Snippets &ndash;&gt;
</body>-->
<!-- end::Body -->
</html>
