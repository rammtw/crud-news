@extends('layout/main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Новость № {{ $news->id }}</div>

                    <div class="card-body">
                        <h4>{{ $news->title }}</h4>
                        <p>{{ $news->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection