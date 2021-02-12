<nav class="navbar navbar-expand navbar-top">
    <div class="container">
        <div id="hamburger-menu" class="hamburger">
            <i class='bx bx-menu-alt-left'></i>
        </div>
        <a class="navbar-brand" href="{{route('web')}}">
            <img src="{{asset($main->getLogo())}}">
            <div class="navbar-brand-text">{!! $main->getName() !!}</div>
        </a>
        <div id="left-nav">
            <div id="left-nav-close"><i class='bx bx-x'></i></div>
            <div class="d-flex justify-content-md-end align-items-center left-nav-left">
                <nav class="nav nav-locale">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li class="nav-item @if($localeCode == LaravelLocalization::getCurrentLocale()) active @endif">
                            <a rel="alternate" class="nav-link" reflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $localeCode }}
                            </a>
                        </li>
                    @endforeach
                </nav>
            </div>
            <div class="d-flex justify-content-md-end left-nav-right">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item nav-social">
                        <ul class="list-unstyled">
                            @foreach ($main->socials as $m_soc)
                            <li>
                                <a href="{!! $m_soc['s_link'] !!}">{!! $m_soc['s_icon'] !!}</a>
                            </li>
                            @endforeach
                        </ul>
                        <span>Мы в соц. сетях</span>
                    </li>
                    <li class="nav-item nav-phone">
                        <div class="d-table-cell align-middle nav-phone-icon">
                            <i class='bx bxl-whatsapp'></i>
                        </div>
                        <div class="d-table-cell align-middle">
                            <a href="//api.whatsapp.com/send?phone=996776100504" class="nav-phone-text">{{$main->consult}}</a>
                            <div class="nav-phone-desc"><a href="//api.whatsapp.com/send?phone=996776100504">Прямые консультации</a></div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-nav" href="/feedback">Оставить заявку<i class='bx bx-right-arrow-alt' ></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div id="user-menu" class="user-menu">
            <i class='bx bx-menu-alt-right'></i>
        </div>
    </div>
</nav>
<header class="header sticky-top">
    <div class="container">
        <div id="right-nav">
            <div id="right-nav-close"><i class='bx bx-x'></i></div>
            <ul class="nav justify-content-center navbar-bottom">
                @foreach ($top_menus as $top_menu)
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('page.index', $top_menu['link'])}}">@if($locale == 'ky') {{$top_menu['label']}} @elseif($locale == 'ru'){{$top_menu['labelRu']}} @else {{$top_menu['labelEn']}} @endif</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</header>
<div id="shadow-layer-left"></div>
<div id="shadow-layer-right"></div>
