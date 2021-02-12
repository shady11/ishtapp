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
                Выберите категорию:
            </label>
            <select name="categories" id="categor" class="form-control" onclick="myFunction()">
                <option class="placeholder" selected disabled value="">Выберите категорию</option>
                @foreach($questiontest->categories() as $category)
                    @if($questiontest->category_name($questiontest->category_id)==$category->name_ru)
                        <option value="{{$category}}" selected>{{$category->name_ru}}</option>
                        <script type="text/javascript">myFunction();</script>
                    @else
                        <option value="{{$category}}">{{$category->name_ru}}</option>
                    @endif
                @endforeach
            </select>
            @if ($errors->has('categories'))
                <div class="form-group has-error">
                    <span class="help-block">{{ $errors->first('categories') }}</span>
                </div>
            @endif
        </div>
        <div class="col-lg-3">

            <label class="m-form__group__label"></label>
            <a href="{{route('categorytests.create')}}" class="m-menu__link m-menu__toggle">
                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                    <span></span>
                </i>
                <span class="m-menu__link-text">Создать категорию</span>
            </a>
        </div>
    </div>
    <div class="form-group m-form__group row" id="question_table">
        <table class="table table-bordered">
            <thead>

            <h3>Вопрос</h3>
            <tr>
                <th>Вопрос на кыргызском</th>
                <th>Вопрос на русском</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{!! Form::text('question_kg', null, ['class' => 'form-control m-input']) !!}
                    @if ($errors->has('question_kg'))
                        <div class="form-group has-error">
                            <span class="help-block">{{ $errors->first('question_ru') }}</span>
                        </div>
                    @endif
                </td>
                <td>{!! Form::text('question_ru', null, ['class' => 'form-control m-input']) !!}
                    @if ($errors->has('question_ru'))
                        <div class="form-group has-error">
                            <span class="help-block">{{ $errors->first('question_ru') }}</span>
                        </div>
                    @endif
                </td>
                <td></td>
            </tr>
            <tr>
                <th>Ответ на кыргызском</th>
                <th>Ответ на русском</th>
                <th></th>
            </tr>
            @foreach($questiontest->answers() as $answer)
                <tr>
                    <td><input type="text" name="answer_kg[]" class="form-control m-input"
                               value="{{ $answer->answer_kg }}"></td>
                    <td><input type="text" name="answer_ru[]" class="form-control m-input"
                               value="{{ $answer->answer_ru }}"></td>
                    <td>
                        <button type="button" class="btn btn-primary" id="remove"><i
                                class="glyphicon glyphicon-remove"></i></button>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td>
                    <button type="button" class="btn btn-info" id="btn_add">
                        <i class="glyphicon glyphicon-plus"></i>
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
        <div id="myradios">
            <label style="font-size: 20px;padding-right: 15px;">Выберите правильный ответ:</label>
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
</div>
@section('scripts')
    <script type="text/javascript">
        var html = '';
        @if($questiontest->category_type($questiontest->category_id)=='without_answer')
            myFunction();
        @else
            @foreach($questiontest->answers() as $answer)
                @if($questiontest->correct_answer==$answer->id)
                    var radios = document.getElementsByClassName("form-check form-check-inline");
                    html = '<div class="form-check form-check-inline" id="radiodiv">\n' +
                        '<input class="form-check-input" type="radio" name="rb" id="myradio" value=';
                    html += radios.length;
                    html += ' checked><label class="form-check-label" for="inlineRadio1">';
                    html += radios.length + 1;
                    html += '</label></div>';
                    $('#myradios').append(html);
                @else
                    var radios = document.getElementsByClassName("form-check form-check-inline");
                    html = '<div class="form-check form-check-inline" id="radiodiv">\n' +
                        '<input class="form-check-input" type="radio" name="rb" id="myradio" value=';
                    html += radios.length;
                    html += '><label class="form-check-label" for="inlineRadio1">';
                    html += radios.length + 1;
                    html += '</label></div>';
                    $('#myradios').append(html);
                @endif
            @endforeach
        @endif
        $(document).ready(function () {
            $('#btn_add').on('click', function () {
                var html = '';
                html += '<tr>';
                html += '<td>{!! Form::text("answer_kg[]", null, ["class" => "form-control m-input"]) !!}</td>';
                html += '<td>{!! Form::text("answer_ru[]", null, ["class" => "form-control m-input"]) !!}</td>';
                html += '<td><button type="button" class="btn btn-primary" id="remove"><i class="glyphicon glyphicon-remove"></i></button></td>';
                html += '</tr>';
                $('tbody').append(html);
                var radios = document.getElementsByClassName("form-check form-check-inline");
                html = '<div class="form-check form-check-inline" id="radiodiv">\n' +
                    '<input class="form-check-input" type="radio" name="rb" id="myradio" value=';
                html += radios.length;
                html += '><label class="form-check-label" for="inlineRadio1">';
                html += radios.length + 1;
                html += '</label></div>';
                $('#myradios').append(html)
            })
        });
        $(document).on('click', '#remove', function () {
            $(this).closest('tr').remove();
            const myNode = document.getElementById('myradios');
            myNode.removeChild(myNode.lastElementChild);
        });

        function myFunction() {
            var x = document.getElementById("categor").value;
            if (JSON.parse(x).type == 'without_answer') {
                var Node = document.getElementById('myradios');
                Node.style.display = "none";
            } else {
                var Node = document.getElementById('myradios');
                Node.style.display = "block";
            }
        }

    </script>
@endsection
