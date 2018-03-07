<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function __construct(Article $article)
    {
        $listCategory = Category::getListCategory();
        view()->share(compact('listCategory'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get list articles
        $articles = Article::with('category')->latest()->paginate();

        return view('backend.article.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //valiate
        $this->validate($request,[
            'title' => 'required',
            'summary' => 'required',
            'desc' => 'required',
            'image' => 'image'
        ]);

        $attributes = $request->all();
        Article::create($attributes);

        return redirect('backend/article')->with('msg', __('backend.finished'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.article.show');
    }

    /**
     * show the form for editing the specified resource.
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Article $article)
    {
        return view('backend.article.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Article $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Article $article)
    {
        // valiate attributes
        $this->validate($request,[
            'title' => 'required',
            'summary' => 'required',
            'desc' => 'required',
            'image' => 'image'
        ]);

        $attributes = $request->all();

        if ($request->hasFile('other_image')) {
            // delete file old image
            @Storage::delete($article->getOriginal('image'));

            // set image
            $file_name = $request->file('other_image')->getClientOriginalName();
            $file_name = time().'-'.$file_name;
            $path = $request->file('other_image')->storeAs(PATH_UPLOAD, $file_name);
            // set image
            $attributes['image'] = $path;
        }

        $article->update($attributes);

        return redirect()->route('backend.article.edit',$article)->with('msgSuccess', __('backend.updated'));
    }

    /**
     * Delete a article
     * @param Article $article
     * @throws \Exception
     */
    public function destroy(Article $article)
    {
        $article->delete();
    }

    /**
     * Change status of article
     * @param Category $category
     */
    public function changeStatus(Category $category)
    {
        $category->status == STATUS_ACTIVE ? STATUS_DEACTIVE : STATUS_ACTIVE;

        $category->update();

    }
}
