<!-- BEGIN: Left Aside -->
<button class="m-aside-left-close  m-aside-left-close--skin-light " id="m_aside_left_close_btn">
    <i class="la la-close"></i>
</button>
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-light ">
    <!-- BEGIN: Aside Menu -->
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-light m-aside-menu--submenu-skin-light "
         m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            {{--            <li class="m-menu__item  m-menu__item--active" aria-haspopup="true">--}}
            {{--                <div class="container-fluid">--}}
            {{--                    <ul>--}}
            {{--                        <li class="nav-item dropdown">--}}
            {{--                            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown09"--}}
            {{--                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span--}}
            {{--                                    class="flag-icon flag-icon-us"> </span> {{__('auth.language')}}</a>--}}
            {{--                            <div class="dropdown-menu" aria-labelledby="dropdown09">--}}
            {{--                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)--}}
            {{--                                    <a class="dropdown-item" hreflang="{{ $localeCode }}"--}}
            {{--                                       href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">--}}
            {{--                                        <span class="flag-icon flag-icon-fr"> </span> {{ $properties['native'] }} </a>--}}
            {{--                                @endforeach--}}
            {{--                            </div>--}}
            {{--                        </li>--}}
            {{--                    </ul>--}}
            {{--                </div>--}}
            {{--            </li>--}}
            <br>
            <li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
                <a href="{{route('admin.index')}}" class="m-menu__link ">
                    <i class="m-menu__link-icon jam jam-home"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                {{ __('pages.mainpage') }}
                            </span>
                        </span>
                    </span>
                </a>
            </li>


            <li class="m-menu__section ">
                <h4 class="m-menu__section-text">
                    {{ __('pages.actions') }}
                </h4>
                <i class="m-menu__section-icon flaticon-more-v3"></i>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="javascript:;" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon jam jam-plus-circle"></i>
                    <span class="m-menu__link-text">
                        Добавить
                    </span>
                    <i class="m-menu__ver-arrow jam jam-chevron-right"></i>
                </a>
                <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
                            <span class="m-menu__link">
                                <span class="m-menu__link-text">
                                    Добавить
                                </span>
                            </span>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{route('users.create')}}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                   Администратор
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{route('patients.create')}}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Пользователь
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            <li class="m-menu__section ">
                <h4 class="m-menu__section-text">
                    {{ __('pages.main') }}
                </h4>
                <i class="m-menu__section-icon flaticon-more-v3"></i>
            </li>


            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="javascript:;" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon jam jam-users"></i>
                    <span class="m-menu__link-text">
                               Пользователи
                            </span>
                    <i class="m-menu__ver-arrow jam jam-chevron-right"></i>
                </a>
                <div class="m-menu__submenu">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
                                        <span class="m-menu__link">
                                            <span class="m-menu__link-text">
                                                Пользователи
                                            </span>
                                        </span>
                        </li>
                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"
                            m-menu-submenu-toggle="hover">
                            <a href="{{route('users.index')}}" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                                Администраторы
                                            </span>
                            </a>
                        </li>
                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"
                            m-menu-submenu-toggle="hover">
                            <a href="{{route('patients.index')}}" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                                Пользователи
                                            </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="javascript:;" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon jam jam-help"></i>
                    <span class="m-menu__link-text">
                        Вопросы для пользователей
                    </span>
                    <i class="m-menu__ver-arrow jam jam-chevron-right"></i>
                </a>
                <div class="m-menu__submenu">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">

                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
                            <span class="m-menu__link">
                                <span class="m-menu__link-text">
                                    Вопросы для пользователей
                                </span>
                            </span>
                        </li>

                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"
                            m-menu-submenu-toggle="hover">
                            <a href="{{route('userquestions.create')}}" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Добавить вопрос
                                </span>
                            </a>
                        </li>

                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"
                            m-menu-submenu-toggle="hover">
                            <a href="{{route('userquestions.index')}}" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Все вопросы
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"
                            m-menu-submenu-toggle="hover">
                            <a href="{{route('sexes.create')}}" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Добавить пол
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"
                            m-menu-submenu-toggle="hover">
                            <a href="{{route('sexes.index')}}" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Список всех полов
                                </span>
                            </a>
                        </li>


                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"
                            m-menu-submenu-toggle="hover">
                            <a href="{{route('genders.create')}}" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Добавить гендер
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"
                            m-menu-submenu-toggle="hover">
                            <a href="{{route('genders.index')}}" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Список всех гендеров
                                </span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>


            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="javascript:;" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon jam jam-help"></i>
                    <span class="m-menu__link-text">
                        Напоминания
                    </span>
                    <i class="m-menu__ver-arrow jam jam-chevron-right"></i>
                </a>
                <div class="m-menu__submenu">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">

                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
                            <span class="m-menu__link">
                                <span class="m-menu__link-text">
                                    Напоминания
                                </span>
                            </span>
                        </li>

                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"
                            m-menu-submenu-toggle="hover">
                            <a href="{{route('notifications.create')}}" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Добавить
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"
                            m-menu-submenu-toggle="hover">
                            <a href="{{route('notifications.index')}}" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    все напоминие
                                </span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="javascript:;" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon jam jam-box"></i>
                    <span class="m-menu__link-text">
                        Организации
                    </span>
                    <i class="m-menu__ver-arrow jam jam-chevron-right"></i>
                </a>
                <div class="m-menu__submenu">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">

                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
                            <span class="m-menu__link">
                                <span class="m-menu__link-text">
                                       Организации
                                </span>
                            </span>
                        </li>

                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"
                            m-menu-submenu-toggle="hover">
                            <a href="{{ route('organizationtypes.create') }}" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                      Добавить вид организации
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"
                            m-menu-submenu-toggle="hover">
                            <a href="{{ route('organizations.create') }}" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                     Добавить организацию
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"
                            m-menu-submenu-toggle="hover">
                            <a href="{{ route('organizationtypes.index') }}" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                      Все виды организации
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"
                            m-menu-submenu-toggle="hover">
                            <a href="{{ route('organizations.index') }}" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                      Все организации
                                </span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                            <a href="javascript:;" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-icon jam jam-box"></i>
                                <span class="m-menu__link-text">
                                    Информация о ВИЧ
                                </span>
                                <i class="m-menu__ver-arrow jam jam-chevron-right"></i>
                            </a>
                            <div class="m-menu__submenu">
                                <span class="m-menu__arrow"></span>
                                <ul class="m-menu__subnav">

                                    <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
                                        <span class="m-menu__link">
                                            <span class="m-menu__link-text">
                                                   Информация о ВИЧ
                                            </span>
                                        </span>
                                    </li>

                                    <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"
                                        m-menu-submenu-toggle="hover">
                                        <a href="{{ route('videoinformationcategories.index') }}" class="m-menu__link m-menu__toggle">
                                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                <span></span>
                                            </i>
                                            <span class="m-menu__link-text">
                                                  Добавить категорию видео
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"
                                        m-menu-submenu-toggle="hover">
                                        <a href="{{ route('audioinformationcategories.index') }}" class="m-menu__link m-menu__toggle">
                                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                <span></span>
                                            </i>
                                            <span class="m-menu__link-text">
                                                  Добавить категорию аудио
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"
                                        m-menu-submenu-toggle="hover">
                                        <a href="{{ route('videoinformations.index') }}" class="m-menu__link m-menu__toggle">
                                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                <span></span>
                                            </i>
                                            <span class="m-menu__link-text">
                                                  Добавить видео
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"
                                        m-menu-submenu-toggle="hover">
                                        <a href="{{ route('audioinformations.index') }}" class="m-menu__link m-menu__toggle">
                                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                <span></span>
                                            </i>
                                            <span class="m-menu__link-text">
                                                  Добавить аудио
                                            </span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>

            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="javascript:;" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon jam jam-newsletter"></i>
                    <span class="m-menu__link-text">
                        {{ __('pages.testHIV') }}
                    </span>
                    <i class="m-menu__ver-arrow jam jam-chevron-right"></i>
                </a>
                <div class="m-menu__submenu">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">

                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
                            <span class="m-menu__link">
                                <span class="m-menu__link-text">
                                    {{ __('pages.testHIV') }}
                                </span>
                            </span>
                        </li>

                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"
                            m-menu-submenu-toggle="hover">
                            <a href="{{ route('categorytests.create') }}" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Добавить категории
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"
                            m-menu-submenu-toggle="hover">
                            <a href="{{ route('questiontests.create') }}" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                   Добавить вопросы
                                </span>
                            </a>
                        </li>

                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{ route('categorytests.index') }}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                         {{ __('pages.categories') }}
                                    </span>
                            </a>
                        </li>

                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"
                            m-menu-submenu-toggle="hover">
                            <a href="{{ route('questiontests.index') }}" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    {{ __('pages.questions') }}
                                </span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="javascript:;" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon jam jam-sitemap"></i>
                    <span class="m-menu__link-text">
                            Консультанты
                    </span>
                    <i class="m-menu__ver-arrow jam jam-chevron-right"></i>
                </a>
                <div class="m-menu__submenu">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">

                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
                            <span class="m-menu__link">
                                <span class="m-menu__link-text">
                                    Консультанты
                                </span>
                            </span>
                        </li>

                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"
                            m-menu-submenu-toggle="hover">
                            <a href="{{ route('themeconsultantquestions.create') }}"
                               class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Добавить новую тему
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"
                            m-menu-submenu-toggle="hover">
                            <a href="{{ route('consultants.create') }}" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Добавить консультант
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"
                            m-menu-submenu-toggle="hover">
                            <a href="{{ route('themeconsultantquestions.index') }}" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Все темы
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"
                            m-menu-submenu-toggle="hover">
                            <a href="{{ route('consultants.index') }}" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Все консультанты
                                </span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="javascript:;" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon jam jam-user-circle"></i>
                    <span class="m-menu__link-text">
                        Мое состояние
                    </span>
                    <i class="m-menu__ver-arrow jam jam-chevron-right"></i>
                </a>
                <div class="m-menu__submenu">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">

                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
                            <span class="m-menu__link">
                                <span class="m-menu__link-text">
                                    Мое состояние
                                </span>
                            </span>
                        </li>

{{--                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"--}}
{{--                            m-menu-submenu-toggle="hover">--}}
{{--                            <a href="{{ route('symptoms.create') }}" class="m-menu__link m-menu__toggle">--}}
{{--                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">--}}
{{--                                    <span></span>--}}
{{--                                </i>--}}
{{--                                <span class="m-menu__link-text">--}}
{{--                                    Добавить симптом--}}
{{--                                </span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"--}}
{{--                            m-menu-submenu-toggle="hover">--}}
{{--                            <a href="{{ route('symptoms.index') }}" class="m-menu__link m-menu__toggle">--}}
{{--                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">--}}
{{--                                    <span></span>--}}
{{--                                </i>--}}
{{--                                <span class="m-menu__link-text">--}}
{{--                                    Все симптомы--}}
{{--                                </span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"--}}
{{--                            m-menu-submenu-toggle="hover">--}}
{{--                            <a href="{{ route('moods.create') }}" class="m-menu__link m-menu__toggle">--}}
{{--                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">--}}
{{--                                    <span></span>--}}
{{--                                </i>--}}
{{--                                <span class="m-menu__link-text">--}}
{{--                                    Добавить настроение--}}
{{--                                </span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"--}}
{{--                            m-menu-submenu-toggle="hover">--}}
{{--                            <a href="{{ route('moods.index') }}" class="m-menu__link m-menu__toggle">--}}
{{--                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">--}}
{{--                                    <span></span>--}}
{{--                                </i>--}}
{{--                                <span class="m-menu__link-text">--}}
{{--                                    Все настроение--}}
{{--                                </span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"--}}
{{--                            m-menu-submenu-toggle="hover">--}}
{{--                            <a href="{{ route('patientmoods.create') }}" class="m-menu__link m-menu__toggle">--}}
{{--                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">--}}
{{--                                    <span></span>--}}
{{--                                </i>--}}
{{--                                <span class="m-menu__link-text">--}}
{{--                                    Добавить настроения пациента--}}
{{--                                </span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"
                            m-menu-submenu-toggle="hover">
                            <a href="{{ route('patientmoods.index') }}" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Все настроения пациента
                                </span>
                            </a>
                        </li>
{{--                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"--}}
{{--                            m-menu-submenu-toggle="hover">--}}
{{--                            <a href="{{ route('patientsymptoms.create') }}" class="m-menu__link m-menu__toggle">--}}
{{--                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">--}}
{{--                                    <span></span>--}}
{{--                                </i>--}}
{{--                                <span class="m-menu__link-text">--}}
{{--                                    Добавить симптомы пациента--}}
{{--                                </span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"
                            m-menu-submenu-toggle="hover">
                            <a href="{{ route('patientsymptoms.index') }}" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Все симптомы пациента
                                </span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            {{--            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">--}}
            {{--                <a href="javascript:;" class="m-menu__link m-menu__toggle">--}}
            {{--                    <i class="m-menu__link-icon jam jam-user-circle"></i>--}}
            {{--                    <span class="m-menu__link-text">--}}
            {{--                        АРВП--}}
            {{--                    </span>--}}
            {{--                    <i class="m-menu__ver-arrow jam jam-chevron-right"></i>--}}
            {{--                </a>--}}
            {{--                <div class="m-menu__submenu">--}}
            {{--                    <span class="m-menu__arrow"></span>--}}
            {{--                    <ul class="m-menu__subnav">--}}

            {{--                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">--}}
            {{--                            <span class="m-menu__link">--}}
            {{--                                <span class="m-menu__link-text">--}}
            {{--                                    АРВП--}}
            {{--                                </span>--}}
            {{--                            </span>--}}
            {{--                        </li>--}}

            {{--                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"--}}
            {{--                            m-menu-submenu-toggle="hover">--}}
            {{--                            <a href="#" class="m-menu__link m-menu__toggle">--}}
            {{--                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">--}}
            {{--                                    <span></span>--}}
            {{--                                </i>--}}
            {{--                                <span class="m-menu__link-text">--}}
            {{--                                    Добавить--}}
            {{--                                </span>--}}
            {{--                            </a>--}}
            {{--                        </li>--}}
            {{--                        --}}{{--                            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">--}}
            {{--                        --}}{{--                                <a  href="#" class="m-menu__link m-menu__toggle">--}}
            {{--                        --}}{{--                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">--}}
            {{--                        --}}{{--                                        <span></span>--}}
            {{--                        --}}{{--                                    </i>--}}
            {{--                        --}}{{--                                    <span class="m-menu__link-text">--}}
            {{--                        --}}{{--                                    Все отзывы--}}
            {{--                        --}}{{--                                </span>--}}
            {{--                        --}}{{--                                </a>--}}
            {{--                        --}}{{--                            </li>--}}

            {{--                    </ul>--}}
            {{--                </div>--}}
            {{--            </li>--}}

            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="javascript:;" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon jam jam-sitemap"></i>
                    <span class="m-menu__link-text">
                        Карта
                    </span>
                    <i class="m-menu__ver-arrow jam jam-chevron-right"></i>
                </a>
                <div class="m-menu__submenu">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">

                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
                            <span class="m-menu__link">
                                <span class="m-menu__link-text">
                                     Карта
                                </span>
                            </span>
                        </li>

                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"
                            m-menu-submenu-toggle="hover">
                            <a href="{{ route('maps.api') }}" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Карта
                                </span>
                            </a>
                        </li>
                        {{--                            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">--}}
                        {{--                                <a  href="{{route('events.index')}}" class="m-menu__link m-menu__toggle">--}}
                        {{--                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">--}}
                        {{--                                        <span></span>--}}
                        {{--                                    </i>--}}
                        {{--                                    <span class="m-menu__link-text">--}}
                        {{--                                    Все мероприятия--}}
                        {{--                                </span>--}}
                        {{--                                </a>--}}
                        {{--                            </li>--}}

                    </ul>
                </div>
            </li>

            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="javascript:;" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon jam jam-building"></i>
                    <span class="m-menu__link-text">
                        Справочники
                    </span>
                    <i class="m-menu__ver-arrow jam jam-chevron-right"></i>
                </a>
                <div class="m-menu__submenu">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">

                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
                            <span class="m-menu__link">
                                <span class="m-menu__link-text">
                                     Справочники
                                </span>
                            </span>
                        </li>

                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"
                            m-menu-submenu-toggle="hover">
                            <a href="#" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Добавить
                                </span>
                            </a>
                        </li>
                        {{--                            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">--}}
                        {{--                                <a  href="#" class="m-menu__link m-menu__toggle">--}}
                        {{--                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">--}}
                        {{--                                        <span></span>--}}
                        {{--                                    </i>--}}
                        {{--                                    <span class="m-menu__link-text">--}}
                        {{--                                    Все мероприятия--}}
                        {{--                                </span>--}}
                        {{--                                </a>--}}
                        {{--                            </li>--}}

                    </ul>
                </div>
            </li>

            {{--                <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">--}}
            {{--                    <a  href="{{route('pages.index')}}" class="m-menu__link m-menu__toggle">--}}
            {{--                        <i class="m-menu__link-icon jam jam-document"></i>--}}
            {{--                        <span class="m-menu__link-text">--}}
            {{--                        Страницы--}}
            {{--                    </span>--}}
            {{--                    </a>--}}
            {{--                </li>--}}

            {{--                <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">--}}
            {{--                    <a  href="{{route('feedbacks.index')}}" class="m-menu__link m-menu__toggle">--}}
            {{--                        <i class="m-menu__link-icon jam jam-redo"></i>--}}
            {{--                        <span class="m-menu__link-text">--}}
            {{--                        Обратные связи--}}
            {{--                    </span>--}}
            {{--                    </a>--}}
            {{--                </li>--}}

            {{--                <li class="m-menu__section ">--}}
            {{--                    <h4 class="m-menu__section-text">--}}
            {{--                        Дополнительно--}}
            {{--                    </h4>--}}
            {{--                    <i class="m-menu__section-icon flaticon-more-v3"></i>--}}
            {{--                </li>--}}
            {{--                <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">--}}
            {{--                    <a  href="{{route('main.index')}}" class="m-menu__link m-menu__toggle">--}}
            {{--                        <i class="m-menu__link-icon jam jam-facebook-square"></i>--}}
            {{--                        <span class="m-menu__link-text">--}}
            {{--                        Основное--}}
            {{--                    </span>--}}
            {{--                    </a>--}}
            {{--                </li>--}}
            {{-- <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
                <a  href="{{route('social_medias.index')}}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon jam jam-facebook-square"></i>
                    <span class="m-menu__link-text">
                            Наши контакты
                        </span>
                    <i class="m-menu__ver-arrow jam jam-chevron-right"></i>
                </a>
            </li> --}}
            {{--                <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">--}}
            {{--                    <a  href="{{route('admin.menus')}}" class="m-menu__link m-menu__toggle">--}}
            {{--                        <i class="m-menu__link-icon jam jam-document"></i>--}}
            {{--                        <span class="m-menu__link-text">--}}
            {{--                        Меню--}}
            {{--                    </span>--}}
            {{--                    </a>--}}
            {{--                </li>--}}

        </ul>
    </div>
    <!-- END: Aside Menu -->
</div>
<!-- END: Left Aside -->
