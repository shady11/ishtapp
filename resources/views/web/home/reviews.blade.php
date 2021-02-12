<section class="section p-50">
    <div class="container">
        <div class="section-body row align-items-center review-item-center justify-content-center">
            <div class="col-md-4">
                <div class="section-title">Предприниматели.<span>Отзывы о работе ЦОП.</span></div>
                <div class="review-controls">
                    <div class="review-controls-dots">
                        <div class="reviewAppendDots"></div>
                    </div>
                    <div class="review-controls-pagination">
                        <a href="#" class="btn btn-prev-2"><i class='bx bx-left-arrow-alt' ></i></a>
                        <a href="#" class="btn btn-next-2"><i class='bx bx-right-arrow-alt' ></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="review-items">
                    @foreach($entrepreneurs as $entrepreneur)
                    <div class="review-item">
                        <div class="container">
                            <div class="media row">
                                <div class="align-self-center">
                                    <div class="review-item-img">
                                        @if($entrepreneur->avatar)
                                            <img src="{{asset($entrepreneur->avatar)}}" alt="{{$entrepreneur->getFio()}}">
                                        @endif
                                    </div>
                                </div>
                                <div class="media-body align-self-center">
                                    <div class="review-item-quote">
                                        <i class='bx bxs-quote-alt-left' ></i>
                                    </div>
                                    <div class="review-item-desc">
                                        {{$entrepreneur->getReview()}}
                                    </div>
                                    <div class="review-item-footer">
                                        <div class="review-item-footer-name">{{$entrepreneur->getFio()}}</div>
                                        <div class="review-item-footer-line">  / </div>
                                        <div class="review-item-footer-last">{{$entrepreneur->getPosition()}}</div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
