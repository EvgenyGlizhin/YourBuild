@extends('layouts.layout')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center">Your Build Blog</h1>
        <div class="row">
            <div class="container mt-3 ">

                @foreach($articles as $article)
                    <div class="col-md-10 m-lg-auto">
                        <div class="card mt-3">
                            <div class="card-body">
                                <div class="row">
                                <div class="col col-md-4">
                                    <img width="200" height="200" src="{{asset('/storage/'. $article->image_url)}}" alt="">
                                </div>
                                <div class="col-md-8">
                                    <h5 class="card-title">{{$article->title}}</h5>
                                    <p class="card-text" style="max-width: 400em; max-height: 50em;">{{$article->text}}</p>
                                    <img src="{{asset('/storage/uploads/alarm.svg')}}" alt="">
                                    <span class="m-lg-3">{{substr($article->created_at, 0, 10)}}</span>
                                    <img class="" src="{{asset('/storage/uploads/person-circle.svg')}}" alt="">
                                    <span class="m-lg-3">{{$article->name}}</span>
                                    <a href="#" class="btn btn-primary">Открыть статью</a>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <a class="btn btn-primary m-lg-3" href="{{ URL::to('/home') }}">Вернуться на главную</a>
            </div>
        </div>
    </div>
@endsection
