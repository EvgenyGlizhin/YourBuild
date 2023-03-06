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
                <div class="mt-2">
                    <a href="{{route('tags')}}" class="btn btn-primary btn-lg " tabindex="-1" role="button"
                       aria-disabled="true">Добавить тег</a>
                </div>
            </div>
        </div>
    </div>
@endsection
