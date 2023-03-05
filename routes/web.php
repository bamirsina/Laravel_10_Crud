
<?php

use App\Http\Controllers\WarehouseController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});


Route::resource('students', StudentController::class);
//Route::get('warehouse/warehouse', [WarehouseController::class, 'index'])->name('warehouse.warehouse');
//Route::get('warehouse/create', [WarehouseController::class, 'create'])->name('warehouse.create');
//Route::delete('warehouse/{id}', [WarehouseController::class, 'destroy'])->name('warehouse.destroy');
//Route::post('warehouse/store', [WarehouseController::class, 'store'])->name('warehouse.store');
//Route::post('/warehouse/retrieve/{product}', [WarehouseController::class, 'retrieve']);


