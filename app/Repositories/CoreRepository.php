<?php


namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Application;

/**
 * Class CoreRepository
 * @package App\Repositories
 *
 * Репозиторій для роботи з сущностю
 * Може видавати набори даних
 * НЕ може створювати чи змінювати сущності
 */



abstract class CoreRepository
{
    /**
     * @var Model
     */

    protected $model;

    /**
     * CoreRepository constructor
     */
    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    /**
     * @return mixed
     */
    abstract protected function getModelClass();

    /**
     * @return \Illuminate\Contracts\Foundation\Application|Model|mixed
     */
    protected function startConditions()
    {
        return clone $this->model;
    }
}
