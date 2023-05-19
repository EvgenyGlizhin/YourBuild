@extends('admin.layouts.layout')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="col-4 mt-2">
                    <a href="{{route('admin.articles.index')}}" class="btn btn-primary btn-lg " tabindex="-1" role="button"
                       aria-disabled="true">
                        Статьи
                    </a>
                </div>
                <div class="col-4 mt-2">
                    <a href="{{route('admin.tag.create')}}" class="btn btn-primary btn-lg " tabindex="-1" role="button"
                       aria-disabled="true">
                        Добавить тег
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
