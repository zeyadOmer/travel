<?php

use App\Http\Controllers\BusController;
use App\Http\Controllers\cargoController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\tripController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerificationController;
use App\Models\Location;
use Illuminate\Support\Facades\Route;

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


Route::middleware(['web'])->group(function () {
    // Your routes here


    Route::get('/', function () {
        return view('pages.home');
    });
    
    Route::get('login',function(){
        return view('pages.login');
    });
    Route::get('signup',function(){
        return view('pages.signup');
    });
    
    Route::get('dashbord', function () {
        if (session()->has('user_type') && session('user_type') == 'customer') {
            return view('pages.home');
        } else {
            return view('admin.dashbord');
        }
    })->name('dashbord');
    
    Route::get('companyslist',function(){
        return view('companys.companyslist');
    })->name('companys.list');


  

    Route::get('newtrip',function(){
        return view('trips.addtrip');
    })->name('trip.new');
    
    

    
    Route::get('newcompany',function(){
        return view('companys.addcompany');
    })->name('company.new');
    
    Route::get('newbus',function(){
        return view('buss.newbus');
    })->name('bus.new');
    
    Route::get('newlocation',function(){
        return view('locations.addlocation');
    })->name('location.new');
    
    
    // Route::get('pdf/{id}',function(){
    //     return view('tickets.pdf');
    // })->name('bus.new');
    

    // users route

    Route::post('useradd',[UserController::class,'add'])->name('user.add');
    Route::get('/verify-email/{token}', [VerificationController::class, 'verify'])->name('verification.verify');










    // front-end
    Route::post('/tripsSearch',[tripController::class,'search'])->name('trips.search');
    Route::post('/loginpro',[UserController::class,'login'])->name('login.pro');
    Route::get('/logout',[UserController::class,'logout'])->name('logout');
    Route::get('login',function(){
        return view('pages.login');
    })->name('login');
    Route::get('signup',function(){
        return view('pages.signup');
    })->name('signup');


    // companys routes
    
    Route::post('companyadd', [CompanyController::class,'add'])->name('company.add');
    Route::get('companyeditview/{id}', [CompanyController::class,'editView'])->name('company.edit.view');
    Route::post('companyedit/{id}', [CompanyController::class,'edit'])->name('company.edit');
    Route::get('companyslist', [CompanyController::class,'index'])->name('companys.list');
    Route::get('companydelete/{id}', [CompanyController::class,'delete'])->name('company.delete');


    // buss routes
    Route::get('busslist', [BusController::class,'index'])->name('buss.list');
    Route::post('busadd', [BusController::class,'add'])->name('bus.add');
    Route::get('buseditview/{id}', [BusController::class,'editView'])->name('bus.edit.view');
    Route::post('busedit/{id}', [BusController::class,'edit'])->name('bus.edit');
    Route::get('getBuses/{id}', [BusController::class,'getBuses'])->name('getBuses');
    Route::get('deleteBuses/{id}', [BusController::class,'delete'])->name('bus.delete');



    // location routes

    Route::get('locationslist', [LocationController::class,'index'])->name('locations.list');
    Route::post('locationadd', [LocationController::class,'add'])->name('location.add');
    Route::get('locationeditview/{id}', [LocationController::class,'editview'])->name('location.edit.view');
    Route::post('locationedit/{id}', [LocationController::class,'edit'])->name('location.edit');
    Route::get('deletelocations/{id}', [LocationController::class,'delete'])->name('location.delete');




    //trips routes 

    Route::get('tripslist',[tripController::class, 'index'])->name('trips.list');
    Route::post('tripadd',[tripController::class, 'add'])->name('trip.add');
    Route::get('tripeditview/{id}',[tripController::class, 'editview'])->name('trip.edit.view');
    Route::post('tripedit/{id}',[tripController::class, 'edit'])->name('trip.edit');
    Route::post('tripsearch',[tripController::class, 'searchtrip'])->name('trip.search2');
    Route::get('deletetrip/{id}',[tripController::class, 'delete'])->name('trip.delete');






    //tickets routes

    Route::get('ticketnew',[TicketController::class,'new'])->name('ticket.new');
    Route::post('ticketadd',[TicketController::class,'add'])->name('ticket.add');
    Route::get('ticketslist',[TicketController::class,'index'])->name('tickets.list');
    Route::get('ticketview/{id}',[TicketController::class,'view'])->name('ticket.view');
    Route::get('ticketview2/{id}',[TicketController::class,'view2'])->name('ticket.view2');
    Route::get('generate-barcode', [TicketController::class,'generateBarcode']);
    Route::get('generate-pdf/{id}', [TicketController::class,'generatePDF'])->name('ticket.pdf');
    // Route::get('generate-pdf/{id}', [TicketController::class,'generatePDF']);
    Route::get('deleteticket/{id}',[TicketController::class,'delete'])->name('ticket.delete');

    Route::get('test', fn () => phpinfo());


    // cargo route
    Route::get('cargo/list',[cargoController::class,'list'])->name('cargos.list');
    Route::get('cargo/new',[cargoController::class,'new'])->name('cargo.new');
    Route::post('cargo/add',[cargoController::class,'add'])->name('cargo.add');
    Route::get('cargo/editview/{id}',[cargoController::class,'editView'])->name('cargo.edit.view');
    Route::post('cargo/edit/{id}',[cargoController::class,'edit'])->name('cargo.edit');
    Route::get('cargo/delete/{id}',[cargoController::class,'delete'])->name('cargo.delete');

    
    
});
