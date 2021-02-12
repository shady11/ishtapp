@extends('web.layouts.app')

@section('title', 'BSC')

@section('styles')

@endsection

@section('breadcrumbs')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page">
                <a href="{{route('web')}}"><i class='bx bx-home'></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('faq.index')}}">Часто задаваемые вопросы</a></li>
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
                        @foreach ($rows as $left)
                        <li><a href="{{route('faq.show', $left->id)}}">{{$left->getName()}}</a></li>                        
                        @endforeach
                    </ul>
                </aside>
            </div>
            <div class="col-md-9">
                <div class="section-title mb-4"><span>{{$row->getName()}}</span></div>
                <div class="section-body">
                    <article class="post-content">
                        {!! $row->getContent() !!}
                    </article> 
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-md-3">
                <a href="#" class="card card-block-primary">
                    <div class="card-center">
                        <i class='bx bx-task'></i>
                        <div class="card-title">Лицензии и разрешения</div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="#" class="card card-block-second">
                    <div class="card-center">
                        <i class='bx bx-briefcase' ></i>
                        <div class="card-title">Как зарегистрировать бизнес?</div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="#" class="card card-block-primary">
                    <div class="card-center">
                        <i class='bx bx-analyse'></i>
                        <div class="card-title">Консультации специалистов</div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="#" class="card card-block-second">
                    <div class="card-center">
                        <i class='bx bx-briefcase-alt' ></i>
                        <div class="card-title">Доступ к финансам</div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="#" class="card card-block-second">
                    <div class="card-center">
                        <i class='bx bx-right-top-arrow-circle' ></i>
                        <div class="card-title">Экспорт</div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="#" class="card card-block-primary">
                    <div class="card-center">
                        <i class='bx bx-spreadsheet'></i>
                        <div class="card-title">Реестр консультантов</div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="#" class="card card-block-second">
                    <div class="card-center">
                        <i class='bx bx-edit' ></i>
                        <div class="card-title">Как написать бизнес-план?</div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="#" class="card card-block-primary">
                    <div class="card-center">
                        <i class='bx bx-pie-chart-alt-2'></i>
                        <div class="card-title">Бизнес инкубаторы</div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="#" class="card card-block-primary">
                    <div class="card-center">
                        <i class='bx bx-git-branch'></i>
                        <div class="card-title">Новые технологии</div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="#" class="card card-block-second">
                    <div class="card-center">
                        <i class='bx bx-map-alt' ></i>
                        <div class="card-title">НПА, регулирующие бизнес</div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="#" class="card card-block-primary">
                    <div class="card-center">
                        <i class='bx bx-analyse'></i>
                        <div class="card-title">Консультации специалистов</div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="#" class="card card-block-second">
                    <div class="card-center">
                        <i class='bx bx-briefcase-alt' ></i>
                        <div class="card-title">Доступ к финансам</div>
                    </div>
                </a>
            </div>
        </div> --}}
    </div>
</section>
@endsection

@section('scripts')

@endsection
