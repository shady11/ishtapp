<div class="m-portlet__body">
    <div class="form-group m-form__group row">
        <div class="col-lg-3">
            <label class="m-form__group__label">
                Пациент id:
            </label>
            <select name="patient_id" id="categor" class="form-control">
                <option class="placeholder" selected disabled value="">Выберите пациент id</option>
                @if($notification->id)
                    @foreach($notification->patients() as $patient)
                        @if($notification->patient($notification->patient_id)==$patient)
                            <option value={{$patient->id}} selected>{{$patient->username}}</option>
                        @else
                            <option value={{$patient->id}}>{{$patient->username}}</option>
                        @endif
                    @endforeach
                @else
                    @foreach($notification->patients() as $patient)
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
        <div class="col-lg-2">
            <label class="m-form__group__label">
                Посещение врача :
            </label>
            <select name="type" class="form-control">
                <option class="placeholder" selected disabled value="">Посещение врача</option>
                @if($notification->id)
                    @if($notification->type=="visit")
                        <option value="visit" selected>О визите к врачу</option>
                        <option value="tests">О сдаче анализов</option>
                        <option value="medications">О получении препаратов</option>
                    @elseif($notification->type=="tests")
                        <option value="visit">О визите к врачу</option>
                        <option value="tests" selected>О сдаче анализов</option>
                        <option value="medications">О получении препаратов</option>
                    @else
                        <option value="visit">О визите к врачу</option>
                        <option value="tests">О сдаче анализов</option>
                        <option value="medications" selected>О получении препаратов</option>
                    @endif
                @else
                    <option value="visit">О визите к врачу</option>
                    <option value="tests">О сдаче анализов</option>
                    <option value="medications">О получении препаратов</option>
                @endif
            </select>
            @if ($errors->has('type'))
                <div class="form-group has-error">
                    <span class="help-block">{{ $errors->first('type') }}</span>
                </div>
            @endif
        </div>
        <div class="col-lg-3">
            <label class="m-form__group__label">
                выберите дату и время:
            </label>
            <input type="text" class="form-control datetimepicker" name="datetime" value="{{ ($notification) ? $notification->datetime : old('datetime') }}">
        @if ($errors->has('datetime'))
                <div class="has-error">
                    <span class="help-block">{{ $errors->first('datetime') }}</span>
                </div>
            @endif
        </div>
        <div class="col-lg-2">
            <label class="m-form__group__label">
                Напомнить :
            </label>
            <select name="remind" class="form-control">
                <option class="placeholder" selected disabled value="">Напомнить</option>
                @if($notification->id)
                    @if($notification->remind=="hour")
                        <option value="hour" selected>за 1 час</option>
                        <option value="day">за 1 день</option>
                        <option value="month">за 1 месяц</option>
                    @elseif($notification->type=="day")
                        <option value="hour">за 1 час</option>
                        <option value="day" selected>за 1 день</option>
                        <option value="month">за 1 месяц</option>
                    @else
                        <option value="hour">за 1 час</option>
                        <option value="day">за 1 день</option>
                        <option value="month" selected>за 1 месяц</option>
                    @endif
                @else
                    <option value="hour">за 1 час</option>
                    <option value="day">за 1 день</option>
                    <option value="month">за 1 месяц</option>
                @endif
            </select>
            @if ($errors->has('remind'))
                <div class="form-group has-error">
                    <span class="help-block">{{ $errors->first('remind') }}</span>
                </div>
            @endif
        </div>
        <div class="col-lg-5">
            <label class="m-form__group__label">
                Описание :
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
<script>
    $(function () {
        $('.datetimepicker').datetimepicker();
    });
</script>
