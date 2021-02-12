@foreach($rubrics as $rubric)
<div class="col-md-6">
    <div class="section-title flex-grow-1 mb-4">Рубрика.<span>Женское предпринимательство.</span></div>
    <div class="card card-bw">
        <div class="card-bw-info">
            <a href="#">{{$rubric->getName()}}</a>
        </div>
        <div class="card-bw-img">
            @if($rubric->cover)
                <img src="{{asset($rubric->cover_md)}}" alt="{{$rubric->getName()}}">
            @else
                <img src="{{ asset('img/businesswoman.png') }}">
            @endif
        </div>
    </div>
    {{-- <div class="section-title flex-grow-1">Просматриваемые страницы.<span>Популярные разделы.</span></div> --}}
</div>
@endforeach


<!--
<div class="col-md-6">
    <div class="section-title flex-grow-1 mb-4">Рубрика.<span>Женское предпринимательство.</span></div>
    <div class="card card-bw">
        <div class="card-bw-info">
            <a href="#">Развитие женского предпринимательства в КР. Что это и чего уже добились?</a>
        </div>
        <div class="card-bw-img">
            <img src="{{ asset('img/businesswoman.png') }}">
        </div>
    </div>
    {{-- <div class="section-title flex-grow-1">Просматриваемые страницы.<span>Популярные разделы.</span></div> --}}
</div>
-->
