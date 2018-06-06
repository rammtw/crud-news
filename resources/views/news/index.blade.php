@extends('layout/main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">News</div>

                    <div class="card-body">
                        <div class="filter">
                            <form class="form-inline">
                                <div class="form-group mb-2 mr-sm-2">
                                    <label for="category" class="sr-only">Категория</label>
                                    <select name="category_id" class="form-control">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary mb-2">Фильтр</button>
                            </form>
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Категория</th>
                                <th scope="col">Заголовок</th>
                                <th scope="col">Дата создания</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($news as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->category->title }}</td>
                                        <td><a href="{{ route('news.show', $item->id) }}">{{ $item->title }}</a></td>
                                        <td>{{ with($item->category->created_at)->format('H:i:s d-m-Y') }}</td>
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