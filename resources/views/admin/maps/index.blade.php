@extends('admin.layouts.app')

@section('content')

    @subheader
    Карта
    @endsubheader

    @content
    <div class="form-group m-form__group row">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
              integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
              crossorigin=""/>

        <style>
            #mapid {
                height: 580px;
                width: 1150px;
            }
        </style>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card" style="float: left;">
                    <div class="card-header">Все организации:</div>
                    <div class="card-body">
                        <div id="mapid"></div>
                    </div>
                </div>
                <div style="float: right;">
                    <ul style="list-style-type: none;" class="list-group list-group-flush">
                        <a href="{{ route('maps.api') }}">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span width="18" height="30"
                                      style="margin-right: 15px;">
                                </span>
                                Все
                                <span class="badge badge-primary badge-pill"
                                      style="margin-left: 20px;">{{ $organizations->count() }}</span>
                            </li>
                        </a>
                        @foreach($organizationtypes as $organizationtype)
                            <a href="{{ route('maps.api', ['id'=>$organizationtype->id]) }}">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <img src="{{ asset('storage/img/admin/makers/'.(string)$j++.'.png') }}" alt=""
                                         width="18" height="30"
                                         style="margin-right: 15px;">
                                    {{ $organizationtype->type_ru }}
                                    <span class="badge badge-primary badge-pill"
                                          style="margin-left: 20px;">{{ $organizationtype->organizations()->count() }}</span>
                                </li>
                            </a>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endcontent

@endsection

@section('scripts')
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
            integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
            crossorigin=""></script>
    <script>
        var mapCenter = [{{ request('latitude', config('leaflet.map_center_latitude')) }}, {{ request('longitude', config('leaflet.map_center_longitude')) }}];
        var map = L.map('mapid').setView(mapCenter, {{ config('leaflet.zoom_level') }});
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        @foreach($orgtypes as $organizationtype)
            @if($orgtypes->count()==1)
                @foreach($organizationtypes as $orgtype)
                    @break($organizationtype==$orgtype)
                        {{ ++$i  }}
                @endforeach
            @endif
        var greenIcon = new L.Icon({
            iconUrl: '{{ asset('storage/img/admin/makers/'.(string)$i.'.png') }}',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
        });
        {{ ++$i }}
        @foreach($organizationtype->organizations() as $organization)
        var maker2 = new L.marker([{{ $organization->latitude }}, {{ $organization->longitude }}], {icon: greenIcon}).bindPopup("{{$organization->name}}<br><br><a href=\"{{ route('organizations.show', $organization->id) }}\">Посмотреть</a>").addTo(map);
        @endforeach
            @endforeach
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
@endsection

