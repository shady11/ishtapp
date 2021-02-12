@extends('web.layouts.app')

@section('title', '«Мероприятия»')

@section('styles')

@endsection

@section('breadcrumbs')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page">
                <a href="{{route('web')}}"><i class='bx bx-home'></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">«Мероприятия»</li>
        </ol>
    </nav>
</div>
@endsection

@section('content')
<section class="section faq">
    <div class="container">
        <div class="event">
            <div class="col-md-3">
                <aside class="sidebar">
                    <h5>Категории</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Курсы</a></li>
                        <li><a href="#">Тренинги</a></li>
                    </ul>
                </aside>
            </div>
            <div class="col-md-9">
                <div class="section-title mb-4"><span>«Мероприятия»</span></div>
                <div class="section-body">
                    <ul class="list-unstyled events-ul">
                        @foreach($rows as $rower)
                        <li class="media">
                            <div class="media-img">
                                @if ($rower->getMedia('rower_thumb')->last())
                                <img src="{{asset($rower->getMedia('rower_thumb')->last()->getUrl('rower_middle'))}}" class="align-self-center mr-3">
                                @endif
                            </div>
                            <div class="media-body media-center align-self-center">
                                <h6>{{$rower->getName()}}</h6>
                                <div class="media-author">{{$rower->getSpeaker()}}</div>
                                <ul class="list-unstyled media-info">
                                    <li>{{$rower->getCreatedDate()}}</li>
                                    <li>{{$rower->getCreatedTime()}}</li>
                                    <li>{{$rower->getPlace()}}</li>
                                </ul>
                            </div>
                            <div class="media-body media-end align-self-center text-right">
                                <a href="{{route('event.show', $rower->id)}}" class="btn btn-more-border">Подробнее</a>
                            </div>
                        </li>
                        @endforeach




                        <!--
                        <li class="media">
                            <div class="media-img">
                                <img src="{{asset('img/5.png')}}" class="align-self-center mr-3">
                            </div>
                            <div class="media-body media-center align-self-center">
                                <h6>Мастер-класс «Искусство инвестирования»</h6>
                                <div class="media-author">Сыдыков Бауыржан Турсынович</div>
                                <ul class="list-unstyled media-info">
                                    <li>19 сентября 2019г.</li>
                                    <li>14:00.</li>
                                    <li>Отель «Орион Бишкек».</li>
                                </ul>
                            </div>
                            <div class="media-body media-end align-self-center text-right">
                                <a href="#" class="btn btn-more-border">Подробнее</a>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-img">
                                <img src="{{asset('img/6.png')}}" class="align-self-center mr-3">
                            </div>
                            <div class="media-body media-center align-self-center">
                                <h6>Бизнес-встреча с предпринимателями Свердловской области РФ.</h6>
                                <ul class="list-unstyled media-info">
                                    <li>16-17 сентября 2019г.</li>
                                    <li>14:00.</li>
                                    <li>Отель «Орион Бишкек».</li>
                                </ul>
                            </div>
                            <div class="media-body media-end align-self-center text-right">
                                <a href="#" class="btn btn-more-border">Подробнее</a>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-img">
                                <img src="{{asset('img/7.png')}}" class="align-self-center mr-3">
                            </div>
                            <div class="media-body media-center align-self-center">
                                <h6>Международная конференция «SSB-2019»: Цифровая трансформация безопасности. Экономика и эффективность.</h6>
                                <ul class="list-unstyled media-info">
                                    <li>10-11 сентября 2019г.</li>
                                    <li>14:00.</li>
                                    <li>г.Бишкек.</li>
                                </ul>
                            </div>
                            <div class="media-body media-end align-self-center text-right">
                                <a href="#" class="btn btn-more-border">Подробнее</a>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-img">
                                <img src="{{asset('img/5.png')}}" class="align-self-center mr-3">
                            </div>
                            <div class="media-body media-center align-self-center">
                                <h6>Мастер-класс «Искусство инвестирования»</h6>
                                <div class="media-author">Сыдыков Бауыржан Турсынович</div>
                                <ul class="list-unstyled media-info">
                                    <li>19 сентября 2019г.</li>
                                    <li>14:00.</li>
                                    <li>Отель «Орион Бишкек».</li>
                                </ul>
                            </div>
                            <div class="media-body media-end align-self-center text-right">
                                <a href="#" class="btn btn-more-border">Подробнее</a>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-img">
                                <img src="{{asset('img/6.png')}}" class="align-self-center mr-3">
                            </div>
                            <div class="media-body media-center align-self-center">
                                <h6>Бизнес-встреча с предпринимателями Свердловской области РФ.</h6>
                                <ul class="list-unstyled media-info">
                                    <li>16-17 сентября 2019г.</li>
                                    <li>14:00.</li>
                                    <li>Отель «Орион Бишкек».</li>
                                </ul>
                            </div>
                            <div class="media-body media-end align-self-center text-right">
                                <a href="#" class="btn btn-more-border">Подробнее</a>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-img">
                                <img src="{{asset('img/7.png')}}" class="align-self-center mr-3">
                            </div>
                            <div class="media-body media-center align-self-center">
                                <h6>Международная конференция «SSB-2019»: Цифровая трансформация безопасности. Экономика и эффективность.</h6>
                                <ul class="list-unstyled media-info">
                                    <li>10-11 сентября 2019г.</li>
                                    <li>14:00.</li>
                                    <li>г.Бишкек.</li>
                                </ul>
                            </div>
                            <div class="media-body media-end align-self-center text-right">
                                <a href="#" class="btn btn-more-border">Подробнее</a>
                            </div>
                        </li>
                        -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')

@endsection
