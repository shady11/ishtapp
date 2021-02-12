<link rel="stylesheet" type="text/css" href="{{ URL::asset('storage/css/lib/control/iconselect.css') }}">
<script type="text/javascript" src="{{ URL::asset('storage/lib/control/iconselect.js') }}"></script>

{{--<script type="text/javascript" src="{{ URL::asset('storage/lib/iscroll.js')}}"></script>--}}
<div class="m-portlet__body">
    <div class="form-group m-form__group row">
        <div class="col-lg-3">
            <label class="m-form__group__label">
                На русском:
            </label>
            {!! Form::text('name_ru', null, ['class' => 'form-control m-input']) !!}
            @if ($errors->has('name_ru'))
                <div class="form-group has-error">
                    <span class="help-block">Это поле обязательно для заполнения.</span>
                </div>
            @endif
        </div>
        <div class="col-lg-3">
            <label class="m-form__group__label">
                На кыргызском :
            </label>
            {!! Form::text('name_ky', null, ['class' => 'form-control m-input']) !!}
            @if ($errors->has('name_ky'))
                <div class="form-group has-error">
                    <span class="help-block">Это поле обязательно для заполнения.</span>
                </div>
            @endif
        </div>
        <div class="col-lg-3">
            <div id="my-icon-select">
            </div>
            <input type="text" id="selected-text" name="selected_id" style="width:65px;" hidden>
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
    var iconSelect;
    var selectedText;
    window.onload = function () {
        selectedText = document.getElementById('selected-text');
        document.getElementById('my-icon-select').addEventListener('changed', function (e) {
            selectedText.value = iconSelect.getSelectedValue();
        });
        iconSelect = new IconSelect("my-icon-select");
        var icons = [];
        @for($i=1;$i<100;++$i)
        icons.push({
            'iconFilePath': '{{ asset("storage/img/admin/emoji_icons/png_512/".(string)$i.".png")}}',
            'iconValue': '{{ $i }}' + '.png'
        });
        @endfor
        iconSelect.refresh(icons);
        @if($symptom->id)
        document.getElementById('selected-icon').childNodes[0].src = "{{asset("storage/img/admin/emoji_icons/png_512/".$symptom->img_name)}}";
        document.getElementById('selected-text').value = "{{ $symptom->img_name }}";
        document.getElementsByClassName('icon')[0].setAttribute('class', 'icon');
        document.getElementsByClassName('icon')[{{$row}}-1].setAttribute('class', 'icon selected');
        @endif
        document.getElementById('my-icon-select-box-scroll').style.width = "530px";
        document.getElementById('my-icon-select-box-scroll').style.height = "400px";
        document.getElementById('selected-box_id').style.width = "90px";
        document.getElementById('selected-box_id').style.height = "90px";
    };
</script>
