@extends('main.layouts.default')

@section('title', 'Регистрация')

@section('header_name','Регистрация')

@section('main_content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card card-primary mb-1">
                                <form action="{{ route('user.registration') }}" method="post">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group mb-1">
                                            <label for="name">Имя</label>
                                            <input type="text" name="name" value="{{ old('name') }}" id="name" class="form-control">
                                        </div>
                                        @error('name')
                                        <div class="alert-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <div class="form-group mb-1">
                                            <label for="surname">Фамилия</label>
                                            <input type="text" name="surname" value="{{ old('surname') }}" id="surname" class="form-control">
                                        </div>
                                        @error('surname')
                                        <div class="alert-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <div class="form-group mb-1">
                                            <label for="phone">Номер Телефона</label>
                                            <input type="phone" name="phone" id="phone" value="{{ old('phone') }}" class="form-control">
                                        </div>
                                        @error('phone')
                                        <div class="alert-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <div class="form-group mb-1">
                                            <label for="email">Эл. почта</label>
                                            <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control">
                                        </div>
                                        @error('email')
                                        <div class="alert-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <div class="form-group mb-1">
                                            <label for="password">Пароль</label>
                                            <input type="password" name="password" id="password" class="form-control">
                                        </div>
                                        @error('password')
                                        <div class="alert-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-success mb-2">Зарегестрироваться</button>
                                        <br>
                                        <a href="{{ route('user.login') }}" style="color: white;">Я уже зарегестрирован</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
