@extends('userAdmin.layouts.default')

@section('title', 'Административная панель')

@section('main_content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card card-primary">
                                <h1 style="text-align: center">Административная панель</h1>
                            </div>
                            <div class="row mt-5">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center">{{ auth()->user()->name }}</h3>

                                    <p class="text-muted text-center">{{ auth()->user()->phone }}</p>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Автомобилей</b> <a class="float-right">1,322</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Подписок</b> <a class="float-right">543</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Друзей</b> <a class="float-right">13,287</a>
                                        </li>
                                    </ul>

                                    <a href="#" class="btn btn-primary btn-block"><b>Профиль</b></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
