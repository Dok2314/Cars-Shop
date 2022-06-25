@extends('main.layouts.default')

@section('title', 'Вход')

@section('header_name','Вход')

@section('main_content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card card-primary">
                                <form method="post" action="{{ route('user.login') }}">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="email">Эл. почта</label>
                                            <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control">
                                        </div>
                                        @error('email')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="password">Пароль</label>
                                            <input type="password" name="password" id="password" class="form-control">
                                        </div>
                                        @error('password')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="remember" name="remember" value="1">
                                            <label class="form-check-label" for="remember">Запомнить Меня?</label>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Войти</button>
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
