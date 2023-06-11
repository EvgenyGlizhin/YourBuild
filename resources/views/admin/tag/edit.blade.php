@extends('admin.layouts.layout')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="">
                    <form action="{{route('admin.tag.update', $tag->id)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label for="title" class="form-label">Ведите название тега</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Название тега" value="{{$tag->title}}">
                            @error('title')
                            <div class="alert alert-danger mt-3" role="alert">
                                Поле должно быть заполнено, иметь уникальное значение, не быть числом и быть не больше
                                20 символов
                            </div>
                            @enderror()
                        </div>
                        <button type="submit" class="btn btn-primary">Изменить тег</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
