@extends('admin.layouts.app')

@section('content')

    @subheader
    Пользователь
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
                                {{--                                {{$patient->getFullName()}}--}}
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-widget13">
                        <div class="form-group m-form__group row" id="question_table">
                            <table class="table table-bordered">
                                <thead>
                                @if($questiontest->category_type($questiontest->category_id)=='with_answer')
                                    <h3>Вопрос c ответом</h3>
                                @else
                                    <h3>Вопрос без ответа</h3>
                                @endif
                                <tr>
                                    <th>Вопрос на кыргызском</th>
                                    <th>Вопрос на русском</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{ $questiontest->question_kg }}</td>
                                    <td>{{ $questiontest->question_ru }}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Ответ на кыргызском</th>
                                    <th>Ответ на русском</th>
                                    <th></th>
                                </tr>
                                @foreach($questiontest->answers() as $answer)
                                    @if($questiontest->correct_answer==$answer->id)
                                        <tr style="background: lightgreen;">
                                            <td>{{ $answer->answer_kg }} </td>
                                            <td>{{ $answer->answer_ru }} </td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td>{{ $answer->answer_kg }} </td>
                                            <td>{{ $answer->answer_ru }} </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="m-widget13__action m--align-right">
                            <a href="{{route('questiontests.index')}}" class="m-widget__detalis btn btn-secondary">
                                Назад
                            </a>
                            <a href="{{route('questiontests.edit', $questiontest)}}"
                               class="m-widget__detalis btn btn-info">
                                Редактировать
                            </a>
{{--                            <a href="{{route('questiontests.destroy', $questiontest)}}" class="btn btn-danger">--}}
{{--                                Удалить--}}
{{--                            </a>--}}
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Portlet-->
        </div>
    </div>
    @endcontent

@endsection

