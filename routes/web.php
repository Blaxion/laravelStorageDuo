<?php

use App\Http\Controllers\GenderController;
use App\Http\Controllers\MemberController;
use App\Models\Gender;
use App\Models\Member;
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

Route::get('/', function () {
    $members = Member::all();  
    $genders = Gender::all();    
    return view('welcome',compact('members','genders'));
});

Route::resource('gender', GenderController::class);
Route::resource('member', MemberController::class);
Route::get('/member/{member}/download',[MemberController::class,'download']);