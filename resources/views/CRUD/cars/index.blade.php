@extends('CRUD.layouts.default')

@section('title', 'Добавление Автомобиля')

@section('main_content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card card-primary">
                                <a href="{{ route('car.create') }}"><button class="btn btn-success w-25 mb-2">Добавить</button></a>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Название</th>
                                        <th scope="col">Марка</th>
                                        <th scope="col">Категория</th>
                                        <th scope="col">Цена</th>
                                        <th scope="col">Создана</th>
                                        <th scope="col">Действие</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cars as $car)
                                        <tr>
                                            <th scope="row">{{ $car->id }}</th>
                                            <td>{{ $car->title }}</td>
                                            <td>{{ $car->mark }}</td>
                                            <td>{{ $car->category->title }}</td>
                                            <td>{{ $car->new_price ?: $car->old_price }}</td>
                                            <td>{{  date('d-m-Y', strtotime($car->created_at)) }}</td>
                                            <td>
                                                @if(!$car->deleted_at)
                                                <form action="{{ route('car.delete', $car) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            style="border: none; background: none;"
                                                    >
                                                        <i class="fas fa-backspace text-danger"></i>
                                                    </button>
                                                </form>
                                                <a href="{{ route('car.edit', $car) }}">
                                                    <i class="fas fa-edit text-primary"></i>
                                                </a>
                                                <br>
                                                <a href="{{ route('car.preview', $car) }}" class="text-black">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                @else
                                                    <form action="{{ route('car.restore', $car) }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <button style="background: none; border: none;" class="text-warning">
                                                            <i class="fas fa-trash-restore"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="mb-5">
                                    {{ $cars->links('vendor.pagination.bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
