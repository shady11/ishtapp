@extends('web.layouts.app')

@section('title', $row->getTitle())

@section('styles')
    <meta property="og:url"                content="{{ Request::url()}}" />
    <meta property="og:site_name"          content="Религия" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="{{ $row->getTitle()}}" />
    <meta property="og:description"        content="{{ $row->getDesc() }}" />
    <meta property="og:image"              content="{{asset($row->getMedia('post_thumb')->last()->getUrl('post_middle'))}}" />

    <link async rel="stylesheet" href="{{ asset('css/lightslider.min.css') }}">
    <link async rel="stylesheet" href="{{ asset('css/lightgallery.min.css') }}">
@endsection

@section('breadcrumbs')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page">
                <a href="{{route('web')}}"><i class='bx bx-home'></i></a>
            </li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{route('post.index')}}">Новости</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$row->getTitle()}}</li>
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
                    <h5>Главные новсти</h5>
                    <ul class="list-unstyled">
                        @foreach ($rows as $rower)
                        <li><a href="{{route('post.show', $rower->id)}}">{{$rower->getTitle()}}</a></li>                        
                        @endforeach
                    </ul>
                </aside>
            </div>
            <div class="col-md-9">
                <div class="section-title mb-4"><span>{{$row->getTitle()}}</span></div>
                <div class="section-body">
                    @isset($row->video)
                        <div class="embed-responsive embed-responsive-16by9 mb-4">
                            <iframe class="embed-responsive-item" src="//www.youtube.com/embed/{{ $row->video }}?rel=0&amp;showinfo=0" allowfullscreen></iframe>
                        </div>
                    @endisset
                    <article class="post-content">
                        {!! $row->getContent() !!}
                    </article>
                    <ul id="imageGallery">
                        @foreach ($row->getMedia('post_gallery') as $media)
                            <li data-thumb="{{asset($media->getUrl('post_gallery_thumb'))}}" data-src="{{asset($media->getUrl('post_gallery_thumb'))}}">
                                <img class="resizegallery img-fluid" src="{{asset($media->getUrl('post_gallery_thumb'))}}" />
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>        
    </div>
</section>
@endsection

@section('scripts')
<script src="{{ asset('js/lightgallery/lightslider.min.js') }}"></script>
<script src="{{ asset('js/lightgallery/lightgallery-all.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#imageGallery').lightSlider({
            gallery:true,
            item:1 ,
            loop:true,
            thumbItem:5,
            enableDrag: true,
            onSliderLoad: function(el) {
                el.lightGallery({
                    selector: '#imageGallery .lslide',
                    download:true,
                    share: false,
                    actualSize: false,
                    autoplayControls:false,
                });
            }
        });

        $('#lightgallery img').each(function() {  
            imgsrc = this.src;
            var img = $(this);
            img.attr("data-src", function () { 
                return img.attr("src"); 
            });
        });

        $("#lightgallery").lightGallery({
            selector: '.fr-fic',
            thumbnail:false,
        });
    });
</script>
@endsection
