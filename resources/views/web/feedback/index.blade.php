<section class="section feedback">
    <div class="container feedback-text">
        <div class="row align-items-center slide-item-center justify-content-center">
            <div class="col-md-6">
                <div class="section-title white-color">Обратная связь.<span class="white-color">Оставайтесь на связи.</span></div>
                Оставленные сообщения
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Наименование обязательства</th>
                                <th width="150" class="text-center">Дата подачи заявки</th>
                                <th width="200" class="text-center">Дата публикации</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($rows as $row)
                                <tr>
                                    <td><a href="{{route('feedback.show', $row->id)}}">{{$row->desc}}</a></td>
                                    <td class="text-center">{{$row->getDate()}}</td>
                                    <td class="text-center">{{$row->getDate()}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

