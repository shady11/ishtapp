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
                {{__('auth.select_regions')}}
            </label>
            <div class="form-group m-form__group row">
                <div class="col-lg-6">
                    <select name="region_id" id="region" class="form-control">
                        <option class="placeholder" selected disabled value="">{{__('auth.select_regions')}}</option>
                        @if($vacancy->id)
                            @foreach($vacancy->regions() as $region)
                                @if($vacancy->region($vacancy->region_id)==$region)
                                    <option value={{$region->id}}
                                        selected>{{$region->name}}</option>
                                @else
                                    <option value={{$region->id}}>{{$region->name}}</option>
                                @endif
                            @endforeach
                        @else
                            @foreach($vacancy->regions() as $region)
                                <option value={{$region->id}}>{{$region->name}}</option>
                            @endforeach
                        @endif
                    </select>
                    @if ($errors->has('region'))
                        <div class="form-group has-error">
                            <span class="help-block">{{ $errors->first('region') }}</span>
                        </div>
                    @endif
                </div>
            <!--                <div class="col-lg-2">
                    <a href="{{route('job_types.create')}}"
                       class="btn btn-primary m-btn m-btn&#45;&#45;custom m-btn&#45;&#45;air m-btn&#45;&#45;pill">
                <span>
                    <span>
                        {{__('auth.add_job_type')}}
                </span>
            </span>
                </a>
            </div>-->
            </div>
        </div>
        <div class="col-lg-6">
            <label class="m-form__group__label">
                {{__('auth.select_busynesses')}}
            </label>
            <div class="form-group m-form__group row">
                <div class="col-lg-6">
                    <select name="busyness_id" id="busyness" class="form-control" required>
                        <option class="placeholder" selected disabled value="">{{__('auth.select_busynesses')}}</option>
                        @if($vacancy->id)
                            @foreach($vacancy->busynesses() as $busyness)
                                @if($vacancy->busyness($vacancy->busyness_id)==$busyness)
                                    <option value={{$busyness->id}}
                                        selected>{{$busyness->name}}</option>
                                @else
                                    <option value={{$busyness->id}}>{{$busyness->name}}</option>
                                @endif
                            @endforeach
                        @else
                            @foreach($vacancy->busynesses() as $busyness)
                                <option value={{$busyness->id}}>{{$busyness->name}}</option>
                            @endforeach
                        @endif
                    </select>
                    @if ($errors->has('busyness'))
                        <div class="form-group has-error">
                            <span class="help-block">{{ $errors->first('busyness') }}</span>
                        </div>
                    @endif
                </div>
            <!--                <div class="col-lg-2">
                    <a href="{{route('vacancy_types.create')}}"
                       class="btn btn-primary m-btn m-btn&#45;&#45;custom m-btn&#45;&#45;air m-btn&#45;&#45;pill">
                <span>
                    <span>
                        {{__('auth.add_vacancy_type')}}
                </span>
            </span>
                </a>
            </div>-->
            </div>
        </div>
    </div>
    <div class="form-group m-form__group row">
        <div class="col-lg-6">
            <label class="m-form__group__label">
                {{__('auth.select_vacancy_types')}}
            </label>
            <div class="form-group m-form__group row">
                <div class="col-lg-6">
                    <select name="vacancy_type_id" id="vacancy_type" class="form-control" required>
                        <option class="placeholder" selected disabled value="">{{__('auth.select_vacancy_types')}}</option>
                        @if($vacancy->id)
                            @foreach($vacancy->vacancytypes() as $vacancytype)
                                @if($vacancy->vacancytype($vacancy->vacancy_type_id)==$vacancytype)
                                    <option value={{$vacancytype->id}}
                                        selected>{{$vacancytype->name}}</option>
                                @else
                                    <option value={{$vacancytype->id}}>{{$vacancytype->name}}</option>
                                @endif
                            @endforeach
                        @else
                            @foreach($vacancy->vacancytypes() as $vacancytype)
                                <option value={{$vacancytype->id}}>{{$vacancytype->name}}</option>
                            @endforeach
                        @endif
                    </select>
                    @if ($errors->has('vacancy_type'))
                        <div class="form-group has-error">
                            <span class="help-block">{{ $errors->first('vacancy_type') }}</span>
                        </div>
                    @endif
                </div>
<!--                <div class="col-lg-2">
                    <a href="{{route('vacancy_types.create')}}"
                       class="btn btn-primary m-btn m-btn&#45;&#45;custom m-btn&#45;&#45;air m-btn&#45;&#45;pill">
                <span>
                    <span>
                        {{__('auth.add_vacancy_type')}}
                    </span>
                </span>
                    </a>
                </div>-->
            </div>
        </div>
        <div class="col-lg-6">
            <label class="m-form__group__label">
                {{__('auth.select_job_types')}}
            </label>
            <div class="form-group m-form__group row">
                <div class="col-lg-6">
                    <select name="job_type_id" id="job_type" class="form-control"  required>
                        <option class="placeholder" selected disabled value="">{{__('auth.select_job_types')}}</option>
                        @if($vacancy->id)
                            @foreach($vacancy->jobtypes() as $jobtype)
                                @if($vacancy->jobtype($vacancy->job_type_id)==$vacancytype)
                                    <option value={{$jobtype->id}}
                                        selected>{{$jobtype->name}}</option>
                                @else
                                    <option value={{$jobtype->id}}>{{$jobtype->name}}</option>
                                @endif
                            @endforeach
                        @else
                            @foreach($vacancy->jobtypes() as $jobtype)
                                <option value={{$jobtype->id}}>{{$jobtype->name}}</option>
                            @endforeach
                        @endif
                    </select>
                    @if ($errors->has('job_type'))
                        <div class="form-group has-error">
                            <span class="help-block">{{ $errors->first('job_type') }}</span>
                        </div>
                    @endif
                </div>
<!--                <div class="col-lg-2">
                    <a href="{{route('job_types.create')}}"
                       class="btn btn-primary m-btn m-btn&#45;&#45;custom m-btn&#45;&#45;air m-btn&#45;&#45;pill">
                <span>
                    <span>
                        {{__('auth.add_job_type')}}
                    </span>
                </span>
                    </a>
                </div>-->
            </div>
        </div>
    </div>
    <div class="form-group m-form__group row">
        <div class="col-lg-6">
            <label class="m-form__group__label">
                {{__('auth.select_schedules')}}
            </label>
            <div class="form-group m-form__group row">
                <div class="col-lg-6">
                    <select name="schedule_id" id="schedule" class="form-control" required>
                        <option class="placeholder" selected disabled value="">{{__('auth.select_schedules')}}</option>
                        @if($vacancy->id)
                            @foreach($vacancy->schedules() as $schedule)
                                @if($vacancy->schedule($vacancy->schedule_id)==$schedule)
                                    <option value={{$schedule->id}}
                                        selected>{{$schedule->name}}</option>
                                @else
                                    <option value={{$schedule->id}}>{{$schedule->name}}</option>
                                @endif
                            @endforeach
                        @else
                            @foreach($vacancy->schedules() as $schedule)
                                <option value={{$schedule->id}}>{{$schedule->name}}</option>
                            @endforeach
                        @endif
                    </select>
                    @if ($errors->has('schedule'))
                        <div class="form-group has-error">
                            <span class="help-block">{{ $errors->first('schedule') }}</span>
                        </div>
                    @endif
                </div>
            </div>
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
