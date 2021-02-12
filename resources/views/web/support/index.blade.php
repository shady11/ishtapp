@extends('web.layouts.app')

@section('title', 'Господдержка')

@section('styles')

@endsection

@section('breadcrumbs')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page">
                <a href="{{route('web')}}"><i class='bx bx-home'></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Господдержка</li>
        </ol>
    </nav>
</div>
@endsection

@section('content')
<section class="section faq">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <aside class="sidebar">
                    <h5>Часто задаваемые вопросы</h5>
                    <ul class="list-unstyled">
                        @foreach ($rows as $rower)
                            <li><a href="{{route('faq.show', $rower->id)}}">{{$rower->getName()}}</a></li>
                        @endforeach
                    </ul>
                </aside>
            </div>
            <div class="col-md-9">
                <div class="section-title mb-4"><span>Господдержка</span></div>
                <div class="section-body">
                    <div class="accordion" id="accordion">
                        @foreach($row as $support)
                        <div class="card">
                            <div class="card-header" data-toggle="collapse" data-target="#collapse{{$support->id}}" aria-expanded="false" aria-controls="{{$support->id}}">
                                <span>{!! $support->id !!}</span> {!! $support->getName()!!}
                            </div>

                            <div id="collapse{{$support->id}}" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    {!!$support->getContent() !!}
                                </div>
                            </div>
                        </div>
                        @endforeach


                        <!--
                        <div class="card">
                            <div class="card-header" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <span>1</span> Мораторий на проверки
                            </div>

                            <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                <div class="card-body">
                                    <p>Правительство КР с 1 января 2019 года вводит мораторий на проведение проверок субъектов предпринимательства, сообщила пресс-служба кабмина.</p>

                                    <p>Премьер-министр Мухаммедкалый Абылгазиев подписал постановление и провел совещание по этому вопросу.</p>

                                    <p>Он отметил, что мораторий будет действовать до 1 января 2021 года.</p>

                                    <p>Министр экономики Олег Панкратов пояснил, что с внедрением информационных технологий механизмы взаимодействия между государством и бизнесом меняются как юридически, так и технически.</p>

                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header collapsed" data-toggle="collapse" data-target="#collapseOtwo" aria-expanded="false" aria-controls="collapseOtwo">
                                <span>2</span> Преференциальные зоны
                            </div>

                            <div id="collapseOtwo" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur voluptatibus ea adipisci quas sapiente pariatur illum nulla consectetur illo perspiciatis! Voluptatum quam quidem perspiciatis dignissimos accusantium cupiditate nulla veritatis nemo!
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <span>3</span> Бизнес-омбудсмен
                            </div>

                            <div id="collapseThree" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur voluptatibus ea adipisci quas sapiente pariatur illum nulla consectetur illo perspiciatis! Voluptatum quam quidem perspiciatis dignissimos accusantium cupiditate nulla veritatis nemo!
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                <span>4</span> «Экспорт» и Продвижение товаров и услуг на зарубежных рынках
                            </div>

                            <div id="collapseFour" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur voluptatibus ea adipisci quas sapiente pariatur illum nulla consectetur illo perspiciatis! Voluptatum quam quidem perspiciatis dignissimos accusantium cupiditate nulla veritatis nemo!
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                <span>5</span> Помощь в подготовке ТЭО
                            </div>

                            <div id="collapseFive" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur voluptatibus ea adipisci quas sapiente pariatur illum nulla consectetur illo perspiciatis! Voluptatum quam quidem perspiciatis dignissimos accusantium cupiditate nulla veritatis nemo!
                                </div>
                            </div>
                        </div>
                        -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')

@endsection
