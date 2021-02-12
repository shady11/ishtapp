<section class="section p-50 posts">
    <div class="container">
        <div class="d-flex align-items-center">
            <div class="section-title flex-grow-1">Истории. Аналитика.<span>Успешные кейсы. Бизнес темы.</span></div>
            <div class="section-title-right d-flex">
                <a href="{{route('topic.index')}}" class="btn btn-right"><i class='bx bx-right-arrow-alt' ></i> Все материалы</a>
                {{-- <a href="#" class="btn btn-left"><i class='bx bx-left-arrow-alt' ></i></a>
                <a href="#" class="btn btn-right"><i class='bx bx-right-arrow-alt' ></i></a> --}}
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="row">
                @foreach($topics as $topic)
                <div class="col-md-4">
                    <div class="card card-post">
                        <div class="card-top">
                            <a href="{{route('topic.show', $topic->id)}}" class="card-title">{{$topic->getName()}}</a>
                            <div class="card-desc">{!! $topic->getDesc() !!}</div>
                        </div>
                        <a href="{{route('topic.show', $topic->id)}}" class="card-img">
                            @if ($topic->getMedia('topic_thumb')->last())
                            <img class="img-fluid rounded" src="{{asset($topic->getMedia('topic_thumb')->last()->getUrl('topic_middle'))}}">
                            @endif
                        </a>
                    </div>
                </div>
                @endforeach


                <!--
                <div class="col-md-4">
                    <div class="card card-post">
                        <div class="card-top">
                            <a href="#" class="card-title">Ерболат Турлубеков, 32 года: ниша без конкурентов и 700 000 за одну сделку</a>
                            <div class="card-desc">Путь предпринимательства колюч и тернист. Особенно, если вы занимаетесь не тем, что вам действительно свойственно.</div>
                        </div>
                        <a href="#" class="card-img">
                            <img class="img-fluid" src="{{asset('img/post.png')}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-post">
                        <div class="card-top">
                            <a href="#" class="card-title">Юлия Сайфуллина, 30 лет: 2,7 млн на гимнастике для лица</a>
                            <div class="card-desc">«А что, так можно было?» — лейтмотив истории Юлии Сайфуллиной. Оказывается, можно заниматься любимым делом и зарабатывать миллионы. </div>
                        </div>
                        <a href="#" class="card-img">
                            <img class="img-fluid" src="{{asset('img/post1.png')}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-post">
                        <div class="card-top">
                            <a href="#" class="card-title">Сергей Липин, 40 лет: как желание казаться классным не давало расти</a>
                            <div class="card-desc">История Сергея о том, что для роста не всегда достаточно только инструментов. Умение бахнуть лидов, настроить трафик и грамотно</div>
                        </div>
                        <a href="#" class="card-img">
                            <img class="img-fluid" src="{{asset('img/post2.png')}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-post">
                        <div class="card-top">
                            <a href="#" class="card-title">Дмитрий Башмаков, 32 года: из сотрудника Макдоналдса в ВИП-тренера БМ </a>
                            <div class="card-desc">Я жил жизнью обычного парня. Так, как живёт большинство людей в нашей стране.</div>
                        </div>
                        <a href="#" class="card-img">
                            <img class="img-fluid" src="{{asset('img/post3.png')}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-post">
                        <div class="card-top">
                            <a href="#" class="card-title">Сергей Липин, 40 лет: как желание казаться классным не давало расти</a>
                            <div class="card-desc">История Сергея о том, что для роста не всегда достаточно только инструментов. Умение бахнуть лидов, настроить трафик и грамотно</div>
                        </div>
                        <a href="#" class="card-img">
                            <img class="img-fluid" src="{{asset('img/post2.png')}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-post">
                        <div class="card-top">
                            <a href="#" class="card-title">Юлия Сайфуллина, 30 лет: 2,7 млн на гимнастике для лица</a>
                            <div class="card-desc">«А что, так можно было?» — лейтмотив истории Юлии Сайфуллиной. Оказывается, можно заниматься любимым делом и зарабатывать миллионы. </div>
                        </div>
                        <a href="#" class="card-img">
                            <img class="img-fluid" src="{{asset('img/post1.png')}}" alt="">
                        </a>
                    </div>
                </div>
                -->
            </div>
        </div>
    </div>
</section>
