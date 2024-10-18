<?php

use App\Controllers\ApiController;
use App\Controllers\AuthController;
use App\Controllers\ProductController;
use App\Routes\Route;

Route::get("/", [ProductController::class, "product"]);
Route::get("/login", [AuthController::class, "loginPage"]);
Route::get("/register", [AuthController::class, "registerPage"]);

Route::post("/register", [AuthController::class, "register"]);
Route::post("/login", [AuthController::class, "login"]);
Route::get("/logout", [AuthController::class, "logout"]);

Route::get("/addProduct", [ProductController::class, "addProduct"]);
Route::post("/createProduct", [ProductController::class, "createProduct"]);

Route::post("/updateProduct", [ProductController::class, "updateProduct"]);
Route::post("/update", [ProductController::class, "update"]);
Route::post("/deleteProduct", [ProductController::class, "deleteProduct"]);

// Api

Route::get('/api', [ApiController::class, "index"]);
Route::post("/", [ProductController::class, "store"]);

?>
