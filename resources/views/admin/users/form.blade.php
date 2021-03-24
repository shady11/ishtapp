<div class="card-body">
    <div class="mb-15">
        <div class="form-group row">
            <label class="col-3 mt-2" for="name">Изображение</label>
            <div class="col-9">
                <div class="image-input image-input-outline bg-gray-100" id="kt_image_2">
                    <div class="image-input-wrapper" style="max-width: 100%; width: 200px; height: 200px; @if($user->avatar) background-image: url({{asset($user->avatar)}}); @endif background-position: center center;"></div>
                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Изменить">
                        <i class="la la-pencil icon-sm text-muted"></i>
                        <input type="file" name="image" accept=".png, .jpg, .jpeg"/>
                        <input type="hidden" name="image_remove"/>
                    </label>

                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Удалить">
                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                    </span>

                    @if($user->avatar)
                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Удалить">
                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                        </span>
                    @endif
                </div>
                <span class="form-text text-muted">Допустимые разрешения: png, jpg, jpeg.</span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">ФИО или Название:</label>
            <div class="col-lg-4">
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                @if ($errors->has('name'))
                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
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
