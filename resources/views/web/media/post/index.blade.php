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
            <li class="breadcrumb-item active" aria-current="page">Новости</li>
        </ol>
    </nav>
</div>
@endsection

@section('content')
<section class="section posts">
    <div class="container">
        <div class="d-flex align-items-center">
            <div class="section-title flex-grow-1">Новости</div>
        </div>
        <div class="section-body mt-4">
            <div class="row">
                @foreach($rows as $post)
                <div class="col-md-4">
                    <div class="card card-post">
                        <div class="card-top">
                            <a href="{{route('post.show', $post->id)}}" class="card-title">{{$post->getTitle()}}</a>
                            <div class="card-desc">{!! $post->getDesc() !!}</div>
                        </div>
                        <a href="{{route('post.show', $post->id)}}" class="card-img">
                            @if ($post->getMedia('post_thumb')->last())
                            <img class="img-fluid rounded" src="{{asset($post->getMedia('post_thumb')->last()->getUrl('post_middle'))}}">
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
