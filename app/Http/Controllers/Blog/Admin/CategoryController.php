<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogCategoryCreateRequest;
use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Models\BlogCategory;
use App\Repositories\BlogCategoryRepository;
use Illuminate\Http\Request;

/**
 * Керування категоріями блога
 *
 * @package App\Http\Controllers\Blog\Admin
 */

class CategoryController extends BaseController
{

    /**
     * @var BlogCategoryRepository
     */
    private $blogCategoryRepository;

    //конструктор для присвоєння змінній типу об'єкт
    public function __construct()
    {
        parent::__construct();
        $this->blogCategoryRepository = app(BlogCategoryRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $paginator = $this->blogCategoryRepository->getAllWithPaginate(5);

        return view('blog.admin.categories.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new BlogCategory();
        $categoryList = $this->blogCategoryRepository->getForComboBox();

        return view('blog.admin.categories.edit',
          compact('item','categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCategoryCreateRequest $request)
    {
        $data = $request->input();
        if(empty($data['slug'])){
            $data['slug'] = str_slug($data['title']);
        }

        //створення об'єкта но не добавлення його в БД
//        $item = new BlogCategory($data);
//        $item->save();

        //створення об'єкта і добавлення його в БД
        $item = (new BlogCategory())->create($data);

        if($item){
            return redirect()->route('blog.admin.categories.edit',[$item->id])
                ->with(['success'=>'Успішно збережено']);
        }else{
            return back()->withErrors(['msg'=>'Помилка збереження'])->withInput();
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @param BlogCategoryRepository $categoryRepository
     * @return \Illuminate\Http\Response
     */
    public function edit($id, BlogCategoryRepository $categoryRepository)
    {

//        $item = BlogCategory::findOrFail($id);
//        $categoryList = $categoryRepository->getForComboBox();

        $item = $this->blogCategoryRepository->getEdit($id);
        if(empty($item)){
            abort(404);
        }

        $categoryList = $this->blogCategoryRepository->getForComboBox();


        //        відправка в представлення
        return view('blog.admin.categories.edit',
        compact('item','categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCategoryUpdateRequest $request, $id)
    {
/*
        $rules = [
            'title'         => 'required|min:5|max:200',
            'slug'          => 'max:200',
            'description'   => 'string',
            'parent_id'     => 'required|integer|exists:blog_categories,id',
        ];
*/

/*
        //якщо валідація не спрацювала, метод validate редіректить назад і викликає метод withErrors

        //перший спосіб
//        $validatedData = $this->validate($request,$rules);

        //другий спосіб
        $validatedData = $request->validate($rules);//
*/

        //$request - об'єкт класу Request інструментарій, за допомогою якого ми можемо працювати з вхідними даними
        $item = $this->blogCategoryRepository->getEdit($id);
        if(empty($item)){
            return back()
                ->withErrors(['msg'=>"Запис id = [{$id}] не знайдена"])
                ->withInput();//дані, які були введенні зберігаються
        }

        $data = $request->all();
        if(empty($data['slug'])){
            $data['slug'] = str_slug(['title']);
        }
        $result = $item
            ->fill($data) //заповнили значеннями
            ->save(); //зберегли в базу

        //result = $item->update($data);
        if($result){
            return redirect()
                ->route('blog.admin.categories.edit',$item->id)
                ->with(['success'=>'Успішно збережено']);
        }else{
            return back()
                ->withErrors(['msg'=>'Помилка збереження'])
                ->withInput();
        }

    }


}
