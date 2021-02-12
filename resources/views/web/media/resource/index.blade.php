@extends('web.layouts.app')

@section('title', 'BSC')

@section('styles')

@endsection

@section('breadcrumbs')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page">
                <a href="{{route('web')}}"><i class='bx bx-home'></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Полезные ресурсы</li>
        </ol>
    </nav>
</div>
@endsection

@section('content')
<section class="section faq">
    <div class="container">
        <div class="row blocks popular-left-block">
            @foreach($rows as $resource)
            <div class="col-md-4">
                <a href="{{route('resource.show', $resource->id)}}" class="
                @if($loop->index >= 4)
                    @if($loop->odd)card card-block-primary
                    @else card card-block-second
                    @endif
                @else
                    @if($loop->even)card card-block-primary
                    @else card card-block-second
                    @endif
                @endif
                ">
                    <div class="card-center">
                        {!! $resource->icon !!}
                        <div class="card-title">{{$resource->getName()}}</div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

@section('scripts')

@endsection
