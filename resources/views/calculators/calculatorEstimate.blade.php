@extends('layouts.layout')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center">Калькулятор подсчета сметы</h1>
                    <div class="row justify-content-center">
                        <div class="col-md-7">
                            <form action="{{ route('calculator.estimate.calculate') }}" method="post">
                            @csrf
                            <h4 class="mt-5">Укажите размеры</h4>
                            <div class="input-group flex-nowrap mb-4">
                                <span class="input-group-text"><h5>Введите длинну помещения в метрах</h5></span>
                                <input type="text" class="form-control" value="{{ old('length')}}" name="length" placeholder="" aria-label="" aria-describedby="addon-wrapping">
                            </div>
                                @error('length')
                                <span class="text-danger"> Введите длинну</span>
                                @enderror
                            <div class="input-group flex-nowrap mb-4">
                                <span class="input-group-text"><h5>Введите ширину помещения в метрах</h5></span>
                                <input type="text" class="form-control" value="{{ old('width')}}" name="width" placeholder="" aria-label="" aria-describedby="addon-wrapping">
                            </div>
                                @error('width')
                                <span class="text-danger"> Введите ширину</span>
                                @enderror
                            <div class="input-group flex-nowrap mb-4">
                                <span class="input-group-text text"><h5>Введите высоту помещения в метрах</h5></span>
                                <input type="text" class="form-control" value="{{ old('height')}}" name="height"
                                       placeholder="" aria-label=""
                                       aria-describedby="addon-wrapping">
                            </div>
                                @error('height')
                                <span class="text-danger"> Введите высоту</span>
                                @enderror
                        </div>
                        <div class="col-md-5">
                            <h4 class="mt-5">Выберите вид работ</h4>
                            <select class="form-select form-select-lg mb-3" name="category" value="{{ old('category')}}" aria-label=".form-select-lg example">
                                <option value="">Выберите</option>
                                <option value="laminate" {{ old('category') == 'laminate' ? 'selected' : '' }}>Ламинат</option>
                                <option value="wallPaper" {{ old('category') == 'wallPaper' ? 'selected' : '' }}>Обои</option>
                                <option value="paintCeiling" {{ old('category') == 'paintCeiling' ? 'selected' : '' }}>Краска на потолок</option>
                                <option value="paintWall" {{ old('category') == 'paintWall' ? 'selected' : '' }}>Краска на стены</option>
                                <option value="tileFloor" {{ old('category') == 'tileFloor' ? 'selected' : '' }}>Плитка на пол</option>
                                <option value="tileWall" {{ old('category') == 'tileWall' ? 'selected' : '' }}>Плитка на стены</option>
                            </select>
                            @error('category')
                            <span class="text-danger"> Выберите вид работ</span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <h4 class="mt-5">Введите email на который вы хотите отправить смету</h4>
                        <input class="form-control form-control-lg" type="text" name="email" placeholder="example@gmail.com" value="{{ old('email')}}" aria-label=".form-control-lg example">
                    </div>
                    @error('email')
                    <span class="text-danger"> Введите email</span>
                    @enderror
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="approveSaveEmail" value = "true" id="approveSaveEmail" checked>
                    <label class="form-check-label" for="approveSaveEmail">
                        Разрешить использовать email для оповещений и акций.
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="approveSaveEmail" value = "false" id="approveSaveEmail">
                    <label class="form-check-label" for="approveSaveEmail">
                        Не разрешать использовать email для оповещений и акций.
                    </label>
                </div>
                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-primary btn-lg">Провести расчёт и отправить</button>
                    </div>
                </form>
                @if(isset($successfulSendMail))
                <div class="mt-3 text-center">
                    <h3>{{$successfulSendMail}}</h3>
                </div>
                @endif
                <a class="btn btn-primary m-lg-3" href="{{ URL::to('/home') }}">Вернуться на главную</a>
                <div class="text-lg-end">
                <p>*более точный подсчет, с учетом всех дополнительных работ, возможен при личном визите нашего мастера.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
