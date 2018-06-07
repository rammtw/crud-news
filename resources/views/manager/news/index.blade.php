@extends('layout/main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Новости</div>

                    <div class="card-body">
                        <a href="{{ route('manager.news.make') }}" class="btn btn-primary mb-3">Создать новость</a>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Категория</th>
                                <th scope="col">Заголовок</th>
                                <th scope="col">Дата создания</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($news as $item)
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->category->title }}</td>
                                    <td><a href="{{ route('news.show', $item->id) }}">{{ $item->title }}</a></td>
                                    <td>{{ with($item->created_at)->format('H:i:s d-m-Y') }}</td>
                                    <td>
                                        <a href="{{ route('manager.news.edit', $item->id) }}" class="btn btn-sm btn-primary mb-2">Редактировать</a>
                                        <form action="{{ route('manager.news.delete', $item->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger">Удалить</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection