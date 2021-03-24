@extends('admin.layouts.app')

@section('content')

    @include('admin.partials.subheader')

    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="card card-custom gutter-b example example-compact">
                <div class="card-header">
                    <h3 class="card-title">Редактировать</h3>
                </div>
                <!--begin::Form-->
                {!! Form::model($user, ['route' => ['users.update', $user], 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'class' => 'form']) !!}
                    @include('admin.users.form', $user)
                {!! Form::close() !!}
                <!--end::Form-->
            </div>
        </div>
        <!--end::Container-->
    </div>

@endsection

@section('scripts')
    <script>
        var avatar2 = new KTImageInput('kt_image_2');
    </script>
@endsection
