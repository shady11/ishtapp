<section class="section feedback" id="feedback">
    <div class="container feedback-text">
        <div class="row align-items-center slide-item-center justify-content-center">
            <div class="col-md-6">
                <div class="section-title white-color">Обратная связь.<span class="white-color">Оставайтесь на связи.</span></div>
                <div class="feedback-desc mt-4">
                    Любые вопросы можно задать нам через форму
                    обратной связи. Мы ответим намного быстрее
                    (15 минут в рабочее время), если для общения
                    со Службой Поддержки вы используете
                    внутренний чат Сервиса. Для этого вам
                    необходимо предварительно
                    зарегистрироваться и/или авторизоваться.
                </div>
            </div>
            <div class="col-md-6">
                <div class="feedback-form">
                    <form action="{{ route('feedback.store') }}" method="POST" id="feedback" enctype="multipart/form-data" novalidate>
                        @csrf
                        <input type="hidden" name="lang" value="{{app()->getLocale()}}">
                        <div class="form-group">
                            <textarea class="form-control{{ $errors->has('desc') ? ' is-invalid' : '' }}" id="desc" name="desc" rows="5" placeholder="Ваш вопрос" required> {{ old('desc') }}</textarea>
                            @if ($errors->has('desc'))
                                <div class="invalid-feedback pl-3">
                                    {{ $errors->first('desc') }}
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
                        <button type="submit" class="btn btn-send">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
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
    <div class="feedback-img">
        <img src="{{asset('img/feedback.png')}}">
    </div>
</section>
