@extends('layouts.layout')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center">Создать статью</h1>
                <form action="{{route('article.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Заголовок статьи</label>
                        <input type="text" name="title" class="form-control" id="title"
                               placeholder="Введите заголовок статьи">
                        @error('title')
                        <div class="alert alert-danger mt-3" role="alert">
                            Поле должно быть заполнено, не быть числом и быть не больше
                            255 символов
                        </div>
                        @enderror()
                    </div>
                    <div class="mb-3">
                        <label for="text" class="form-label">Текст статьи</label>
                        <textarea class="form-control" name="text" id="text" rows="3"></textarea>
                        @error('text')
                        <div class="alert alert-danger mt-3" role="alert">
                            Поле должно быть заполнено и быть не больше
                            60 000 символов
                        </div>
                        @enderror()
                    </div>
                    <div>
                        <div class="mb-2 d-flex justify-content-center">
                            <img src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg"
                                 alt="example placeholder" style="width: 150px;"/>
                        </div>
                        <label class="form-label" for="image_url">Вы можете добавить картинку</label>
                        <input type="file" name="image_url" class="form-control" id="image_url"/>
                        @error('image_url')
                        <div class="alert alert-danger mt-3" role="alert">
                            Файл не выбран или не является картинкой
                        </div>
                        @enderror()
                    </div>
                    <div class="mt-5 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary btn-lg">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
