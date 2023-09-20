@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col">
    <div class="container">
        <div class="row">
            <div class="col d-flex justify-content-center">
            <p class="fs-1">Добро пожаловать в личный кабинет</p>
            </div>
        </div>
        <div class="row mt-3">
            <span class="fs-2">
                Полное официальное наименование образовательного учреждения:
            </span>
            <span class="fs-3">Краевое государственное бюджетное профессиональное образовательное учреждение "Барнаульский государственный педагогический колледж имени Василия Константиновича Штильке"</span>

        </div>
        <div class="row mt-3">
            <span class="fs-2">Юридический и фактический адрес:</span>
            <span class="fs-3">656010, Алтайский край, г. Барнаул, ул. 80-й Гвардейской Дивизии, д. 41.</span>
        </div>
        <div class="row">
         <span class="fs-2">Подробнее о специальностях:</span>
         <div class="col mt-2"><a class="btn btn-primary fs-5" href="{{route('specialization_index')}}">Посмотреть</a></div>

    </div>
        <div class="row mt-4 ">
            <div class="block d-flex justify-content-center">
    
        <div class="col mt-3 d-flex justify-content-center "> <a class='btn btn-primary fs-5' href="{{route('statement_create')}}">Создать заявление</a></div>
        <div class="col mt-3 d-flex justify-content-center"><a class='btn btn-primary fs-5' href="{{route('statement_index')}}">Посмотреть заявку</a></div>
    </div>
        </div>
        
    </div>
    
</div>

</div>

@endsection
 