<section class="section p-50 popular">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="section-title flex-grow-1 mb-4">Полезные ресурсы.<span>Актульная информация.</span></div>
                <div class="row blocks popular-left-block">
                    @foreach($resources as $resource)
                    <div class="col-md-6">
                        <a href="{{route('resource.show', $resource->id)}}" class="
                        @if($loop->index >= 2)
                            @if($loop->odd)card card-block-primary
                            @else card card-block-second
                            @endif
                        @else
                            @if($loop->even)card card-block-primary
                            @else card card-block-second
                            @endif
                        @endif
                        ">
                            <div class="card-center">
                                {!! $resource->icon !!}
                                <div class="card-title">{{$resource->getName()}}</div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6">
                <div class="section-title flex-grow-1 mb-4">Рубрика.<span>Женское предпринимательство.</span></div>
                @if($woman_post)
                <div class="card card-bw">
                    <div class="card-bw-info">
                        <a href="{{route('post.show', $woman_post->id)}}">{{$woman_post->posts->first()->getTitle()}}</a>
                    </div>
                    <div class="card-bw-img">
                        @if ($woman_post->posts->first()->getMedia('post_thumb')->last())
                        <img class="img-fluid rounded" src="{{asset($woman_post->posts->first()->getMedia('post_thumb')->last()->getUrl('post_middle'))}}">
                        @endif
                    </div>
                </div>
                @endif
                {{-- <div class="section-title flex-grow-1">Просматриваемые страницы.<span>Популярные разделы.</span></div> --}}
            </div>
        </div>
    </div>
</section>
