<?php

use App\Models\Pet;
use Illuminate\Support\Facades\Route;

// Public Route
Route::get('/', function () {
    return view('welcome');
});

Route::get('/pets/view-pet/{id}', function ($id) {
    $pet = Pet::findOrFail($id);
    $folderPath = public_path('pet-images/'.$pet->images_folder);
    $files = glob($folderPath.'/*');
    $pet->image_filenames = array_map('basename', $files);

    return view('view-pet', ['pet' => $pet]);
});
Route::post('pets/apply/selfie', [\App\Livewire\Customer\Application\Create::class, 'getSelfie']);
// Authenticated routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Dashboard route
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Admin Routes
    Route::middleware('admin')->group(function () {
        Route::get('/create-report', [\App\Http\Controllers\ReportController::class, 'create']);
        Route::prefix('breeds')->name('breeds/')->group(function () {
            Route::get('', function () {
                return view('admin/breed/index');
            })->name('index');

            Route::get('/create/{type}', function ($type) {
                return view('admin/breed/create', ['type' => $type]);
            })->name('create');

            Route::get('/type', function () {
                return view('admin/breed/selecttype');
            })->name('type');

            Route::get('/edit/{id}', function ($id) {
                return view('admin/breed/edit', ['id' => $id]);
            })->name('edit');
        });

        Route::prefix('pets')->name('pets/')->group(function () {
            Route::get('', function () {
                return view('admin/pet/index');
            })->name('index');

            Route::get('/create/{type}', function ($type) {
                return view('admin/pet/create', ['type' => $type]);
            })->name('create');

            Route::get('/type', function () {
                return view('admin/pet/selecttype');
            })->name('type');

            Route::get('/edit/{id}', function ($id) {
                return view('admin/pet/edit', ['id' => $id]);
            })->name('edit');

            Route::post('/upload', [\App\Livewire\Admin\Pet\Create::class, 'getPhoto'])->name('upload');
        });

        Route::prefix('applications')->name('applications/')->group(function () {
            Route::get('', function () {
                return view('admin/application/index');
            })->name('index');

            Route::get('/show/{id}', function ($id) {
                return view('admin/application/show', ['id' => $id]);
            })->name('show');
        });
    });

    // Customer Routes
    Route::prefix('pets')->name('pets/')->group(function () {
        Route::get('/browse', function () {
            return view('customer/pet/browse');
        })->name('browse');

        Route::get('/apply/{id}', function ($id) {
            return view('customer/application/create', ['id' => $id]);
        })->name('apply');

        Route::get('/my-applications', function () {
            return view('customer/application/index');
        })->name('my-applications/index');
    });
});
