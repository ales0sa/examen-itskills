<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\InvoiceController;
use App\Models\Invoice;

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

Route::get('/', [InvoiceController::class, 'index']);

Route::get('/detail/{invoice}', [InvoiceController::class, 'detail']);

Route::get('/detail/{invoice}/json', function (App\Models\Invoice $invoice) {
    return $invoice->toJson();
});

Route::get('/json', function () {

	$invoices = Invoice::get();
    return $invoices->toJson();
});


Route::get('/test', [InvoiceController::class, 'testDatabase']);
