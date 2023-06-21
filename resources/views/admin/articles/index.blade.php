@extends('admin.layouts.layout')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="col-4 mt-2 mb-4">
                    <a href="{{route('admin.article.create')}}" class="btn btn-primary btn-lg " tabindex="-1" role="button"
                       aria-disabled="true">
                        Добавить статью
                    </a>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>

                                <tr>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($articles as $article)
                                    <tr>
                                        <td>{{$article->id}}</td>
                                        <td>{{$article->title}}</td>
                                        <td><a href="{{route('admin.article.show', $article->id)}}"><h6>Просмотреть</h6></a></td>
                                        <td><a href="{{route('admin.article.edit', $article->id)}}"><h6>Изменить</h6></a></td>
                                        <td>
                                            <form action="{{route('admin.article.delete', $article->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="border-0 bg-transparent">
                                                    <a class="text-danger" role="button"><h6>Удалить</h6></a>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <a class="btn btn-primary m-lg-3" href="{{ URL::to('/admin') }}">Вернуться на главную</a>
                    <!-- /.card -->
                </div>
                <div class="pagination">
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
