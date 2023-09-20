@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col">
            <div class="container">
                <div class="block">
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <h1>Специальности</h1>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <table class="table">
                                <thead>
                                    <tr>
                                <th scope="col"><p class="fs-4">№</p></th>
                                <th scope="col"><p class="fs-4">Наименование</p></th>
                                @if ($user_role == 'Admin')
                                <th></th>
                                <th></th> 
                                @else
                                    
                                @endif
                              
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($specializations as $specialization)
                            <tr>
                                <th scope="row"><p class="fs-4">{{$specialization->id}}</p></th>
                                <td><a class="fs-4" href="{{$specialization->url}}">{{$specialization->name}}</a></td>
                                @if ($user_role == 'Admin')
                                <td><a href="{{route('specialization_edit',$specialization->id)}}" class="btn btn-primary">Редактировать</a></td>
                                <td><a href="{{route('specialization_destroy',$specialization->id)}}" class="btn btn-danger">Удалить</a></td>
                                @else
                                    
                                @endif
                             
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                        </div>
                    </div>
                    <div class="row mt-3">
                        @if ($user_role == "Admin")
                        <div class="col d-flex justify-content-end">
                            <a href="{{route('specialization_create')}}" class="btn btn-primary fs-5">Добавить специальность</a>
                        </div> 
                        @endif
                        
                        <div class="col d-flex justify-content-end">
                            <a href="{{route('home')}}" class="btn btn-secondary fs-5">Назад</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection