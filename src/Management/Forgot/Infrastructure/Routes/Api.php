<?php

use Illuminate\Support\Facades\Route;

Route::post('/', ForgotUserForgotPasswordController::class);

Route::put('/reset-password', ForgotUserResetPasswordController::class);
