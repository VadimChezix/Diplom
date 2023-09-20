@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="block">
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <h1 class="fs-1">Заявление на поступление</h1>
                </div>
            </div>
<div class="row">
                <div class="col mt-5"><h1 class="fs-2">Основные данные</h1></div>
            </div>
<div class="row">
                <div class="col mt-3">
                  <p class="fs-3">ФИО :{{$statement->surname}} {{$statement->name}} @if ($statement->last_name == 0)
                      
                  @else
                      {{$statement->last_name}}
                  @endif
                  </p>
                  <p class="fs-3">E-mail: {{$statement->email}}</p>
                  <p class="fs-3">Номер телефона: {{$statement->phone_number}}</p>
                  <p class="fs-3"> Дата рождения: {{$statement->birthsday_date}}</p>
                  <p class="fs-3">Гражданство: {{$statement->nationality}}</p>
                  <p class="fs-3">Место рождения: {{$statement->place_of_birth}}</p>
                  <p class="fs-3">Зарегистрирован(а): {{$statement->registered}}</p>
                  <p class="fs-3">Проживает: {{$statement->living}}</p>
            
                </div>
            
            </div>

   


<div class="row">
    <div class="col mt-5">
        <h1 class="fs-2">Образование</h1>
        <p class="fs-3">Результаты освоение образовательной программы: {{$statement->education_level}}</p>
        <p class="fs-3">Среднее специальное образование получаю: {{$statement->count_education}}</p>
        <p class="fs-3">Средний балл атестата {{$statement->atestat_bal}}</p>
        <p class="fs-3">Окончил(а) учебу: {{$statement->date_of_end}}</p>
        <p class="fs-3">Изучаемый язык: {{$statement->language}}</p>

        <p class="fs-3">
            Желаемая специальность: {{$statement->specialization->name}}
         </p>
    </div>
</div>

<div class="row">
    <div class="col mt-5">
        <h1 class="fs-2">Паспортные данные</h1>
        <p class="fs-3">Серия: {{$statement->pasport_seria}}</p>
        <p class="fs-3">Номер: {{$statement->pasport_number}}</p>
        <p class="fs-3">Кем выдан: {{$statement->issued}}</p>
        <p class="fs-3">Снилс: {{$statement->snils}}</p>
    </div>
</div>
<div class="row">
    <div class="col mt-5">
        <h1 class="fs-2">Информация о родителе (законном представителе)</h1>
        <p class="fs-3">ФИО: {{$statement->parent_info}}</p>
        @if ($statement->parent_phone == 0)
            
        @else 
            <p class="fs-3">Номер телефона: {{$statement->parent_phone}}</p>
        @endif
        @if ($statement->parent_other == 0)
            
        @else
            <p class="fs-3">Другое: {{$statement->parent_other}}</p>
        @endif
    </div>
</div>

  
  
<div class="row">
    <div class="col mt-5">
        <h1 class="fs-2">Дополнительно</h1>
        @if ($statement->dormitory == true)
        <p class="fs-3">
            Нуждаемость в общежитии: Нуждается
           </p>
        @else
        <p class="fs-3">
            Нуждаемость в общежитии: Не нуждается
           </p>
        @endif
        @if ($statement->special_condition == true)
           <p class="fs-3">Нуждаемость в специальных условиях: Нуждается</p> 
        @else
        <p class="fs-3">Нуждаемость в специальных условиях: Не нуждается</p>
        @endif
    </div>
</div>
<div class="row mt-3">
    <div class="row mt-3">
        <h1>Фото паспорта</h1>
    <img class="img-fluid" src="{{asset('image_1/' . $statement->image_1)}}" alt="" class="w-40 mb-8 shadow-xl" id="myImg" width="500" height="500">
</div>
 <div class="row mt-3">
    <h1>Фото аттестата(главная сторона)</h1>
    <img class="img-fluid" src="{{asset('image_2/' . $statement->image_2)}}" alt="" class="w-40 mb-8 shadow-xl" width="500" height="500">
</div> 
<div class="row mt-3">
    <h1>Фото аттестата(Приложение одна сторона)</h1>
    <img class="img-fluid" src="{{asset('image_3/' . $statement->image_3)}}" alt="" class="w-40 mb-8 shadow-xl" width="500" height="500">

</div>
<div class="row mt-3">
    <h1>Фото аттестата(Приложение другая сторона)</h1>
    <img class="img-fluid" src="{{asset('image_4/' . $statement->image_4)}}" alt="" class="w-40 mb-8 shadow-xl" width="500" height="500">
</div> 
</div>
   

    
    <div class="row mt-3">
    <div class="col d-flex justify-content-end">
        <a class="btn btn-secondary fs-4" href="{{route('home')}}">На главную</a>
        <a class="btn btn-secondary ms-3 fs-4" href="{{route('statement_index')}}">Назад</a>
    </div>
   
</div>
</div>
    
@endsection