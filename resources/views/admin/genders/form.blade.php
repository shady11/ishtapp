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
        <div class="col-lg-3">
            <label class="m-form__group__label">
                На русском:
            </label>
            {!! Form::text('gender_ru', null, ['class' => 'form-control m-input']) !!}
            @if ($errors->has('gender_ru'))
                <div class="form-group has-error">
                    <span class="help-block">Это поле обязательно для заполнения.</span>
                </div>
            @endif
        </div>
        <div class="col-lg-3">
            <label class="m-form__group__label">
                На кыргызском :
            </label>
            {!! Form::text('gender_kg', null, ['class' => 'form-control m-input']) !!}
            @if ($errors->has('gender_kg'))
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
