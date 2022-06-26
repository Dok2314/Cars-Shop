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
                                <form method="post" action="" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="title">Название</label>
                                            <input type="text" name="title" id="title" value="{{ old('title') ?: $car->title }}" class="form-control">
                                        </div>
                                        @error('title')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="mark">Марка</label>
                                            <input type="text" name="mark" id="mark" value="{{ old('mark') ?: $car->mark }}" class="form-control">
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
                                                    <option value="{{ $category->id }}"
                                                        {{ $category->cars->contains($car) ? 'selected' : '' }}
                                                    >
                                                        {{ $category->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('category_id')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="preview_image">Фото Профиля</label><br>
                                            <img src="{{ Storage::disk('images')->url($car->preview_image) }}" alt="{{ $car->title }}">
                                            <input type="file" name="preview_image" id="preview_image" class="form-control">
                                        </div>
                                        @error('preview_image')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="gallery">Галерея</label>
                                            @foreach($car->gallery as $photo)
                                                <div class="col-2 d-flex">
                                                    <i class="close fa fa-times text-red" role="button"></i>
                                                    <img src="{{ Storage::disk('images')->url($photo) }}" class="product-image d-flex" alt="{{ $car->title }}">
                                                </div>
{{--                                                <input type="hidden" name="gallery[]" value="{{ $photo }}">--}}
                                            @endforeach
                                            <input type="file" name="gallery[]" id="gallery" class="form-control" multiple>
                                        </div>
                                        @error('gallery')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="small_description">Краткое описание</label>
                                            <textarea name="small_description" id="small_description" class="form-control">{{ old('small_description') ?: $car->small_description }}</textarea>
                                        </div>
                                        @error('small_description')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="description">Описание</label>
                                            <textarea name="description" id="description" class="form-control">{{ old('description') ?: $car->description }}</textarea>
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
                                            <input type="number" value="{{ old('old_price') ?: $car->old_price }}" name="old_price" class="form-control">
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
                                            <input type="number" name="new_price" value="{{ old('new_price') ?: $car->new_price }}" class="form-control">
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
                                        <button type="submit" class="btn btn-warning">Сохранить</button>
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

@push('scripts')
    <script>
        $(".close").click(function () {
            // console.log($(this).parent().val());
            // $(this).parent().detach();
        });
    </script>
@endpush
