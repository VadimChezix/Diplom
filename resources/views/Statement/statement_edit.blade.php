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
            
            <form method="post" action="{{route('statement_update',$statement->id)}}">
                @method('put')
                @csrf
                <div class="row">
   
                    <div class="col">
                        <label for="name">Имя</label>
                        <input type="text" name="name" class="form-control" value='{{$statement->name}}' >
                        <input type="text" name="user_id" value="{{$statement->user_id}}" hidden>
                    </div>
                    
                    <div class="col">
                        <label for="surname">Фамилия</label>
                        <input type="text" name="surname" class="form-control" value='{{$statement->surname}}' >
                    </div>
                    <div class="col">
                        <label for="last_name">Отчество(не обязательно)</label>
                        <input type="text" name='last_name' value="{{$statement->last_name}}" class="form-control @error('last_name') is-invalid @enderror">
                        @error('last_name')
                            <div class="alert alert-danger">Отчество введено некорректно</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="email">Почта</label>
                        <input type="text" name='email' class="form-control" value='{{$statement->email}}' >
                    </div>
                </div>
                <div class="row">
                    <div class="col  mt-3">
                <label for="specialization">Специальность</label>
                <select class="form-select mt-4" aria-label="Default select example" name="specialization_id" required>
                    <option value="{{$statement->specialization_id}}" selected>{{$statement->specialization->name}}</option>
                 @foreach ($specializations as $specialization )
                     <option value="{{$specialization->id}}">{{$specialization->name}}</option>
                 @endforeach
                  </select>
                </div>
             <div class="col mt-3">
                <label for="birthsday">Дата рождения</label>
                <input type="date" class="form-control mt-4" name="birthsday_date" value="{{$statement->birthsday_date}}" required>
             </div>
             <div class="col mt-3">
                <label for="phone_number">Номер телефона(введите в предложенном формате)</label>
                <input type="text" " class="form-control @error('phone_number') is-invalid @enderror" value="{{$statement->phone_number}}" name="phone_number"  placeholder="8(***)***-***-*" required>
                @error('phone_number')
                    <div class="alert alert-danger">Номер телефона введен некорректно</div>
                @enderror
 
             </div>
             <div class="col mt-3">
                <label for="inn">Гражданство</label>
                <input type="text" class="form-control mt-4 @error('nationality') is-invalid @enderror" value="{{$statement->nationality}}" name="nationality" required>
            @error('nationality')
                <div class="alert alert-danger">Гражданство введено некорректно</div>
            @enderror
            </div>
                </div>
                <div class="row">
                    
                    <div class="col mt-3">
                        <label for="pasport_number">Номер паспорта</label>
                        <input type="text" class="form-control @error('pasport_number') is-invalid @enderror" value="{{$statement->pasport_number}}" name="pasport_number" required>
                   @error('pasport_number')
                       <div class="alert alert-danger">Номер паспорта введен некорректно</div>
                   @enderror
                    </div>
                    <div class="col mt-3">
                        <label for="pasport_seria">Серия паспорта</label>
                        <input type="text" class="form-control @error('pasport_seria') is-invalid @enderror" value="{{$statement->pasport_seria}}" name="pasport_seria" required>
                    @error('pasport-seria')
                        <div class="alert alert-danger">Серия паспорта введена некорректно</div>
                    @enderror
                    </div>
                    <div class="col mt-3">
                        <label for="">Кем выдан</label>
                        <input type="text" class="form-control" name="issued" id=""  value="{{$statement->issued}}" required>
                    </div>
                    <div class="col mt-3">
                        <label for="inn">Снилс(не обязательно)</label>
                        <input type="text" class="form-control  @error('snils') is-invalid @enderror" value="{{$statement->snils}}" name="snils">
                        @error('snils')
                           <div class="alert alert-danger">Снилс введен некорректно</div>
                        @enderror
                    </div>
                    
                </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="propiska">Место рождение</label>
                            <input type="text" class="form-control mt-4  @error('place_of_birth') is-invalid @enderror" value="{{$statement->place_of_birth}} "name="place_of_birth" required>
                            @error('place_of_birth')
                            <div class="alert alert-danger">Место рождения введено некорректно</div>
                        @enderror
                        </div>
                        <div class="col">
                            <label for="propiska">Зарегестрирован(на)</label>
                            <input type="text" class="form-control mt-4  @error('registered') is-invalid @enderror" value="{{$statement->registered}}" name="registered"required>
                            @error('registered')
                            <div class="alert alert-danger">Место регистрации введено некорректно</div>
                        @enderror
                        </div>
                        <div class="col">
                            <label for="propiska">Проживающий(ая)</label>
                            <input type="text" class="form-control mt-4  @error('living') is-invalid @enderror" value="{{$statement->living}}" name="living" required>
                            @error('living')
                            <div class="alert alert-danger">Место проживания введено некорректно</div>
                        @enderror
                        </div>
                        <div class="col">
                            <label for="">Среднее профессиональное образование по специальности получаю</label>
                            <select name="count_education" id="" class="form-select" required>
                                <option value="{{$statement->count_education}}" selected>{{$statement->count_education}}</option>
                                <option value="Впервые">Впервые</option>
                                <option value="Невпервые">Не впервые</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="">Результаты освоение образовательной программы</label>
                            <select name="education_level" id="" class="form-control" required>
                                <option value="{{$statement->education_level}}" selected>{{$statement->education_level}}</option>
                                <option value="Основное общее" >Основное общее</option>
                                <option value="Среднее общее" >Среднее общее</option>
                            </select>
                        </div>
                        <div class="col ">
                            <label for="" class="">Средний балл аттестата</label>
                            <input type="number"  min="0" max="5" step="0.1" class="form-control mt-4  @error('atestat_bal') is-invalid @enderror" value="{{$statement->atestat_bal}}" name="atestat_bal" required>
                            @error('atestat_bal')
                            <div class="alert alert-danger">Средний балл аттестата введен некорректно</div>
                        @enderror
                        </div>
                        <div class="col">
                            <label for="">Окончил(а) учебу</label>
                            <input type="date" name="date_of_end" id="" value="{{$statement->date_of_end}}" class="form-control mt-4" required>
                        </div>
                        <div class="col">
                            <label for="">Иностранный язык</label>
                            <select name="language" id="" class="form-control mt-4" required>
                                <option value="{{$statement->language}}" selected>{{$statement->language}}</option>
                                <option value="Английский">Английский</option>
                                <option value="Немецкий">Немецкий</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="">Информация о родителе(законном представителе)</label>
                            <input type="text" class="form-control  @error('parent_info') is-invalid @enderror" value="{{$statement->parent_info}}" placeholder="ФИО" name="parent_info" required>
                            @error('parent_info')
                            <div class="alert alert-danger">Информация введена некорректно</div>
                        @enderror
                        </div>
                        <div class="col">
                            <label for="">Телефон(не обязательно)</label>
                            <input type="text" class="form-control" value="{{$statement->parent_phone}}" placeholder="8(***)***-***-*" name="parent_phone">
                        </div>
                        <div class="col">
                            <label for="">Другое(не обязательно)</label>
                            <input type="text" class="form-control" value="{{$statement->parent_other}}" name="parent_other">
                        </div>
                    </div>
                
                <div class="row mt-3">
                    <div class="col">
                        <label for="pasport_photo">
            Фото паспорта
                        </label>
                        <input class="form-control" type="file" id="formFile" name="image_1">
                    </div>
                    <div class="col">
                        <label for="education_certificate">
                            Фото аттестата(Главная страница)
                        </label>
                        <input class="form-control" type="file" id="formFile" name="image_1">
                    </div>
                    <div class="col">
                        <label for="education_certificate">
                            Фото аттестата(Приложение одна сторона)
                        </label>
                        <input class="form-control" type="file" id="formFile" name="image_1">
                    </div>
                    <div class="col">
                        <label for="education_certificate">
                            Фото аттестата(Приложение другая сторона)
                        </label>
                        <input class="form-control" type="file" id="formFile" name="image_1">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label for="" class="fs-4">Статус</label>
                        @if ($user_role == 'Admin')
                            <select name="status" id="" class="form-select">
                                <option value="{{$statement->status}}" selected>{{$statement->status}}</option>
                                @foreach ($statuses as  $status)
                                    <option value="{{$status->name}}">{{$status->name}}</option>
                                @endforeach
                            </select>
                        @else
                            <p class="fs-5 mt-3">{{$statement->status}}</p>
                            <input type="text" name="status" value="{{$statement->status}}" hidden>
                        @endif
                    </div>
                </div>
        
              <div class="row mt-3 d-flex justify-content-center">
                <div class="col mt-4">
                <label class="fs-5">Нуждаемость в общежитии</label>
                <div class="form-check ">
                    <input class="form-check-input" type="checkbox"  name="dormitory" id="flexRadioDefault1" 
                    @if ($statement->dormitory == '1')
                    checked="true"
                @else
                    cheked="false"
                @endif
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
                        <input type="checkbox"  name="special_condition" class="form-check-input"   
                       
                        @if ($statement->special_condition == '1')
                        cheсked = "true"
                    @else
                        cheсked = 'false'
                    @endif ">
                        <label for="" class="form-check-label fs-5">Да</label>
                    </div>
                </div>
                <div class="col mt-4">
                    {{-- <label for="" class="fs-5">Ознакомлен(а) (в том числе через информационные системы общего пользования) с копиями лицензии на
                        осуществление образовательной деятельности, свидетельства о государственной аккредитации образовательной
                        деятельности по образовательным программам и приложениями к ним</label> --}}
                      
                            <div class="form-check mt-3">
                                <input type="checkbox"  name="accept_1" class="form-check-input" value="1" checked={{$statement->accept_1}} hidden>
                                {{-- <label for="" class="form-check-label fs-5">Да</label> --}}
                            </div>
                        </div>

            </div>
            {{-- <div class="row mt-3">
               
            </div> --}}
            <div class="row mt-3">
                <div class="col mt-4">
                {{-- <label for="" class="fs-5">Правилами внутреннего распорядка, правами и обязанностями обучающихся
                    КГБПОУ «БГПК имени В.К. Штильке» ознакомлен (а)</label>
                     --}}
                        <div class="form-check mt-3">
                            <input type="checkbox" name="accept_2" value="1" class="form-check-input"
                            checked={{$statement->accept_2}}  hidden
                       >
                            {{-- <label for="" class="form-check-label fs-5">Да</label> --}}
                        </div>
                    </div>
                    <div class="col mt-4">
                        {{-- <label for="" class="fs-5">С датой предоставления оригинала документа об образовании и (или) документа об образовании и о квалификации
                            ознакомлен (а)</label> --}}
                            
                                <div class="form-check mt-3">
                                    <input type="checkbox" name="accept_3" value="1" class="form-check-input" 
                                    checked={{$statement->accept_3}} 
                              hidden>
                                    {{-- <label for="" class="form-check-label fs-5">Да</label> --}}
                                </div>
                            </div>
            </div>
            {{-- <div class="row mt-3">
               
            </div> --}}
            <div class="row mt-3">
                <div class="col d-flex justify-content-center">
                    <button class="btn btn-primary">Отправить анкету</button>
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