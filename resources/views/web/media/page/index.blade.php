@extends('web.layouts.app')

@section('title', $row->getName())

@section('styles')

@endsection

@section('breadcrumbs')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page">
                <a href="{{route('web')}}"><i class='bx bx-home'></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{$row->getName()}}</li>
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
                        @foreach ($fags as $fag)
                        <li><a href="{{route('faq.show', $fag->id)}}">{{$fag->getName()}}</a></li>                        
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
                @if($row->slug == 'feedback')
                        <div class="form-group">
                            <form action="{{ route('feedback.store') }}" method="POST" id="feedback" enctype="multipart/form-data" novalidate>
                                @csrf
                                <input type="hidden" name="lang" value="{{app()->getLocale()}}">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class='bx bx-user-circle' ></i></div>
                                    </div>
                                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Ваше имя" id="name" name="name" value="{{ old('name') }}" required>
                                    @if ($errors->has('name'))
                                        <div class="invalid-feedback pl-3">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class='bx bx-mail-send'></i></div>
                                    </div>
                                    <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Ваш электронный адрес" id="email" name="email" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                        <div class="invalid-feedback pl-3">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control{{ $errors->has('desc') ? ' is-invalid' : '' }}" id="desc" name="desc" rows="5" placeholder="Ваш вопрос" required> {{ old('desc') }}</textarea>
                                    @if ($errors->has('desc'))
                                        <div class="invalid-feedback pl-3">
                                            {{ $errors->first('desc') }}
                                        </div>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary">Отправить</button>
                            </form>
                        </div>
        @if (session('success-feedback'))
            <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Успех!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Сообщение отправлена</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @endif
            </div>

        </div>
    </div>
</section>
@endsection

@section('scripts')

@endsection
