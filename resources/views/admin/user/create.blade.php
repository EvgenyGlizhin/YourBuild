@extends('admin.layouts.layout')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center">Создать пользователя</h1>
                <form action="{{route('admin.user.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Введите имя пользователя</label>
                        <input type="text" name="name" class="form-control" id="name"
                               placeholder="Введите имя">
                        @error('name')
                        <div class="alert alert-danger mt-3" role="alert">
                            Поле должно быть заполнено, не быть числом и быть не больше
                            255 символов
                        </div>
                        @enderror()
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Введите email пользователя</label>
                        <input type="text" name="email" class="form-control" id="email"
                               placeholder="Введите email">
                        @error('email')
                        <div class="alert alert-danger mt-3" role="alert">
                            Поле должно быть заполнено в формате "email@gmai.com", и иметь уникальное значение
                        </div>
                        @enderror()
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Введите пароль</label>
                        <input type="text" name="password" class="form-control" id="password"
                               placeholder="Введите пароль">
                        @error('password')
                        <div class="alert alert-danger mt-3" role="alert">
                            Поле должно быть заполнено и состоять минимум из 8 символов
                        </div>
                        @enderror()
                    </div>
                    <div class="col-md-5">
                        <h4 class="mt-5">Выберите роль</h4>
                        <select class="form-select form-select-lg mb-3" id="is_admin" name="is_admin"
                                aria-label=".form-select-lg example">
                            <option value="">Выберите</option>
                            <option value="0">Пользователь</option>
                            <option value="1">Админ</option>
                        </select>
                        @error('is_admin')
                        <div class="alert alert-danger mt-3" role="alert">
                            Поле должно быть заполнено
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
