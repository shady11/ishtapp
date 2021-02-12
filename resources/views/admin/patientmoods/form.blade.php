<div class="m-portlet__body">
    <div class="form-group m-form__group row">
        <div class="col-lg-3">
            <label class="m-form__group__label">
                Выберите пациент:
            </label>
            <select name="patient_id" id="categor" class="form-control">
                <option class="placeholder" selected disabled value="">Выберите пациент</option>
                @if($patientmood->id)
                    @foreach($patientmood->patients() as $patient)
                        @if($patientmood->patient($patientmood->patient_id)==$patient)
                            <option value={{$patient->id}} selected>{{$patient->username}}</option>
                        @else
                            <option value={{$patient->id}}>{{$patient->username}}</option>
                        @endif
                    @endforeach
                @else
                    @foreach($patientmood->patients() as $patient)
                        <option value={{$patient->id}}>{{$patient->username}}</option>
                    @endforeach
                @endif
            </select>
            @if ($errors->has('patient_id'))
                <div class="form-group has-error">
                    <span class="help-block">Это поле обязательно для заполнения.</span>
                </div>
            @endif
        </div>
        <div class="col-lg-3">
            <label class="m-form__group__label">
                Названия :
            </label>
            {!! Form::text('title', null, ['class' => 'form-control m-input']) !!}
            @if ($errors->has('title'))
                <div class="form-group has-error">
                    <span class="help-block">{{ $errors->first('title') }}</span>
                </div>
            @endif
        </div>
    </div>
    <div class="form-group m-form__group row">
        <div class="col-lg-3">
            <label class="m-form__group__label">
                Имя файла :
            </label>
            {!! Form::text('file_name', null, ['class' => 'form-control m-input']) !!}
            @if ($errors->has('file_name'))
                <div class="form-group has-error">
                    <span class="help-block">{{ $errors->first('file_name') }}</span>
                </div>
            @endif
        </div>
        <div class="col-lg-3">
            <label class="m-form__group__label">
                Дата :
            </label>
            {!! Form::date('date', null,['class' => 'form-control m-input']) !!}
            @if ($errors->has('date'))
                <div class="has-error">
                    <span class="help-block">{{ $errors->first('date') }}</span>
                </div>
            @endif
        </div>
    </div>
</div>
<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
    <div class="m-form__actions m-form__actions--solid">
        <div class="row">
        </div>
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
