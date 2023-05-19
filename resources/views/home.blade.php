@extends('layouts.layout')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{ __('Вы вошли на сайт!') }}
                    </div>
                </div>
                <div class="col-4 mt-2">
                    <a href="{{route('articles.index')}}" class="btn btn-primary btn-lg " tabindex="-1" role="button"
                       aria-disabled="true">
                        Посмотреть все статьи
                    </a>
                </div>
                <div class="col-4 mt-2">
                    <a href="{{route('calculator.materials.index')}}" class="btn btn-primary btn-lg " tabindex="-1" role="button"
                       aria-disabled="true">
                        Калькулятор материалов
                    </a>
                </div>


            </div>
        </div>
    </div>
@endsection
