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
                                <form method="post" action="{{ route('car.create') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="title">Название</label>
                                            <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control">
                                        </div>
                                        @error('title')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="mark">Марка</label>
                                            <input type="text" name="mark" id="mark" value="{{ old('mark') }}" class="form-control">
                                        </div>
                                        @error('mark')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="category_id">Категория</label>
                                            <select name="category_id" id="category_id" class="form-control">
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('category_id')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="preview_image">Фото Профиля</label>
                                            <input type="file" name="preview_image" id="preview_image" class="form-control">
                                        </div>
                                        @error('preview_image')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="gallery">Галерея</label>
                                            <input type="file" name="gallery[]" id="gallery" class="form-control" multiple>
                                        </div>
                                        @error('gallery')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="small_description">Краткое описание</label>
                                            <textarea name="small_description" id="small_description" class="form-control"></textarea>
                                        </div>
                                        @error('small_description')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="description">Описание</label>
                                            <textarea name="description" id="description" class="form-control"></textarea>
                                        </div>
                                        @error('description')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <div class="form-group">
                                            Цена
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="number" name="old_price" class="form-control">
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                        @error('old_price')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <div class="form-group mt-2">
                                            Новая цена
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="number" name="new_price" class="form-control">
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                        @error('new_price')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-success">Добавить</button>
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
