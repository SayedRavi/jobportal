<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testController;


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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [\App\Http\Controllers\JobController::class, 'index'])->name('/');

Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function () {
    Route::get('/dashboard', [\App\Http\Controllers\adminController::class, 'index'])->name('admin.index');
    Route::get('/dashboard/users',[\App\Http\Controllers\adminController::class, 'users'])->name('admin.users');
    Route::get('/dashboard/users/view/{id}',[\App\Http\Controllers\adminController::class, 'view'])->name('admin.users.view');
    Route::delete('/dashboard/users/destroy/{id}',[\App\Http\Controllers\adminController::class, 'delete'])->name('admin.user.destroy');
    Route::get('/dashboard/companies',[\App\Http\Controllers\adminController::class, 'company_view'])->name('admin.company.view');
    Route::get('/dashboard/companies/view/{id}',[\App\Http\Controllers\adminController::class, 'company_show'])->name('admin.company.show');
    Route::delete('/dashboard/companies/destroy/{id}',[\App\Http\Controllers\adminController::class, 'destroy'])->name('admin.company.deleted');
    Route::get('/dashboard/jobs',[\App\Http\Controllers\adminController::class, 'jobs'])->name('admin.jobs');
    Route::get('/dashboard/jobs/view/{id}',[\App\Http\Controllers\adminController::class, 'jobs_view'])->name('admin.jobs.view');
    Route::delete('/dashboard/jobs/destroy_job/{id}',[\App\Http\Controllers\adminController::class, 'jobs_destroy'])->name('admin.jobs.destroy');
    Route::get('/dashboard/category',[\App\Http\Controllers\adminController::class, 'category'])->name('category');
    Route::get('/dashboard/category/add',[\App\Http\Controllers\adminController::class, 'add_category'])->name('category.add');
    Route::post('/dashboard/category/save',[\App\Http\Controllers\adminController::class, 'save_category'])->name('category.save');
    Route::get('/dashboard/category/edit/{id}',[\App\Http\Controllers\adminController::class, 'edit_category'])->name('category.edit');
    Route::post('/dashboard/category/update/{id}',[\App\Http\Controllers\adminController::class, 'update_category'])->name('category.update');
    Route::delete('/dashboard/category/delete/{id}',[\App\Http\Controllers\adminController::class, 'delete_category'])->name('category.delete');
    Route::get('/dashboard/password',[\App\Http\Controllers\adminController::class, 'password'])->name('password');
    Route::post('/dashboard/password/change',[\App\Http\Controllers\adminController::class, 'change_password'])->name('password_change');
});

//JObs Profile
Route::get('/jobs/{id}/{job}',[\App\Http\Controllers\JobController::class,'show'])->name('jobs.show');
Route::get('/jobs/create',[\App\Http\Controllers\JobController::class,'create'])->name('jobs.create');
Route::post('/jobs/store',[\App\Http\Controllers\JobController::class,'store'])->name('jobs.store');
Route::get('/jobs/myjobs',[\App\Http\Controllers\JobController::class,'myjobs'])->name('jobs.myjobs');
Route::get('/jobs/myjobs/edit/{id}',[\App\Http\Controllers\JobController::class,'editjobs'])->name('jobs.editjobs');
Route::patch('/jobs/myjobs/update/{id}',[\App\Http\Controllers\JobController::class,'update'])->name('jobs.update');
Route::post('/jobs/apply/{id}',[\App\Http\Controllers\JobController::class,'apply'])->name('jobs.apply');
Route::get('/jobs/applicants',[\App\Http\Controllers\JobController::class,'applicants'])->name('jobs.applicants');
Route::get('/jobs/alljobs',[\App\Http\Controllers\JobController::class, 'alljobs'])->name('alljobs');
Route::get('/about',[\App\Http\Controllers\JobController::class ,'about'])->name('about');
Route::get('/contact',[\App\Http\Controllers\JobController::class ,'contact'])->name('contact');
Route::post('/contact/save',[\App\Http\Controllers\JobController::class ,'save_contact'])->name('contact.save');


//Search with Vue Js
Route::get('/jobs/search',[\App\Http\Controllers\JobController::class, 'searchJob']);

//Company Profile
Route::get('/company/{id}/{company}',[\App\Http\Controllers\CompanyController::class,'index'])->name('company.index');
Route::get('/company/create',[\App\Http\Controllers\CompanyController::class,'create'])->name('company.create');
Route::post('/company/store',[\App\Http\Controllers\CompanyController::class,'store'])->name('company.store');
Route::post('/company/coverphoto',[\App\Http\Controllers\CompanyController::class,'coverphoto'])->name('company.coverphoto');
Route::post('/company/logo',[\App\Http\Controllers\CompanyController::class,'logo'])->name('company.logo');

//User Profile
Route::get('user/profile',[\App\Http\Controllers\userProfileController::class,'index'])->name('user.profile');
Route::post('profile/store',[\App\Http\Controllers\userProfileController::class,'store'])->name('profile.store');
Route::post('profile/coverletter',[\App\Http\Controllers\userProfileController::class,'coverletter'])->name('profile.coverletter');
Route::post('profile/resume',[\App\Http\Controllers\userProfileController::class,'resume'])->name('profile.resume');
Route::post('profile/avatar',[\App\Http\Controllers\userProfileController::class,'avatar'])->name('profile.avatar');

//Employer Profile
Route::view('employer/profile','auth.emp-register')->name('employer.registration');
Route::post('employer/profile/store', [\App\Http\Controllers\EmployerProfileController::class ,'store'])->name('employer.store');

//Category Option
Route::get('category/{id}',[\App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');

//Email Refer
Route::post('/email/job',[\App\Http\Controllers\EmailController::class ,'send'])->name('mail');



Auth::routes(['verify' => true]);

