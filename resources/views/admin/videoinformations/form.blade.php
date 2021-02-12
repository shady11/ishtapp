<div class="m-portlet__body">
    <div class="form-group m-form__group row">
        <div class="col-lg-3">
            <select name="videocategory_id" id="categor" class="form-control">
                <option class="placeholder" selected disabled value="">Выберите категорию</option>
                @if($videoinformation->id)
                    @foreach($videoinformation->videoinformationcategories() as $videoinformationcategory)
                        @if($videoinformation->videoinformationcategory($videoinformation->videocategory_id)==$videoinformationcategory)
                            <option value={{$videoinformationcategory->id}}
                                selected>{{$videoinformationcategory->name_ru}}</option>
                        @else
                            <option
                                value={{$videoinformationcategory->id}}>{{$videoinformationcategory->name_ru}}</option>
                        @endif
                    @endforeach
                @else
                    @foreach($videoinformation->videoinformationcategories() as $videoinformationcategory)
                        <option
                            value={{$videoinformationcategory->id}}>{{$videoinformationcategory->name_ru}}</option>
                    @endforeach
                @endif
            </select>
            @if ($errors->has('videocategory_id'))
                <div class="form-group has-error">
                    <span class="help-block">{{ $errors->first('videocategory_id') }}</span>
                </div>
            @endif
        </div>
        <div class="col-lg-3">
            <a href="{{route('videoinformationcategories.create')}}"
               class="btn btn-primary m-btn m-btn--custom m-btn--air m-btn--pill">
                <span>
                    <span>
                        Добавить категорию
                    </span>
                </span>
            </a>
        </div>
    </div>
    <div class="form-group m-form__group row">
        <div class="col-lg-3">
            <label class="m-form__group__label">
                Выберите язык:
            </label>
            <select name="lang" class="form-control">
                <option class="placeholder" selected disabled value="">Выберите язык</option>
                @if($videoinformation->id)
                    @if($videoinformation->lang=="ru")
                        <option value="ru" selected>Русский</option>
                        <option value="ky">Кыргызский</option>
                    @else
                        <option value="ru">Русский</option>
                        <option value="ky" selected>Кыргызский</option>
                    @endif
                @else
                    <option value="ru">Русский</option>
                    <option value="ky">Кыргызский</option>
                @endif
            </select>
            @if ($errors->has('lang'))
                <div class="form-group has-error">
                    <span class="help-block">{{ $errors->first('lang') }}</span>
                </div>
            @endif
        </div>
        <div class="col-lg-3">
            <label class="m-form__group__label">
                Название :
            </label>
            {!! Form::text('name', null, ['class' => 'form-control m-input']) !!}
            @if ($errors->has('name'))
                <div class="form-group has-error">
                    <span class="help-block">{{ $errors->first('name') }}</span>
                </div>
            @endif
        </div>
    </div>
    <div class="form-group m-form__group row">
        <div class="col-lg-3">
            <label class="m-form__group__label">
                Загрузить видео :
            </label>
            <input type="file" name="file">
            @if ($errors->has('file'))
                <div class="form-group has-error">
                    <span class="help-block">{{ $errors->first('file') }}</span>
                </div>
            @endif
            <br>
            @if($videoinformation->id)
                <video width="320" height="240" controls>
                    <source src="{{URL::asset($videoinformation->path)}}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
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
