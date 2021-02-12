<section class="section footer p-50">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="footer-info">
                    <a class="navbar-brand" href="{{route('web')}}">
                        <img src="{{asset($main->getLogo())}}">
                        <div class="navbar-brand-text">{!!$main->getName()!!}</div>
                    </a>
                    <div class="footer-desc">
                        {{$main->getDesc()}}
                    </div>
                    <div class="footer-buttons">
                        <a class="btn btn--ios" href="#">
                                <svg class="btn__icon btn__icon--apple" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                preserveAspectRatio="xMidYMid"
                                viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M17.5640259,13.8623047
                            c-0.4133301,0.9155273-0.6115723,1.3251343-1.1437988,2.1346436c-0.7424927,1.1303711-1.7894897,2.5380249-3.086853,2.5500488
                            c-1.1524048,0.0109253-1.4483032-0.749939-3.0129395-0.741333c-1.5640259,0.008606-1.8909302,0.755127-3.0438843,0.7442017
                            c-1.296814-0.0120239-2.2891235-1.2833252-3.0321655-2.4136963c-2.0770874-3.1607666-2.2941895-6.8709106-1.0131836-8.8428955
                            c0.9106445-1.4013062,2.3466187-2.2217407,3.6970215-2.2217407c1.375,0,2.239502,0.7539673,3.3761597,0.7539673
                            c1.1028442,0,1.7749023-0.755127,3.3641357-0.755127c1.201416,0,2.4744263,0.6542969,3.3816528,1.7846069
                            C14.0778809,8.4837646,14.5608521,12.7279663,17.5640259,13.8623047z M12.4625244,3.8076782
                            c0.5775146-0.741333,1.0163574-1.7880859,0.8571167-2.857666c-0.9436035,0.0653076-2.0470581,0.6651611-2.6912842,1.4477539	C10.0437012,3.107605,9.56073,4.1605835,9.7486572,5.1849365C10.7787476,5.2164917,11.8443604,4.6011963,12.4625244,3.8076782z"/>
                                </svg>
                                <span class="btn__text">Загрузите в</span>
                                <span class="btn__storename">App Store</span>
                        </a>
                        <a class="btn btn--android" href="#">
                            <svg class="btn__icon btn__icon--google" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            preserveAspectRatio="xMidYMid"
                            viewBox="0 0 20 20">
                                <path d="M4.942627,18.0508423l7.6660156-4.3273926l-1.6452026-1.8234253L4.942627,18.0508423z M2.1422119,2.1231079
                        C2.0543823,2.281311,2,2.4631958,2,2.664917v15.1259766c0,0.2799683,0.1046143,0.5202026,0.2631226,0.710144l7.6265259-7.7912598
                        L2.1422119,2.1231079z M17.4795532,9.4819336l-2.6724854-1.508606l-2.72229,2.7811279l1.9516602,2.1630249l3.4431152-1.9436035
                        C17.7927856,10.8155518,17.9656372,10.5287476,18,10.2279053C17.9656372,9.927063,17.7927856,9.6402588,17.4795532,9.4819336z
                            M13.3649292,7.1592407L4.1452026,1.954834l6.8656616,7.609314L13.3649292,7.1592407z"/>
                            </svg>
                            <span class="btn__text">Доступно в</span>
                            <span class="btn__storename">Google Play</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer-title">Навигация</div>
                <ul class="list-unstyled footer-list">
                    @foreach ($top_menus as $top_menu)
                        <li>
                            <a href="{{route('page.index', $top_menu['link'])}}">@if($locale == 'ky') {{$top_menu['label']}} @elseif($locale == 'ru'){{$top_menu['labelRu']}} @else {{$top_menu['labelEn']}} @endif</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-3">
                <div class="footer-title">Ссылки</div>
                <ul class="list-unstyled footer-list">
                    <li><a href="//mineconom.gov.kg" target="_blank">Министерство Экономики Кыргызской Республики</a></li>
                    <li><a href="//invest.gov.kg" target="_blank">Инвестиционный портал Кыргызской Республики</a></li>
                    <li><a href="//proverka.gov.kg/" target="_blank">proverka.gov.kg</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <div class="footer-title">Наши контакты</div>
                <ul class="list-unstyled footer-list">
                    {!! $main->getContacts() !!}
                </ul>
                <ul class="navbar-nav">
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
                </ul>
            </div>
            <div class="col-12">
                <div class="footer-line"></div>
                <div class="footer-copyright">
                    {{ $main->getCopyright() }}
                </div>
            </div>
        </div>
    </div>
</section>
