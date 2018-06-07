@extends('layout/main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Панель менеджера</div>

                    <div class="card-body">
                        <a href="{{ route('manager.news.index') }}" class="btn btn-primary">Управление новостями</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection