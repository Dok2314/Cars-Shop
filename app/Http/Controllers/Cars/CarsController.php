<?php

namespace App\Http\Controllers\Cars;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cars\CarRequest;
use App\Http\Requests\Cars\StoreRequest;
use App\Http\Requests\Cars\UpdateRequest;
use App\Models\Car;
use App\Models\Category;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class CarsController extends Controller
{
    public function index()
    {
        $cars = Car::orderBy('created_at', 'desc')
            ->withTrashed()
            ->paginate(6);

        return view('CRUD.cars.index', compact('cars'));
    }

    public function preview(Car $car)
    {
        return view('CRUD.cars.preview', compact('car'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('CRUD.cars.create', compact('categories'));
    }

    public function store(StoreRequest $request)
    {
        $files = $request->allFiles();

        $path = $request
            ->file('preview_image')
            ->store('cars', 'images');

        $gallery = [];

        if ($request->has('gallery')) {
            /** @var UploadedFile $file */
            foreach($files['gallery'] as $file) {
                $gallery[] = $file
                    ->store('cars/gallery', 'images');
            }
        }

        $car = new Car([
            'title' => $request->input('title'),
            'mark' => Str::slug($request->input('mark')),
            'slug' => Str::slug($request->input('title')),
            'category_id' => $request->input('category_id'),
            'preview_image' => $path,
            'gallery' => $gallery,
            'small_description' => $request->input('small_description'),
            'description' => $request->input('description'),
            'old_price' => $request->input('old_price'),
            'new_price' => $request->input('new_price'),
        ]);

        $car->save();

        return redirect()->route('car.index')->with('success', 'Автомобиль успешно добавлен!');
    }

    public function destroy(Car $car)
    {
        $car->delete();

        return redirect()->route('car.index')->with('success', 'Автомобиль успешно удален!');
    }

    public function edit(Car $car)
    {
        $categories = Category::all();

        return view('CRUD.cars.edit', compact('car', 'categories'));
    }

    public function update(UpdateRequest $request, Car $car)
    {
        $files = $request->allFiles();

        if($request->has('preview_image')) {
            $path = $request
                ->file('preview_image')
                ->store('cars', 'images');
        }

        $gallery = [];

        if ($request->has('gallery')) {
            /** @var UploadedFile $file */
            foreach($files['gallery'] as $file) {
                $gallery[] = $file
                    ->store('cars/gallery', 'images');
            }
        }

        $car->title = $request->input('title');
        $car->slug = $request->input('title');
        $car->mark = $request->input('mark');
        $car->category_id = $request->input('category_id');
        $car->preview_image = $path ?? $car->preview_image;

        if($request->has('gallery')) {
            $car->gallery = $gallery;
        }

        $car->small_description = $request->input('small_description');
        $car->description = $request->input('description');
        $car->old_price = $request->input('old_price');
        $car->new_price = $request->input('new_price');

        $car->save();

        return redirect()
            ->back()
            ->with('success', 'Автомобиль успешно обновлен!');
    }

    public function restore(int $car)
    {
        Car::withTrashed()
            ->find($car)
            ->restore();

        return redirect()->back()->with('success', 'Автомобиль успешно востановлен!');
    }
}

