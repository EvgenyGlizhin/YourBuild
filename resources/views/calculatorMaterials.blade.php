@extends('layouts.layout')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center">Калькулятор материалов</h1>
                <form id="calculatorMaterials">
                    <div class="row justify-content-center">
                        <div class="col-md-7">
                            @csrf
                            <input type="hidden" id="materials-calculation-url" value="{{ route('calculator.materials.calculate') }}">
                            <h4 class="mt-5">Укажите размеры</h4>
                            <div class="input-group flex-nowrap mb-4">
                                <span class="input-group-text"
                                      id="length"><h5>Введите длинну помещения в метрах</h5></span>
                                <input type="text" class="form-control" value="{{ old('length')}}" name="length" placeholder="" aria-label="" aria-describedby="addon-wrapping">
                            </div>
                            <span class="text-danger" id="lengthError"></span>
                            <div class="input-group flex-nowrap mb-4">
                                <span class="input-group-text"
                                      id="width"><h5>Введите ширину помещения в метрах</h5></span>
                                <input type="text" class="form-control" value="{{ old('width')}}" name="width"
                                       placeholder="" aria-label=""
                                       aria-describedby="addon-wrapping">
                            </div>
                            <span class="text-danger" id="widthError"></span>

                            <div class="input-group flex-nowrap mb-4">
                                <span class="input-group-text text"
                                      id="height"><h5>Введите высоту помещения в метрах</h5></span>
                                <input type="text" class="form-control" value="{{ old('height')}}" name="height"
                                       placeholder="" aria-label=""
                                       aria-describedby="addon-wrapping">
                            </div>
                            <span class="text-danger" id="heightError"></span>

                        </div>
                        <div class="col-md-5">
                            <h4 class="mt-5">Выберите вид работ</h4>
                            <select class="form-select form-select-lg mb-3" id="category" name="category"
                                    aria-label=".form-select-lg example">
                                <option value="">Выберите</option>
                                <option value="laminate">Ламинат</option>
                                <option value="wallPaper">Обои без подбора рисунка</option>
                                <option value="wallPaperWithSelection">Обои с подбором рисунка</option>
                                <option value="paintCeiling">Краска на потолок</option>
                                <option value="paintWall">Краска на стены</option>
                                <option value="tileFloor">Плитка на пол</option>
                                <option value="tileWall">Плитка на стены</option>
                            </select>
                            <span class="text-danger" id="categoryError"></span>
                        </div>

                    </div>

                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-primary btn-lg">Провести расчёт</button>
                    </div>
                </form>

                <div class="shadow p-3 mb-5 bg-body-tertiary rounded mt-5">
                    <h4>
                        <div id="result"></div>
                    </h4>
                </div>

                <a class="btn btn-primary m-lg-3" href="{{ URL::to('/home') }}">Вернуться на главную</a>
            </div>
        </div>
    </div>
@endsection
