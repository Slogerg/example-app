<?php

namespace App\Repositories;

use App\Models\BlogCategory as Model;
use Illuminate\Support\Collection;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class BlogCategoryRepository.
 */
class BlogCategoryRepository extends CoreRepository
{

    /**
     * @return string
     */
    protected function getModelClass(){
        return Model::class;
    }

    /**
     * @return string
     *  Return the model
     */

//    public function model()
//    {
//        //return YourModel::class;
//    }

    /**
     * Отримати модель для редагування в адмінці
     * @param int $id
     * @return Model
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    /**
     * @return Collection
     */

    public function getForComboBox()
    {

        $fields = implode(', ',[
            'id',
            'CONCAT (id, ". ", title) AS title',
        ]);

//        $result[] = $this->startConditions()->all();
        $result = $this
            ->startConditions()
            ->selectRaw($fields)
            ->toBase()
            ->get();

        return $result;
    }


    public function getAllWithPaginate($perPage = null){
        $fields=['id','title','parent_id'];

        $result = $this
            ->startConditions()
            ->select($fields)
            ->paginate($perPage);
        return $result;
    }
}
