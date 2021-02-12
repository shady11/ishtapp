@extends('web.layouts.app')

@section('title', 'BSC')

@section('styles')

@endsection

@section('content')
<section class="section">
    <div class="main">
        <div class="main-form">
            <form  method="GET" action="{{route('search')}}" ac class="form-search" role="search">
                @csrf
                <div class="menu-search">
                    <input type="text" name="search" placeholder="Что вы ищете?" autocomplete="off">
                </div>
                <button class="btn submit-search" type="submit" id="searchsubmit">
                    <i class="bx bx-search"></i>|<span>Искать</span>
                </button>
            </form>
        </div>
        <div class="main-img">
            <img src="{{asset('img/main.png')}}" alt="">
        </div>
    </div>
</section>
@include('web.home.faq')
<section class="section m-50">
    <div class="slide">
        <div class="row align-items-center slide-item-center justify-content-center">
            <div class="col-12 p-0">
                <div class="slide-items">
                    @foreach ($main_posts as $main)
                        <div class="slide-item">
                            <div class="container">
                                <div class="media row">
                                    <div class="align-self-center col-md-6">
                                        <div class="slide-item-image">
                                            @if ($main->getMedia('post_thumb')->last())
                                                <img src="{{asset($main->getMedia('post_thumb')->last()->getUrl('post_middle'))}}">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="media-body align-self-center col-md-6">
                                        <h4>{{$main->getTitle()}}</h4>
                                        <div class="slide-item-desc">{!! $main->getDesc() !!}</div>
                                        <a href="{{route('post.show', $main->id)}}" class="btn btn-more-white">Подробнее<i class='bx bx-right-arrow-alt' ></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="container">
                    <div class="slide-controls">
                        <div class="slide-controls-pagination">
                            <div class="d-flex">
                                <a href="#" class="btn btn-prev"><i class='bx bx-left-arrow-alt' ></i></a>
                                <a href="#" class="btn btn-next"><i class='bx bx-right-arrow-alt' ></i></a>
                            </div>
                        </div>
                        <div class="slide-controls-numbers">
                            <div class="appendDots"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide-img">
            <img src="{{asset('img/slide.png')}}">
        </div>
    </div>
</section>
@include('web.home.topics')
@include('web.home.resources')
@include('web.home.reviews')
@include('web.feedback.create')
@endsection

@section('scripts')
<script>
    @if (session('success-feedback'))
    $('#successModal').modal('show');
    @endif
    $('#post_loader').hide();
    $("#initiative").on("submit", function(){
        $("#post_loader").show();
    });
</script>
<script>
    $(document).ready(function() {

        $('.slide-items').slick({
            dots: true,
            infinite: false,
            rows: 1,
            lazyLoad:"progressive",
            speed:600,
            arrows:true,
            cssEase:"cubic-bezier(0.87, 0.03, 0.41, 0.9)",
            nextArrow: '.btn-next',
            prevArrow: '.btn-prev',
            appendDots: $('.appendDots'),
            customPaging : function(slider, i) {
                var thumb = $(slider.$slides[i]).data();
                return '<a>0'+(i+1)+'</a>';
            },
        });

        var sectionHeight = $('.popular-left-block').outerHeight();
        // $('.card-bw-img img').attr('style','height: '+(sectionHeight-30) +'px');
        $('.card-bw-img').attr('style','height: '+(sectionHeight-30)+'px');

        $('.review-items').slick({
            dots: true,
            infinite: false,
            rows: 1,
            lazyLoad:"progressive",
            speed:600,
            arrows:true,
            cssEase:"cubic-bezier(0.87, 0.03, 0.41, 0.9)",
            nextArrow: '.btn-next-2',
            prevArrow: '.btn-prev-2',
            appendDots: $('.reviewAppendDots')
        });
    });
</script>
@endsection
