<div class="card-body">
    <div class="mb-15">
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Имя:</label>
            <div class="col-lg-4">
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                @if ($errors->has('name'))
                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Фамилия:</label>
            <div class="col-lg-4">
                {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
                @if ($errors->has('lastname'))
                    <div class="invalid-feedback">{{ $errors->first('lastname') }}</div>
                @endif
            </div>
        </div>
    </div>

    <div class="mb-3">
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Тип пользователя:</label>
            <div class="col-lg-4">
                {!! Form::select('type', $types, null, ['class' => 'selectpicker', 'title' => 'Выбрать', 'data-width' => '100%', 'data-live-search' => 'true', 'data-size' => '6']) !!}
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Логин:</label>
            <div class="col-lg-4">
                {!! Form::text('login', null, ['class' => 'form-control']) !!}
                @if ($errors->has('login'))
                    <div class="invalid-feedback">{{ $errors->first('login') }}</div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Email:</label>
            <div class="col-lg-4">
                {!! Form::email('email', null, ['class' => 'form-control']) !!}
                @if ($errors->has('email'))
                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Пароль:</label>
            <div class="col-lg-4">
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Телефон:</label>
            <div class="col-lg-4">
                {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
                @if ($errors->has('phone_number'))
                    <div class="invalid-feedback">{{ $errors->first('phone_number') }}</div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Адрес:</label>
            <div class="col-lg-4">
                {!! Form::text('address', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group row align-items-center">
            <label class="col-lg-3 col-form-label">Статус:</label>
            <div class="col-lg-4">
                <div class="checkbox-inline">
                    <label class="checkbox">
                        {!! Form::hidden('active', 0) !!}
                        {!! Form::checkbox('active', 1, null, ["id" => "active"]) !!}
                        <span></span>
                    </label>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="card-footer">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <button type="submit" class="btn btn-success mr-2">Сохранить</button>
            <button type="reset" class="btn btn-secondary" onclick="window.history.back();">Отмена</button>
        </div>
    </div>
</div>
