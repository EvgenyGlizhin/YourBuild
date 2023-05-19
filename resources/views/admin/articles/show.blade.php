@extends('admin.layouts.layout')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center">{{$article->title}}</h1>
            </div>
            <div class="mt-3 col-6">
                <img width="600" height="400" src="{{asset('/storage/' . $article->image_url)}}" alt="">
            </div>
            <div class="card mt-3 col-10">
                <div>
                    <h4>{{$article->text}}</h4>
                </div>
            </div>
            <div class="col-10 mt-3">
                <img src="{{asset('/storage/uploads/alarm.svg')}}" alt="">
                <span class="m-lg-3">{{$article->created_at->toDateString()}}</span>
                <img class="" src="{{asset('/storage/uploads/person-circle.svg')}}" alt="">
                <span class="m-lg-3">{{$article->user->name}}</span> <br>
                <a class="btn btn-primary m-lg-3" href="{{ URL::to('/articles') }}">Вернуться к статьям</a>
            </div>
            <div class="col-10 mt-3">
                <h2>Комментарии({{$article->comments->count()}})</h2>
            </div>
            <div class="col-10">
                <form action="{{route('comment.store', $article->id)}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="comment" class="form-label">Добавить комментарий</label>
                        <textarea class="form-control" id="comment" name="text" rows="3"
                                  placeholder="Введите комментарий"></textarea>
                        <input type="hidden" name="article_id" value="{{$article->id}}">
                        @error('text')
                        <div class="alert alert-danger mt-3" role="alert">
                            Это поле нужно заполнить
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Отправить комментарий</button>
                </form>
            </div>
            <div class="col-10 mt-3">
                <h3>
                    @foreach($article->comments as $comment)
                        <div class="alert alert-dark" role="alert">
                            <h5>{{$comment->text}}</h5>
                            <h5>{{$comment->user->name}}</h5>
                            <h5>{{$comment->created_at->toDateString()}}</h5>
                        </div>
                    @endforeach
                </h3>
            </div>
        </div>
    </div>
@endsection
