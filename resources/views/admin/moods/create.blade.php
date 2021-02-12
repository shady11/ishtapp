@extends('admin.layouts.app')

@section('content')

    @subheader
        Настроение
    @endsubheader

    @content
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Portlet-->
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Создать
                                </h3>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    {!! Form::model($mood, ['route' => 'moods.store', 'enctype' => 'multipart/form-data', 'class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']) !!}
                        @include('admin.moods.form', $mood)
                    {!! Form::close() !!}
                    <!--end::Form-->
                </div>
                <!--end::Portlet-->
            </div>
        </div>
    @endcontent

@endsection

@section('scripts')
@endsection
{{--    <!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport"--}}
{{--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <title>Document</title>--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ URL::asset('storage/css/lib/control/iconselect.css') }}">--}}
{{--    <script type="text/javascript" src="{{ URL::asset('storage/lib/control/iconselect.js') }}"></script>--}}

{{--    <script type="text/javascript" src="{{ URL::asset('storage/lib/iscroll.js')}}"></script>--}}

{{--    <script>--}}

{{--        var iconSelect;--}}
{{--        var selectedText;--}}

{{--        window.onload = function(){--}}

{{--            selectedText = document.getElementById('selected-text');--}}

{{--            document.getElementById('my-icon-select').addEventListener('changed', function(e){--}}
{{--                selectedText.value = iconSelect.getSelectedValue();--}}
{{--            });--}}

{{--            iconSelect = new IconSelect("my-icon-select");--}}

{{--            var icons = [];--}}
{{--            icons.push({--}}
{{--                'iconFilePath': '{{ asset('storage/img/admin/emoji_icons/png_512/1.png') }}',--}}
{{--                'iconValue': '1'--}}
{{--            });--}}
{{--            icons.push({--}}
{{--                'iconFilePath': '{{ asset('storage/img/admin/emoji_icons/png_512/2.png') }}',--}}
{{--                'iconValue': '2'--}}
{{--            });--}}
{{--            icons.push({--}}
{{--                'iconFilePath': '{{ asset('storage/img/admin/emoji_icons/png_512/3.png') }}',--}}
{{--                'iconValue': '3'--}}
{{--            });--}}
{{--            icons.push({--}}
{{--                'iconFilePath': '{{ asset('storage/img/admin/emoji_icons/png_512/4.png') }}',--}}
{{--                'iconValue': '4'--}}
{{--            });--}}
{{--            icons.push({--}}
{{--                'iconFilePath': '{{ asset('storage/img/admin/emoji_icons/png_512/5.png') }}',--}}
{{--                'iconValue': '5'--}}
{{--            });--}}
{{--            icons.push({--}}
{{--                'iconFilePath': '{{ asset('storage/img/admin/emoji_icons/png_512/6.png') }}',--}}
{{--                'iconValue': '6'--}}
{{--            });--}}
{{--            icons.push({--}}
{{--                'iconFilePath': '{{ asset('storage/img/admin/emoji_icons/png_512/7.png') }}',--}}
{{--                'iconValue': '7'--}}
{{--            });--}}
{{--            icons.push({--}}
{{--                'iconFilePath': '{{ asset('storage/img/admin/emoji_icons/png_512/8.png') }}',--}}
{{--                'iconValue': '8'--}}
{{--            });--}}
{{--            icons.push({--}}
{{--                'iconFilePath': '{{ asset('storage/img/admin/emoji_icons/png_512/9.png') }}',--}}
{{--                'iconValue': '9'--}}
{{--            });--}}
{{--            icons.push({--}}
{{--                'iconFilePath': '{{ asset('storage/img/admin/emoji_icons/png_512/10.png') }}',--}}
{{--                'iconValue': '10'--}}
{{--            });--}}
{{--            icons.push({--}}
{{--                'iconFilePath': '{{ asset('storage/img/admin/emoji_icons/png_512/11.png') }}',--}}
{{--                'iconValue': '11'--}}
{{--            });--}}
{{--            icons.push({--}}
{{--                'iconFilePath': '{{ asset('storage/img/admin/emoji_icons/png_512/12.png') }}',--}}
{{--                'iconValue': '12'--}}
{{--            });--}}
{{--            icons.push({--}}
{{--                'iconFilePath': '{{ asset('storage/img/admin/emoji_icons/png_512/13.png') }}',--}}
{{--                'iconValue': '13'--}}
{{--            });--}}
{{--            icons.push({--}}
{{--                'iconFilePath': '{{ asset('storage/img/admin/emoji_icons/png_512/14.png') }}',--}}
{{--                'iconValue': '14'--}}
{{--            });--}}
{{--            iconSelect.refresh(icons);--}}
{{--        };--}}
{{--    </script>--}}
{{--</head>--}}
{{--<body>--}}
{{--<div id="my-icon-select">--}}
{{--</div>--}}
{{--<input type="text" id="selected-text" name="selected-text" style="width:65px;" hidden>--}}

{{--</body>--}}
{{--</html>--}}

