<?php

namespace App\Http\Controllers\Blog;

//use App\Http\Controllers\Controller;
use App\Http\Controllers\Controller;
use App\Models\BlogComments;
use App\Models\BlogPost;
use App\Repositories\BlogCategoryRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = BlogPost::all();
        $items = $items->reverse();

//        $items = array_reverse($items);
        return view('blog.posts.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->input();

//
//        $data["user_id"] = auth()->user()->id;

//        $data["blog_post_id"] = $item->post->id;
//        dd($data);
        $item = new BlogComments();
        $item->create($data);


        if($item){
            return redirect()->route('blog.posts.show', $data["blog_post_id"])
                ->with(['success'=>'Успішно опубліковано']);

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
        $item = BlogPost::findOrFail($id);

//dd($item);

        return view('blog.posts.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
