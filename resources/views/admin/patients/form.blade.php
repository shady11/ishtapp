<div class="m-portlet__body">
    @if(session('error'))
        <div class="bs-example">
            <!-- Error Alert -->
            <div class="alert alert-danger">
                <strong>Error!</strong> {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        </div>
    @endif
    <div class="form-group m-form__group row">

        <div class="col-lg-3 form-group">

            <label class="m-form__group__label">
                Имя пользователя :
            </label>
            {!! Form::text('username', null, ['class' => 'form-control m-input']) !!}
            @if ($errors->has('username'))
                <div class="has-error">
                    <span class="help-block">{{ $errors->first('username') }}</span>
                </div>
            @endif
        </div>
        @if(!$patient->id)
        <div class="col-lg-2">
            <label class="m-form__group__label">
                Пароль :
            </label>
            {!! Form::password('password', null, ['class' => 'form-control m-input']) !!}
            @if ($errors->has('password'))
                <div class="has-error">
                    <span class="help-block">{{ $errors->first('password') }}</span>
                </div>
            @endif
        </div>
        @endif
        <div class="col-lg-2">
            <label class="m-form__group__label">
                Пин-код :
            </label>
            {!! Form::text('pin_kod', null, ['class' => 'form-control m-input']) !!}
            @if ($errors->has('pin_kod'))
                <div class="has-error">
                    <span class="help-block">{{ $errors->first('pin_kod') }}</span>
                </div>
            @endif
        </div>
    </div>
    <div class="form-group m-form__group row">
        <div class="col-lg-5">
            <label class="m-form__group__label">
                Вопрос-1 :
                {{--                {{ $patient->userquestion(17) }}--}}
            </label>
            <select name="question1_id" id="categor" class="form-control">
                <option class="placeholder" selected disabled value="">Выберите вопрос</option>
                @if($patient->id)
                    @foreach($patient->userquestions() as $userquestion)
                        @if($patient->userquestion($patient->question1_id)==$userquestion)
                            <option value={{$userquestion->id}} selected>{{$userquestion->name_ru}}</option>
                        @else
                            <option value={{$userquestion->id}}>{{$userquestion->name_ru}}</option>
                        @endif
                    @endforeach
                @else
                    @foreach($patient->userquestions() as $userquestion)
                        <option value={{$userquestion->id}}>{{$userquestion->name_ru}}</option>
                    @endforeach
                @endif
            </select>
            @if ($errors->has('question1_id'))
                <div class="has-error">
                    <span class="help-block">{{ $errors->first('question1_id') }}</span>
                </div>
            @endif
        </div>
        <div class="col-lg-5">
            <label class="m-form__group__label">
                Ответ-1 :
            </label>
            {!! Form::text('answer1', null, ['class' => 'form-control m-input']) !!}
            @if ($errors->has('answer1'))
                <div class="has-error">
                    <span class="help-block">{{ $errors->first('answer1') }}</span>
                </div>
            @endif
        </div>
        <div class="col-lg-5">
            <label class="m-form__group__label">
                Вопрос-2 :
            </label>
            <select name="question2_id" id="categor" class="form-control">
                <option class="placeholder" selected disabled value="">Выберите вопрос</option>
                @if($patient->id)
                    @foreach($patient->userquestions() as $userquestion)
                        @if($patient->userquestion($patient->question2_id)==$userquestion)
                            <option value={{$userquestion->id}} selected>{{$userquestion->name_ru}}</option>
                        @else
                            <option value={{$userquestion->id}}>{{$userquestion->name_ru}}</option>
                        @endif
                    @endforeach
                @else
                    @foreach($patient->userquestions() as $userquestion)
                        <option value={{$userquestion->id}}>{{$userquestion->name_ru}}</option>
                    @endforeach
                @endif
            </select>
            @if ($errors->has('question2_id'))
                <div class="has-error">
                    <span class="help-block">{{ $errors->first('question2_id') }}</span>
                </div>
            @endif
        </div>
        <div class="col-lg-5">
            <label class="m-form__group__label">
                Ответ-2 :
            </label>
            {!! Form::text('answer2', null,['class' => 'form-control m-input']) !!}
            @if ($errors->has('answer2'))
                <div class="has-error">
                    <span class="help-block">{{ $errors->first('answer2') }}</span>
                </div>
            @endif
        </div>

    </div>
    @if(empty($questionnaire)==false)
        <h4 style="margin: 10px;">
            Для Статистика
        </h4>
        <div class="form-group m-form__group row">
            <div class="col-lg-2">
                <label class="m-form__group__label">
                    Пол :
                </label>
                <select name="sex_id" id="categor" class="form-control">
                    <option class="placeholder" selected disabled value="">Выберите пол</option>
                    @foreach($questionnaire->sexes() as $sex)
                        <option value={{$sex->id}}>{{$sex->sex_ru}}</option>
                    @endforeach
                </select>
                @if ($errors->has('sex_id'))
                    <div class="has-error">
                        <span class="help-block">{{ $errors->first('sex_id') }}</span>
                    </div>
                @endif
            </div>
            <div class="col-lg-1">
                <label class="m-form__group__label">
                    интерсекс :
                </label>
                {!! Form::checkbox('intersex') !!}
                @if ($errors->has('intersex'))
                    <div class="has-error">
                        <span class="help-block">{{ $errors->first('intersex') }}</span>
                    </div>
                @endif
            </div>
            <div class="col-lg-2">
                <label class="m-form__group__label">
                    Гендер :
                </label>
                <select name="gender_id" id="categor" class="form-control">
                    <option class="placeholder" selected disabled value="">Выберите гендер</option>
                    @foreach($questionnaire->genders() as $gender)
                        <option value={{$gender->id}}>{{$gender->gender_ru}}</option>
                    @endforeach
                </select>
                @if ($errors->has('gender_id'))
                    <div class="has-error">
                        <span class="help-block">{{ $errors->first('gender_id') }}</span>
                    </div>
                @endif
            </div>
            <div class="col-lg-2">
                <label class="m-form__group__label">
                    Дата рождения :
                </label>
                {!! Form::selectRange('year_of_birth', date('Y')-69, date('Y'),['class' => 'form-control m-input']) !!}
                @if ($errors->has('year_of_birth'))
                    <div class="has-error">
                        <span class="help-block">{{ $errors->first('year_of_birth') }}sdfdsfs</span>
                    </div>
                @endif
            </div>
        </div>
    @endif
</div>
<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
    <div class="m-form__actions m-form__actions--solid">
        <div class="row">
            <div class="col-lg-6">
                <button type="submit" class="btn btn-primary">
                    Сохранить
                </button>
                <button type="reset" onclick="window.history.back();" class="btn btn-secondary">
                    Отмена
                </button>
            </div>
        </div>
    </div>
</div>
