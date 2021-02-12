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
            <li class="breadcrumb-item active" aria-current="page">Истории. Аналитика.<span>Успешные кейсы. Бизнес темы.</span></li>
        </ol>
    </nav>
</div>
@endsection

@section('content')
<section class="section posts">
    <div class="container">
        <div class="d-flex align-items-center">
            <div class="section-title flex-grow-1">Истории. Аналитика.<span>Успешные кейсы. Бизнес темы.</span></div>
        </div>
        <div class="section-body mt-4">
            <div class="row">
                @foreach($rows as $topic)
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
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')

@endsection
