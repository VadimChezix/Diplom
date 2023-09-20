@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col">
        <div class="container">
            <div class="block">
                <div class="row">
                    <div class="col d-flex justify-content-center">
                        <h1>Создать специальность</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <form action="" method="POST">
                            @csrf
                            <div class="row mt-5">
                                <div class="col">
                                    <label for="" class="fs-4">Наименование</label>
                                    <input type="text" name="name" class="form-control mt-3">
                                </div>
                               

                            </div>
                            <div class="row mt-5">
                                <div class="col">
                                    <label for="" class="fs-4">Ссылка с официального сайта</label>
                                    <input type="text" class="form-control mt-3" name="url" placeholder="https://bgpk.edu22.info/абитуриенту/специальности/####-##-##-##">
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Добавить</button>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mt-5">
                    {{-- <div class="col d-flex justify-content-end">
                    
                    </div> --}}
                    <div class="col d-flex justify-content-end">
                        <a href="{{route('home')}}" class="btn btn-secondary">На главную</a>
                        <a href="{{route('specialization_index')}}" class="btn btn-secondary ms-3">Назад</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection