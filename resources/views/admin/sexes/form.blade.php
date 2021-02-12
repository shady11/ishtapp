<div class="m-portlet__body">
    <div class="form-group m-form__group row">
        <div class="col-lg-3">
            <label class="m-form__group__label">
                На русском:
            </label>
            {!! Form::text('sex_ru', null, ['class' => 'form-control m-input']) !!}
            @if ($errors->has('sex_ru'))
                <div class="form-group has-error">
                    <span class="help-block">Это поле обязательно для заполнения.</span>
                </div>
            @endif
        </div>
        <div class="col-lg-3">
            <label class="m-form__group__label">
                На кыргызском :
            </label>
            {!! Form::text('sex_kg', null, ['class' => 'form-control m-input']) !!}
            @if ($errors->has('sex_kg'))
                <div class="form-group has-error">
                    <span class="help-block">Это поле обязательно для заполнения.</span>
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
