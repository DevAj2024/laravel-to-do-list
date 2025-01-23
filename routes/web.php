<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\TaskManager;

//Login
Route::get("login", [AuthManager::class, "login"])->name("login");

//Login Function
Route::post("login", [AuthManager::class, "loginPost"])->name("login.post");

//Logout
Route::get("logout", [AuthManager::class, "logout"])->name("logout");

//Logout Function
Route::post("logout", [AuthManager::class, "logoutPost"])->name("logout.post");

//Register
Route::get("register", [AuthManager::class, "register"])->name("register");


//Login Function
Route::post("register", [AuthManager::class, "registerPost"])->name("register.post");


Route::middleware(['auth', 'prevent-back-history'])->group(function () {
    //Home
    Route::get('/', [TaskManager::class,"listTask"])->name("home");

    Route::get('/about', [TaskManager::class,"aboutPage"])->name("about");

    Route::get('/logs', [TaskManager::class,"logsTask"])->name("logs");

    //Redirect to Add Task
    Route::get("task/add", [TaskManager::class,"addTask"])->name("task.add");

    //Adding Task Function
    Route::post("task/add", [TaskManager::class,"addTaskPost"])->name("task.add.post");

    //Update Task Tunction
    Route::get("task/status/{id}", [TaskManager::class,"updateTaskStatus"])->name("task.status.update");

    //Delete Task Tunction
    Route::get("task/delete/{id}", [TaskManager::class,"deleteTaskStatus"])->name("task.status.delete");

});

