@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <form action="{{ route('statement_index') }}" method="GET">
                            <div class="row">
                                <div class="col">
                                    <label for="">Сортировать по статусу</label>
                                    <select name="status" class="form-select" id="">
                                        <option value="">Без фильтра</option>
                                        @foreach ($statuses as $status)
                                            <option value="{{ $status->name }}"
                                                @if (isset($_GET['status'])) @if ($_GET['status'] == $status->name) selected @endif
                                                @endif>{{ $status->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col mt-4">
                                    <button type="submit" class="btn btn-primary">Отфильтровать</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="block">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">№ Заявления</th>
                                        <th scope="col">Фамилия</th>
                                        <th scope="col">Имя</th>
                                        <th scope="col">E-mail</th>
                                        <th scope="col">Специальность</th>
                                        <th scope="col">Статус</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                @if ($user_role == 'Admin')
                                    @if ($statements->count() != 0)
                                        @foreach ($statements as $statement)
                                            <tbody>
                                                <tr>
                                                    <th scope="row">{{ $statement->id }}</th>
                                                    <td> {{ $statement->surname }}</td>
                                                    <td>{{ $statement->name }}</td>
                                                    <td>{{ $statement->email }}</td>
                                                    <td>{{ $statement->specialization->name }}</td>
                                                    @if ($statement->status == 'Принято')
                                                        <td>
                                                            <p class="text-success fs-5">{{ $statement->status }}</p>
                                                        </td>
                                                    @else
                                                        @if ($statement->status == 'Отказано')
                                                            <td>
                                                                <p class="text-danger fs-5">{{ $statement->status }}</p>
                                                            </td>
                                                        @else
                                                            <td>
                                                                <p class="fs-5">{{ $statement->status }}</p>
                                                            </td>
                                                        @endif
                                                    @endif


                                                    <td><a href="{{ route('statement_show', $statement->id) }}"
                                                            class="btn btn-primary">Просмотреть</a></td>
                                                    <td><a href="{{ route('statement_edit', $statement->id) }}"
                                                            class="btn btn-primary">Редактировать</a></td>
                                                    <td><a href="{{ route('statement_destroy', $statement->id) }}"
                                                            class="btn btn-danger">Удалить</a></td>
                                                </tr>

                                            </tbody>
                                        @endforeach
                                    @else
                                        <div class="row">
                                            <div class="block d-flex justify-content-center">
                                                <h1>Заявлений пока нет</h1>

                                            </div>
                                        </div>

                                    @endif
                                @else
                                    @if ($statements->where('user_id', $user_id)->count() != 0)
                                        @foreach ($statements->where('user_id', $user_id) as $statement)
                                            <tbody>
                                                <tr>
                                                    <th scope="row">{{ $statement->id }}</th>
                                                    <td> {{ $statement->surname }}</td>
                                                    <td>{{ $statement->name }}</td>
                                                    <td>{{ $statement->email }}</td>
                                                    <td>{{ $statement->specialization->name }}</td>
                                                    @if ($statement->status == 'Принято')
                                                        <td>
                                                            <p class="fs-5 text-success">{{ $statement->status }}</p>
                                                        </td>
                                                    @else
                                                        @if ($statement->status == 'Отказано')
                                                            <td>
                                                                <p class="fs-5 text-danger">{{ $statement->status }}</p>
                                                            </td>
                                                        @else
                                                            <td>
                                                                <p class="fs-5">{{ $statement->status }}</p>
                                                            </td>
                                                        @endif
                                                    @endif


                                                    <td><a href="{{ route('statement_show', $statement->id) }}"
                                                            class="btn btn-primary">Просмотреть</a></td>
                                                    <td><a href="{{ route('statement_edit', $statement->id) }}"
                                                            class="btn btn-primary">Редактировать</a></td>
                                                    <td><a href="{{ route('statement_destroy', $statement->id) }}"
                                                            class="btn btn-danger">Удалить</a></td>

                                                </tr>

                                            </tbody>
                                        @endforeach
                                    @else
                                        <div class="row">
                                            <div class="block d-flex justify-content-center">
                                                <h1>У вас пока нет заявлений</h1>

                                            </div>
                                        </div>
                                    @endif
                                @endif






                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex justify-content-end">
                        <a class="btn btn-secondary" href="{{ route('home') }}">На главную</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
