<?php

namespace App\Http\Controllers\Blog\Admin;
use App\Http\Requests\BlogPostCreateRequest;
use App\Http\Requests\BlogPostUpdateRequest;
use App\Repositories\BlogCategoryRepository;
use App\Repositories\BlogPostRepository;
//use App\Http\Controllers\Controller;
use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Carbon\Carbon;
use Illuminate\Http\Request;

/**
 * Керування статтями блога
 * @package App\Http\Controllers\Blog
 */
class PostController extends BaseController
{

    /**
     * @var BlogPostRepository
     */
    private $blogPostRepository;
    /**
     * @var BlogCategoryRepository
     */
    private $blogCategoryRepository;

    public function __construct()
    {
        parent::__construct();

        $this->blogPostRepository = app(BlogPostRepository::class);
        $this->blogCategoryRepository = app(BlogCategoryRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        //
        $paginator = $this->blogPostRepository->getAllWithPaginate();
        return view('blog.admin.posts.index',compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new BlogPost();
        $categoryList = $this->blogCategoryRepository->getForComboBox();


        return view('blog.admin.posts.edit', compact('item','categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BlogPostCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BlogPostCreateRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->input();
        $item = (new BlogPost())->create($data);

        if($item){
            return redirect()->route('blog.admin.posts.edit', [$item->id])
                ->with(['success'=>'Успішно збережено']);

        }
        else{
            return back()->withErrors(['msg'=>'помилка збереження'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->blogPostRepository->getEdit($id);
        if(empty($item)){
            abort(404);
        }
        $categoryList
            = $this->blogCategoryRepository->getForComboBox();

        return view('blog.admin.posts.edit',
        compact('item','categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogPostUpdateRequest $request, $id)
    {
        $item = $this->blogPostRepository->getEdit($id);
         if(empty($item)){
            return back()
                ->withErrors(['msg'=>"Запис id = [{$id}] не знайдена"])
                ->withInput();//дані, які були введенні зберігаються
        }

        $data = $request->all();

//        if(empty($data['slug'])){
//            $data['slug'] = \Str::slug($data['title']);
//        }
//
//        if(empty($item->published_at) && $data['is_published']){
//            $data['published_at'] = Carbon::now();
//        }

//        $result = $item
//            ->fill($data) //заповнили значеннями
//            ->save(); //зберегли в базу

        $result = $item->update($data);
        if($result){
            return redirect()
                ->route('blog.admin.posts.edit',$item->id)
                ->with(['success'=>'Успішно збережено']);
        }else{
            return back()
                ->withErrors(['msg'=>'Помилка збереження'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd(__METHOD__,$id, request()->all());
    }
}
