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
                Выберите тему :
            </label>
            <select name="theme_id" id="categor" class="form-control">
                <option class="placeholder" selected disabled value="">Выберите тему вопросов</option>
                @if($consultant->id)
                    @foreach($consultant->themeconsultantquestions() as $themeconsultantquestion)
                        @if($consultant->themeconsultantquestion($consultant->theme_id)==$themeconsultantquestion)
                            <option
                                value={{$themeconsultantquestion->id}} selected>{{$themeconsultantquestion->theme_ru}}</option>
                        @else
                            <option
                                value={{$themeconsultantquestion->id}}>{{$themeconsultantquestion->theme_ru}}</option>
                        @endif
                    @endforeach
                @else
                    @foreach($consultant->themeconsultantquestions() as $themeconsultantquestion)
                        <option value={{$themeconsultantquestion->id}}>{{$themeconsultantquestion->theme_ru}}</option>
                    @endforeach
                @endif
            </select>
            @if ($errors->has('theme_id'))
                <div class="form-group has-error">
                    <span class="help-block">{{ $errors->first('theme_id') }}</span>
                </div>
            @endif
        </div>
    </div>
    <div class="form-group m-form__group row">
        <div class="col-lg-3">
            <label class="m-form__group__label">
                Whatsapp :
            </label>
            {!! Form::text('whatsapp', null, ['class' => 'form-control m-input', 'placeholder' => '+996773576697']) !!}
            @if ($errors->has('whatsapp'))
                <div class="form-group has-error">
                    <span class="help-block">{{ $errors->first('whatsapp') }}</span>
                </div>
            @endif
        </div>
        <div class="col-lg-3">
            <label class="m-form__group__label">
                Telegram :
            </label>
            {!! Form::text('telegram', null, ['class' => 'form-control m-input']) !!}
            @if ($errors->has('telegram'))
                <div class="form-group has-error">
                    <span class="help-block">{{ $errors->first('telegram') }}</span>
                </div>
            @endif
        </div>
        <div class="col-lg-3">
            <label class="m-form__group__label">
                Facebook:
            </label>
            {!! Form::text('facebook', null, ['class' => 'form-control m-input']) !!}
            @if ($errors->has('facebook'))
                <div class="form-group has-error">
                    <span class="help-block">{{ $errors->first('facebook') }}</span>
                </div>
            @endif
        </div>
        <div class="col-lg-3">
            <label class="m-form__group__label">
                Messenger :
            </label>
            {!! Form::text('messenger', null, ['class' => 'form-control m-input']) !!}
            @if ($errors->has('messenger'))
                <div class="form-group has-error">
                    <span class="help-block">{{ $errors->first('messenger') }}</span>
                </div>
            @endif
        </div>
        <div class="col-lg-3">
            <label class="m-form__group__label">
                Телефон номер :
            </label>
            {!! Form::text('phone_number', null, ['class' => 'form-control m-input', 'placeholder' => '+996773576697']) !!}
            @if ($errors->has('phone_number'))
                <div class="form-group has-error">
                    <span class="help-block">{{ $errors->first('phone_number') }}</span>
                </div>
            @endif
        </div>
    </div>

    <div class="form-group m-form__group row">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
              integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
              crossorigin=""/>

        <style>
            #mapid {
                height: 500px;
                width: 1200px;
            }
        </style>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Место на карте :</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="latitude"
                                           class="control-label">Широта (latitude) :</label>
                                    {!! Form::text('latitude', null, ['class' => 'form-control m-input','id'=>'latitude']) !!}
                                    @if ($errors->has('latitude'))
                                        <div class="form-group has-error">
                                            <span class="help-block">{{ $errors->first('latitude') }}</span>
                                        </div>
                                    @endif
                                    {{--                                    <input id="latitude" type="text"--}}
                                    {{--                                           class="form-control{{ $errors->has('latitude') ? ' is-invalid' : '' }}"--}}
                                    {{--                                           name="latitude" value="{{ old('latitude', request('latitude')) }}">--}}
                                    {{--                                    {!! $errors->first('latitude', '<span class="invalid-feedback" role="alert">:message</span>') !!}--}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="longitude"
                                           class="control-label">Долгота (longitude) :</label>
                                    {!! Form::text('longitude', null, ['class' => 'form-control m-input','id'=>'longitude']) !!}
                                    @if ($errors->has('longitude'))
                                        <div class="form-group has-error">
                                            <span class="help-block">{{ $errors->first('longitude') }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div id="mapid"></div>
                    </div>
                </div>
            </div>
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
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
        integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
        crossorigin=""></script>
<script>
    var mapCenter = [{{ request('latitude', config('leaflet.map_center_latitude')) }}, {{ request('longitude', config('leaflet.map_center_longitude')) }}];
    var map = L.map('mapid').setView(mapCenter, {{ config('leaflet.zoom_level') }});
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var marker = L.marker(mapCenter).addTo(map);
    if (document.getElementById('latitude').value != '' && document.getElementById('longitude').value != '') {
        updateMarker(document.getElementById('latitude').value, document.getElementById('longitude').value)
    }

    function updateMarker(lat, lng) {
        marker
            .setLatLng([lat, lng])
            .bindPopup("Your location :  " + marker.getLatLng().toString())
            .openPopup();
        return false;
    };

    map.on('click', function (e) {
        let latitude = e.latlng.lat.toString().substring(0, 15);
        let longitude = e.latlng.lng.toString().substring(0, 15);
        $('#latitude').val(latitude);
        $('#longitude').val(longitude);
        updateMarker(latitude, longitude);
    });

    var updateMarkerByInputs = function () {
        return updateMarker($('#latitude').val(), $('#longitude').val());
    }
    $('#latitude').on('input', updateMarkerByInputs);
    $('#longitude').on('input', updateMarkerByInputs);
</script>
