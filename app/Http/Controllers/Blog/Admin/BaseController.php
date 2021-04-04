<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Blog\BaseController as GuestBaseController;

/**
 * Базовий контролер для всіх контролерів управління
 * блогом в панелі адміністрування
 *
 * Повинен бути батьком всіх контролерів управління
 * @package App\Http\Controllers\Blog\Admin
 */
abstract class BaseController extends GuestBaseController
{
 public function __construct()
 {

 }
}
