@extends('layout/main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Редактировать новость</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('manager.news.update', $news->id) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="title">Название</label>
                                <input value="{{ $news->title }}" type="text" class="form-control" name="title" placeholder="Название">
                            </div>
                            <div class="form-group">
                                <label for="category">Категория</label>
                                <select class="form-control" name="category_id">
                                    @foreach($categories as $category)
                                        <option {{ $news->category_id === $category->id ? 'selected=selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Описание</label>
                                <textarea name="description" type="text" class="form-control" placeholder="Описание" rows="5">{{ $news->description }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection