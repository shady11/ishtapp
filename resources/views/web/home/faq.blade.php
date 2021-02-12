<section class="section p-50 blocks">
    <div class="container">
        <div class="section-title mb-4">Ответы на <span>часто задаваемые вопросы</span></div>
        <div class="row">
            @foreach($questions as $question)
            <div class="col-md-3">
                <a href="{{route('faq.show', $question->id)}}" class="
                @if($loop->index >= 4 && $loop->index <= 7)
                    @if($loop->even)card card-block-primary 
                    @else card card-block-second @endif
                @else
                    @if($loop->odd)card card-block-primary 
                    @else card card-block-second @endif
                @endif
                ">
                    <div class="card-center">
                        {!! $question->icon !!}
                        <div class="card-title">{{$question->getName()}}</div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
