

@extends('admin.layouts.app')

@section('content')

    @subheader
    Вопросы
    @endsubheader

    @content
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">

        </div>
        <div class="m-portlet__body">
            <!--begin: Search Form -->
            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                <div class="row align-items-center">
                    <div class="col-xl-8 order-2 order-xl-1">
                        <div class="form-group m-form__group row align-items-center">
                            <div class="col-md-4">
                                <div class="m-input-icon m-input-icon--left">
                                    <div class="m-portlet__head-title">
                                        <h3 class="m-portlet__head-text">
                                            Список вопросов
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                        <a href="{{route('categorytests.create')}}"
                           class="btn btn-primary m-btn m-btn--custom m-btn--air m-btn--pill">
                                <span>
                                    <span>
                                        Создать катогории
                                    </span>
                                </span>
                        </a>
                        <a href="{{route('questiontests.create')}}"
                           class="btn btn-primary m-btn m-btn--custom m-btn--air m-btn--pill">
                                <span>
                                    <span>
                                        Создать вопросы
                                    </span>
                                </span>
                        </a>
                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                    </div>

                </div>
            </div>
            <!--end: Search Form -->
            <!--begin: Datatable -->


            <!--end: Datatable -->
            @foreach($categories as $category)
                <ul class="list-group">
                    <li class="list-group-item active">
                        <div class="form-group m-form__group row">
                            <div class="col-lg-0">
                                <label class="m-form__group__label">
                                    Категория:
                                </label>
                            </div>
                            <div class="col-lg-5">
                                <label class="m-form__group__label">
                                    На кыргызском:
                                </label>
                                {{ $category->name_kg }}
                            </div>
                            <div class="col-lg-5">
                                <label class="m-form__group__label">
                                    На русском:
                                </label>
                                {{ $category->name_kg }}
                            </div>
                            <div class="col-lg-1">
                                <a href="{{ route('categorytests.deleted', $category) }}">
                                    <button type="button" class="btn btn-danger">Удалить категорию</button>
                                </a>
                            </div>
                        </div>
                    </li>
                    @if(count($category->questions())>0)
                        @foreach($category->questions() as $question)
                            <li class="list-group-item">
                                <ul class="list-group">
                                    <li class="list-group-item list-group-item-dark" style="padding-bottom: 0;">
                                        <div class="form-group m-form__group row" style="padding-bottom: 0;">
                                            <div class="col-lg-0" style="padding-bottom: 0;">
                                                <label class="m-form__group__label">
                                                    Вопрос:
                                                </label>
                                            </div>
                                            <div class="col-lg-10">
                                                <div class="form-group m-form__group col" style="padding-bottom: 0;">
                                                    <div class="row-lg-0">
                                                        <label>
                                                            На кыргызском:
                                                        </label>
                                                        {{ $question->question_kg }}
                                                    </div>
                                                    <div class="row-lg-0">
                                                        <label>
                                                            На русском:
                                                        </label>
                                                        {{ $question->question_ru }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-1">
                                                <a href="{{ route('questiontests.deleted', $question) }}">
                                                    <button type="button" class="btn btn-danger">Удалить вопрос</button>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li><h5>Ответы:</h5></li>
                                    @foreach($question->answers() as $answer)
                                        <li class="list-group-item">
                                            <div class="form-group m-form__group row">
                                                <div class="col-lg-5">
                                                    <label>
                                                        На кыргызском:
                                                    </label>
                                                    {{ $answer->answer_kg }}
                                                </div>
                                                <div class="col-lg-5">
                                                    <label>
                                                        На русском:
                                                    </label>
                                                    {{ $answer->answer_ru }}
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                        <li class="list-group-item">
                            <div class="form-group m-form__group row">
                                <div class="col-lg-5"></div>
                                <div class="col-lg-5"><a href="{{route('questiontests.create')}}"
                                                         class="btn btn-primary m-btn m-btn--custom m-btn--air m-btn--pill">
                                    <span>
                                        Дабавить вопрос
                                    </span>
                                    </a></div>
                            </div>
                        </li>
                    @else
                        <li class="list-group-item">
                            <div class="form-group m-form__group row">
                                <div class="col-lg-5">Null</div>
                                <div class="col-lg-5"><a href="{{route('questiontests.create')}}"
                                                         class="btn btn-primary m-btn m-btn--custom m-btn--air m-btn--pill">
                                    <span>
                                        Создать вопросы
                                    </span>
                                    </a></div>
                            </div>
                        </li>
                    @endif
                </ul>
            @endforeach
        </div>
    </div>
    @endcontent

@endsection

@section('scripts')


    <script type="text/javascript">
        {{--$(function () {--}}

        {{--    $('#dataTable').DataTable({--}}
        {{--        processing: true,--}}
        {{--        serverSide: true,--}}
        {{--        ajax: '{{ route('questiontests.api') }}',--}}
        {{--        columns: [--}}
        {{--            { data: 'id'},--}}
        {{--            { data: 'question_kg'},--}}
        {{--            { data: 'question_ru'},--}}
        {{--            // { data: 'action', name: 'action', orderable: false, searchable: false},--}}
        {{--        ],--}}
        {{--        pageLength: 25,--}}
        {{--        language: {--}}
        {{--            "url": "{{asset('js/russian.json')}}"--}}
        {{--        }--}}
        {{--    });--}}
        {{--});--}}
    </script>


@endsection

