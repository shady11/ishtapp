<div class="m-portlet__body">
    <div class="form-group m-form__group row">
        <div class="col-lg-3">
            <label class="m-form__group__label">
                Пациент id:
            </label>
            <select name="patient_id" id="categor" class="form-control">
                <option class="placeholder" selected disabled value="">Выберите пациент id</option>
                @if($patientsymptom->id)
                    @foreach($patientsymptom->patients() as $patient)
                        @if($patientsymptom->patient($patientsymptom->patient_id)==$patient)
                            <option value={{$patient->id}} selected>{{$patient->username}}</option>
                        @else
                            <option value={{$patient->id}}>{{$patient->username}}</option>
                        @endif
                    @endforeach
                @else
                    @foreach($patientsymptom->patients() as $patient)
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
        <div class="col-lg-4">
            <label class="m-form__group__label">
                Названия:
            </label>
            {!! Form::text('title', null, ['class' => 'form-control m-input']) !!}
            @if ($errors->has('title'))
                <div class="form-group has-error">
                    <span class="help-block">{{ $errors->first('title') }}</span>
                </div>
            @endif
        </div>
        <div class="col-lg-2">
            <label class="m-form__group__label">
                Уровень :
            </label>
{{--            {!! Form::selectRange('level', 1, 5,['class' => 'form-control m-input']) !!}--}}
            <select name="level" id="categor" class="form-control">
                <option class="placeholder" selected disabled value="">Уровень</option>
                @if($patientsymptom->id)
                    @for($i=1;$i<=5;$i++)
                        @if($patientsymptom->level==$i)
                            <option value={{$i}} selected>{{$i}}</option>
                        @else
                            <option value={{$i}}>{{$i}}</option>
                        @endif
                    @endfor
                @else
                    @for($i=1;$i<=5;$i++)
                        <option value={{$i}}>{{$i}}</option>
                    @endfor
                @endif
            </select>
            @if ($errors->has('level'))
                <div class="has-error">
                    <span class="help-block">{{ $errors->first('level') }}</span>
                </div>
            @endif
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="col-lg-4">
            <label class="m-form__group__label">
                Названия файла:
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
