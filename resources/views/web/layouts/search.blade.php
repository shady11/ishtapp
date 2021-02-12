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
            <li class="breadcrumb-item active" aria-current="page">Поиск</li>
        </ol>
    </nav>
</div>
@endsection

@section('content')
<section class="section posts">
    <div class="container">
        <div class="d-flex align-items-center">
            <div class="section-title flex-grow-1">Результаты поиска по запросу - <span class="d-inline-block">{{$key}}</span></div>
        </div>
        <div class="section-body mt-4">
            <div class="section-title mb-4"><span>Новости</span></div>
            <div class="row">
                @foreach($posts as $post)
                <div class="col-md-4">
                    <div class="card card-post">
                        <div class="card-top">
                            <a href="{{route('post.show', $post['id'])}}" class="card-title">{{$post['title_lang']}}</a>
                            <div class="card-desc">{!! $post['title_desc'] !!}</div>
                        </div>
                        {{-- <a href="{{route('post.show', $post['id'])}}" class="card-img">
                            {!! $post['title_img'] !!}                            
                        </a> --}}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="section-body mt-4 blocks">
            <div class="section-title mb-4">Ответы на <span>часто задаваемые вопросы</span></div>
            <div class="row">
                @foreach($faqs as $faq)
                <div class="col-md-3">
                    <a href="{{route('faq.show', $faq['id'])}}" class="
                    @if($loop->index >= 4 && $loop->index <= 7)
                        @if($loop->even)card card-block-primary 
                        @else card card-block-second @endif
                    @else
                        @if($loop->odd)card card-block-primary 
                        @else card card-block-second @endif
                    @endif
                    ">
                        <div class="card-center">
                            {!! $faq['icon'] !!}
                            <div class="card-title">{{$faq['title_lang']}}</div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        <div class="section-body mt-4 blocks">
            <div class="section-title mb-4">Истории. Аналитика.<span>Успешные кейсы. Бизнес темы.</span></div>
            <div class="row">
                @foreach($topics as $topic)
                <div class="col-md-4">
                    <div class="card card-post">
                        <div class="card-top">
                            <a href="{{route('topic.show', $topic['id'])}}" class="card-title">{{$topic['title_lang']}}</a>
                            <div class="card-desc">{!! $topic['title_desc'] !!}</div>
                        </div>
                        {{-- <a href="{{route('topic.show', $topic['id'])}}" class="card-img">
                            {!! $post['title_img'] !!} 
                        </a> --}}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')

@endsection
