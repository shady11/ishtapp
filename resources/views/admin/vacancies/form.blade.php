<div class="m-portlet__body">
    <div class="form-group m-form__group row">
        <div class="col-lg-6">
            <label class="m-form__group__label">
                Название:
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
                Название:
            </label>
            {!! Form::text('title', null, ['class' => 'form-control m-input']) !!}
            @if ($errors->has('title'))
                <div class="form-group has-error">
                    <span class="help-block">{{ $errors->first('title') }}</span>
                </div>
            @endif
        </div>
        <div class="col-lg-6">
            <label class="m-form__group__label">
                Адрес:
            </label>
            {!! Form::text('address', null, ['class' => 'form-control m-input']) !!}
            @if ($errors->has('address'))
                <div class="form-group has-error">
                    <span class="help-block">{{ $errors->first('address') }}</span>
                </div>
            @endif
        </div>
        <div class="col-lg-6">
            <label class="m-form__group__label">
                Зарплата:
            </label>
            {!! Form::text('salary', null, ['class' => 'form-control m-input']) !!}
            @if ($errors->has('salary'))
                <div class="form-group has-error">
                    <span class="help-block">{{ $errors->first('salary') }}</span>
                </div>
            @endif
        </div>
        <div class="col-lg-6">
            <label class="m-form__group__label">
                Описание:
            </label>
            {!! Form::textarea('description', null, ['class' => 'form-control m-input']) !!}
            @if ($errors->has('description'))
                <div class="form-group has-error">
                    <span class="help-block">{{ $errors->first('description') }}</span>
                </div>
            @endif
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
