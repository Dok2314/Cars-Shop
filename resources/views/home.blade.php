@extends('main.layouts.default')

@section('title', 'Главная')

@section('main_content')
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Товаров</span>
                            <span class="info-box-number">{{ $goodCount }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            </div>
            <!-- /.row -->

            <!-- Main row -->
            <div class="row">
                <ul class="goods-list">
                    @foreach($goods as $good)
                    <li class="goods-item" style="list-style: none">
                        <div class="goods-item-body ml-4">
                            <figure class="thumbnail">
                                <a href="#">
                                    <img src="{{ $good->preview_image }}" width="250" height="200">
                                </a>
                            </figure>
                            <h6 class="title"><a href="#">{{ $good->title }}</a></h6>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <!-- /.row -->
        </div><!--/. container-fluid -->
    </section>
@endsection
