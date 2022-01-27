<div class="card-body">
    <div class="form-group row">
        <label class="col-lg-3 col-form-label">Название:</label>
        <div class="col-lg-4">
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            @if ($errors->has('name'))
                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-3 col-form-label">Зарплата:</label>
        <div class="col-lg-4">
            {!! Form::text('salary', null, ['class' => 'form-control']) !!}
            @if ($errors->has('salary'))
                <div class="invalid-feedback">{{ $errors->first('salary') }}</div>
            @endif
        </div>
    </div>
    @if(auth()->user()->type == 'ADMIN')
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Компания:</label>
            <div class="col-lg-4">
                {!! Form::select('company_id', $companies, auth()->user()->type == 'COMPANY' ? auth()->user()->id : null, ['class' => 'selectpicker', 'title' => 'Выбрать', 'data-width' => '100%', 'data-live-search' => 'true', 'data-size' => '6']) !!}
                @if ($errors->has('company_id'))
                    <div class="invalid-feedback">{{ $errors->first('company_id') }}</div>
                @endif
            </div>
        </div>
    @else
        {!! Form::hidden('company_id', auth()->user()->id) !!}
    @endif
    <div class="form-group row">
        <label class="col-lg-3 col-form-label">Описание:</label>
        <div class="col-lg-4">
            {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '6']) !!}
            @if ($errors->has('description'))
                <div class="invalid-feedback">{{ $errors->first('description') }}</div>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-3 col-form-label">Выберите область:</label>
        <div class="col-lg-4">
            {!! Form::select('region_id', $regions, null, ['class' => 'selectpicker', 'title' => 'Выбрать', 'data-width' => '100%', 'data-live-search' => 'true', 'data-size' => '6']) !!}
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-3 col-form-label">Выберите район:</label>
        <div class="col-lg-4">
            {!! Form::select('district_id', $districts, null, ['class' => 'selectpicker', 'title' => 'Выбрать', 'data-width' => '100%', 'data-live-search' => 'true', 'data-size' => '6']) !!}
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-3 col-form-label">Выберите вид занятости:</label>
        <div class="col-lg-4">
            {!! Form::select('busyness_id', $busynesses, null, ['class' => 'selectpicker', 'title' => 'Выбрать', 'data-width' => '100%', 'data-live-search' => 'true', 'data-size' => '6']) !!}
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-3 col-form-label">Выберите тип вакансии:</label>
        <div class="col-lg-4">
            {!! Form::select('vacancy_type_id', $vacancy_types, null, ['class' => 'selectpicker', 'title' => 'Выбрать', 'data-width' => '100%', 'data-live-search' => 'true', 'data-size' => '6']) !!}
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-3 col-form-label">Выберите сферу работы:</label>
        <div class="col-lg-4">
            {!! Form::select('job_type_id', $job_types, null, ['class' => 'selectpicker', 'title' => 'Выбрать', 'data-width' => '100%', 'data-live-search' => 'true', 'data-size' => '6']) !!}
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-3 col-form-label">Выберите график работы:</label>
        <div class="col-lg-4">
            {!! Form::select('schedule_id', $schedules, null, ['class' => 'selectpicker', 'title' => 'Выбрать', 'data-width' => '100%', 'data-live-search' => 'true', 'data-size' => '6']) !!}
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
