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
            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('topic.index')}}">Истории. Аналитика.<span>Успешные кейсы. Бизнес темы.</a></li>
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
                    <h5>Истории</h5>
                    <ul class="list-unstyled">
                        @foreach ($rows as $rower)
                        <li><a href="{{route('topic.show', $rower->id)}}">{{$rower->getName()}}</a></li>
                        @endforeach
                    </ul>
                </aside>
            </div>
            <div class="col-md-9">
                <div class="section-title mb-4"><span>{{$row->getName()}}</span></div>
                <div class="section-body">
                    @if ($row->getMedia('topic_thumb')->last())
                        <img class="img-fluid rounded" src="{{asset($row->getMedia('topic_thumb')->last()->getUrl('topic_middle'))}}">
                    @endif
                    <br><br>
                    <article class="post-content">
                        {!! $row->getContent() !!}
                    </article>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')

@endsection
