<div class="m-portlet__body">
    <div class="form-group m-form__group row">
        <div class="col-lg-6">
            <label class="m-form__group__label">
                Имя:
            </label>
            {!! Form::text('name', null, ['class' => 'form-control m-input']) !!}
            @if ($errors->has('name'))
                <div class="form-group has-error">
                    <span class="help-block">{{ $errors->first('name') }}</span>
                </div>
            @endif
        </div>
        <div class="col-lg-6">
            <label class="m-form__group__label">
                Фамилия:
            </label>
            {!! Form::text('lastname', null, ['class' => 'form-control m-input']) !!}
            @if ($errors->has('lastname'))
                <div class="form-group has-error">
                    <span class="help-block">{{ $errors->first('lastname') }}</span>
                </div>
            @endif
        </div>
    </div>
    <div class="form-group m-form__group row">
        <div class="col-lg-4">
            <label class="m-form__group__label">
                Логин:
            </label>
            {!! Form::text('login', null, ['class' => 'form-control m-input']) !!}
            @if ($errors->has('login'))
                <div class="form-group has-error">
                    <span class="help-block">{{ $errors->first('login') }}</span>
                </div>
            @endif
        </div>
        <div class="col-lg-4">
            <label class="m-form__group__label">
                Эл.адрес:
            </label>
            {!! Form::email('email', null, ['class' => 'form-control m-input']) !!}
            @if ($errors->has('email'))
                <div class="form-group has-error">
                    <span class="help-block">{{ $errors->first('email') }}</span>
                </div>
            @endif
        </div>
        @if(!$user->id)
        <div class="col-lg-4">
            <label class="m-form__group__label">
                Пароль:
            </label>

            {!! Form::password('password', ['class' => 'form-control m-input']) !!}
            @if ($errors->has('password'))
                <div class="form-group has-error">
                    <span class="help-block">{{ $errors->first('password') }}</span>
                </div>
            @endif
            @endif
        </div>
    </div>
    <div class="form-group m-form__group row">
        <div class="col-lg-6">
            <label class="m-form__group__label">
                Статус:
            </label>
            <div class="m-radio-inline">
                <label class="m-checkbox m-checkbox--success">
                    {!! Form::hidden('active', 0) !!}
                    {!! Form::checkbox('active', 1, null, ["id" => "active"]) !!}
                    Активный
                    <span></span>
                </label>
            </div>
        </div>
    </div>
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
