<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//import 
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

use App\Models\Company;
use App\Models\Employee;
//import end

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//----created routes 

Route::middleware(['auth'])->group(function () {
    Route::resource('companies', CompanyController::class);
    Route::resource('employees', EmployeeController::class);
});

Route::get('/dashboard', function () {

    $companiesCount = Company::count();
    $employeesCount = Employee::count();

    $latestEmployees = Employee::with('company')
                        ->latest()
                        ->take(5)
                        ->get();

    $companies = Company::with('employees')
                    ->paginate(5);

    return view('dashboard', [
        'companiesCount' => $companiesCount,
        'employeesCount' => $employeesCount,
        'latestEmployees' => $latestEmployees,
        'companies' => $companies
    ]);

})->middleware(['auth'])->name('dashboard');