@extends('layouts.app')
@section('content')

<div class="container">
  
    
    <div class="row mt-3">
        <div class="col d-flex justify-content-center bg-s">
            <h1>Основные данные</h1>
        </div>
    </div>
    <div class="row">
      
        <div class="col">
            
            <form method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
   
                    <div class="col">
                        <label for="name">Имя</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value='{{$user_name}}' >
                        @error('name')
                            <div class="alert alert-danger">Имя введено некорректно</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="surname">Фамилия</label>
                        <input type="text" name="surname" class="form-control @error('surname') is-invalid @enderror" value='{{$user_last_name}}' >
                        @error('surname')
                            <div class="alert alert-danger">Фамилия введена некорректно</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="last_name">Отчество(не обязательно)</label>
                        <input type="text" name='last_name' value="{{old('last_name')}}" class="form-control @error('last_name') is-invalid @enderror" placeholder="Введите одно слово">
                        @error('last_name')
                            <div class="alert alert-danger">Отчество введено некорректно</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="email">Почта</label>
                        <input type="email" name='email' class="form-control @error('email') is-invalid @enderror" value='{{$user_email}}' >
                        @error('email')
                            <div class="alert alert-danger">Email введен некорректно</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col  mt-3">
                <label for="specialization">Специальность</label>
                <select class="form-select " aria-label="Default select example" name="specialization_id" required>
                 @foreach ($specializations as $specialization )
                     <option value="{{$specialization->id}}">{{$specialization->name}}</option>
                 @endforeach
                  </select>
                </div>
             <div class="col mt-3">
                <label for="birthsday">Дата рождения</label>
                <input type="date" class="form-control " name="birthsday_date" value="{{old('birthsday_date')}}" required>
             </div>
             <div class="col mt-3">
                <label for="phone_number">Номер телефона</label>
                <input type="text" class="form-control @error('phone_number') is-invalid @enderror" value="{{old('phone_number')}}" name="phone_number" id="phone-number" placeholder="+7(888)888-88-88" required>
                @error('phone_number')
                    <div class="alert alert-danger">Номер телефона введен некорректно</div>
                @enderror
 
             </div>
             <div class="col mt-3">
                <label for="inn">Гражданство</label>
                <input type="text" class="form-control  @error('nationality') is-invalid @enderror" value="{{old('nationality')}}" placeholder="Введите одно слово" name="nationality" required>
            @error('nationality')
                <div class="alert alert-danger">Гражданство введено некорректно</div>
            @enderror
            </div>
                </div>
                <div class="row">
                    
                    <div class="col mt-3">
                        <label for="pasport_number">Номер паспорта</label>
                        <input type="text" class="form-control @error('pasport_number') is-invalid @enderror" value="{{old('pasport_number')}}" name="pasport_number" placeholder="Введите шесть чисел" required>
                   @error('pasport_number')
                       <div class="alert alert-danger">Номер паспорта введен некорректно</div>
                   @enderror
                    </div>
                    <div class="col mt-3">
                        <label for="pasport_seria">Серия паспорта</label>
                        <input type="text" class="form-control @error('pasport_seria') is-invalid @enderror" value="{{old('pasport_seria')}}" name="pasport_seria" placeholder="Введите четыре числа" required>
                    @error('pasport-seria')
                        <div class="alert alert-danger">Серия паспорта введена некорректно</div>
                    @enderror
                    </div>
                    <div class="col mt-3">
                        <label for="">Кем выдан</label>
                        <input type="text" class="form-control" value="{{old('issued')}}" name="issued" id="" required>
                    </div>
                    <div class="col mt-3">
                        <label for="inn">Снилс(не обязательно)</label>
                        <input type="text" class="form-control  @error('snils') is-invalid @enderror" placeholder="Введите одиннадцать чисел" value="{{old('snils')}}" name="snils" >
                        @error('snils')
                           <div class="alert alert-danger">Снилс введен некорректно</div>
                        @enderror
                    </div>
                    
                </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="propiska">Место рождение</label>
                            <input type="text" class="form-control mt-4  @error('place_of_birth') is-invalid @enderror" value="{{old('place_of_birth')}} "name="place_of_birth" required>
                            @error('place_of_birth')
                            <div class="alert alert-danger">Место рождения введено некорректно</div>
                        @enderror
                        </div>
                        <div class="col">
                            <label for="propiska">Зарегестрирован(на)</label>
                            <input type="text" class="form-control mt-4  @error('registered') is-invalid @enderror" value="{{old('registered')}}" placeholder="Введите адресс по прописке" name="registered"required>
                            @error('registered')
                            <div class="alert alert-danger">Место регистрации введено некорректно</div>
                        @enderror
                        </div>
                        <div class="col">
                            <label for="propiska">Проживающий(ая)</label>
                            <input type="text" class="form-control mt-4  @error('living') is-invalid @enderror" placeholder="Введите адресс проживания" value="{{old('living')}}" name="living" required>
                            @error('living')
                            <div class="alert alert-danger">Место проживания введено некорректно</div>
                        @enderror
                        </div>
                        <div class="col">
                            <label for="">Среднее профессиональное образование по специальности получаю</label>
                            <select name="count_education" id="" class="form-select" required>
                                <option value="" selected>Выберите нужное</option>
                                <option value="Впервые">Впервые</option>
                                <option value="Невпервые">Не впервые</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="">Результаты освоение образовательной программы</label>
                            <select name="education_level" id="" class="form-control" required>
                                <option value="" selected>Выберите нужное</option>
                                <option value="Основное общее" >Основное общее</option>
                                <option value="Среднее общее" >Среднее общее</option>
                            </select>
                        </div>
                        <div class="col ">
                            <label for="" class="">Средний балл аттестата</label>
                            <input type="number"  min="0" max="5" step="0.1" class="form-control mt-4  @error('atestat_bal') is-invalid @enderror" value="{{old('atestat_bal')}}" placeholder="5,0" name="atestat_bal" required>
                            @error('atestat_bal')
                            <div class="alert alert-danger">Средний балл аттестата введен некорректно</div>
                        @enderror
                        </div>
                        <div class="col">
                            <label for="">Окончил(а) учебу</label>
                            <input type="date" name="date_of_end" id="" value="{{old('date_of_end')}}" class="form-control mt-4" required>
                        </div>
                        <div class="col">
                            <label for="">Иностранный язык</label>
                            <select name="language" id="" class="form-control mt-4" required>
                                <option value="" selected>Выберите язык</option>
                                <option value="Английский">Английский</option>
                                <option value="Немецкий">Немецкий</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="">Информация о родителе(законном представителе)</label>
                            <input type="text" class="form-control  @error('parent_info') is-invalid @enderror" value="{{old('parent_info')}}" placeholder="ФИО" name="parent_info" required>
                            @error('parent_info')
                            <div class="alert alert-danger">Информация введена некорректно</div>
                        @enderror
                        </div>
                        <div class="col">
                            <label for="">Телефон(не обязательно)</label>
                            <input type="text" class="form-control" value="{{old('parent_phone')}}" id="parent-phone" placeholder="+7(888)888-88-88" name="parent_phone">
                        </div>
                        <div class="col">
                            <label for="">Другое(не обязательно)</label>
                            <input type="text" class="form-control" value="{{old('parent_other')}}" name="parent_other">
                        </div>
                    </div>
                
                <div class="row mt-3">
                    <div class="col">
                        <label for="pasport_photo">
            Фото паспорта
                        </label>
                        <input class="form-control @error('image_1') is-invalid @enderror" name="image_1" type="file" id="formFile" required>
                        @error('image_1')
                            <div class="alert alert-danger">Не правильный формат</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="education_certificate">
                            Фото аттестата(Главная страница)
                        </label>
                        <input class="form-control @error('image_2') is-invalid @enderror" name="image_2" type="file" id="formFile" required>
                        @error('image_2')
                        <div class="alert alert-danger">Не правильный формат</div>
                    @enderror
                    </div>
                    <div class="col">
                        <label for="education_certificate">
                            Фото аттестата(Приложение одна сторона)
                        </label>
                        <input class="form-control @error('image_3') is-invalid @enderror" name="image_3" type="file" id="formFile" required>
                        @error('image_3')
                        <div class="alert alert-danger">Не правильный формат</div>
                    @enderror
                    </div>
                    <div class="col">
                        <label for="education_certificate">
                            Фото аттестата(Приложение другая сторона)
                        </label>
                        <input class="form-control @error('image_4') is-invalid @enderror" name="image_4" type="file" id="formFile" required>
                        @error('image_4')
                        <div class="alert alert-danger">Не правильный формат</div>
                    @enderror
                    </div>
                </div>
        
              <div class="row mt-3 d-flex justify-content-center">
                <div class="col mt-4">
                <label class="fs-5">Нуждаемость в общежитии</label>
                <div class="form-check ">
                    <input class="form-check-input" type="checkbox" name="dormitory" id="flexRadioDefault1">
                    <label class="form-check-label fs-5" for="flexRadioDefault1">
                      Да
                    </label>
                  </div>
            
            </div>
           
            
              </div>
              <div class="row mt-3">
                <div class="col mt-4">
                <label for="" class="fs-5">Нуждаемость в специальных условиях при проведении
                    вступительных испытаний в связи с инвалидностью или ограниченными возможностями
                    здоровья</label>
                    <div class="form-check mt-3">
                        <input type="checkbox" name="special_condition" class="form-check-input" >
                        <label for="" class="form-check-label fs-5">Да</label>
                    </div>
                </div>
                <div class="col mt-4">
                    <label for="" class="fs-5">Ознакомлен(а) (в том числе через информационные системы общего пользования) с копиями лицензии на
                        осуществление образовательной деятельности, свидетельства о государственной аккредитации образовательной
                        деятельности по образовательным программам и приложениями к ним</label>
                      
                            <div class="form-check mt-3">
                                <input type="checkbox" name="accept_1" class="form-check-input"  required>
                                <label for="" class="form-check-label fs-5">Да</label>
                            </div>
                        </div>

            </div>
            {{-- <div class="row mt-3">
               
            </div> --}}
            <div class="row mt-3">
                <div class="col mt-4">
                <label for="" class="fs-5">Правилами внутреннего распорядка, правами и обязанностями обучающихся
                    КГБПОУ «БГПК имени В.К. Штильке» ознакомлен (а)</label>
                    
                        <div class="form-check mt-3">
                            <input type="checkbox" name="accept_2" class="form-check-input" required>
                            <label for="" class="form-check-label fs-5">Да</label>
                        </div>
                    </div>
                    <div class="col mt-4">
                        <label for="" class="fs-5">С датой предоставления оригинала документа об образовании и (или) документа об образовании и о квалификации
                            ознакомлен (а)</label>
                            
                                <div class="form-check mt-3">
                                    <input type="checkbox" name="accept_3" class="form-check-input" required>
                                    <label for="" class="form-check-label fs-5">Да</label>
                                </div>
                            </div>
            </div>
            {{-- <div class="row mt-3">
               
            </div> --}}
            <div class="row mt-3">
                <div class="col d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Отправить анкету</button>
                </div>
            </div>
            </form>

        </div>
    </div>
    <div class="row">
        <div class="col d-flex justify-content-end">
            <a class="btn btn-secondary" href="{{route('home')}}">На главную</a> <a class="btn btn-secondary ms-3" href="{{route('statement_index')}}">Посмотреть заявку</a>
        </div>
       
    </div>
    
</div>




@endsection