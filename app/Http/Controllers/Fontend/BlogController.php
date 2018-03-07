<?php

namespace App\Http\Controllers\Fontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Article;

class BlogController extends Controller
{
    public function __construct()
    {
        // get list all category to create menu
        $listCategory = Category::getCategoryAndCountPosts();

        view()->share(compact('listCategory'));
    }

    public function index()
    {
        $html = '<div class="col-sm-10 col-md-10 main-content">';
        $listCategories = Category::getListCategory();

        foreach($listCategories as $cate) {

            $listArticle = Article::getListArticleByCategory($cate->id, $limit = 4);

            if ($listArticle->isNotEmpty()) {

                $html .= '<div class="group-article"><a class="article-title" href="'.route('blog.list-article-of-category', ['slug_category' => $cate->slug]).'">'.$cate->name.'</a>';

                foreach($listArticle as $art) {
                    $html .= '<div class="col-sm-12 col-md-6 article-item">';
                    $html .= '<div class="col-md-4"><img src="'.asset('storage/app/'.$art->image).'" class="img-responsive article-avatar"></div>';
                    $html .= '<div class="col-md-8 padding-left-0 height-150">';
                    $html .= '<h3 class="margin-top-0" ><a  href = "'.route('blog.detail-article',['slug_category' => $cate->slug, 'slug_article'=> $art->slug]).'" >'.$art->title.'</a></h3>';
                    $html .= '<p>'.str_limit($art->summary, 180).'..</p>';
                    $html .= '</div></div>';
                } // end foreach

                $html .= '</div><div class="clear-both"></div>';
            }

        } // end foreach

        $html .= '</div>';


        return view('fontend.blog.index', compact('html'));
    }

    public function detailArticle($slug_category = null,$slug_article = null)
    {
        $category = Category::getCategoryBySlug($slug_category);
        $article = Article::getArticleBySlugAndCategoryID($category->id, $slug_article);

        return view('fontend.blog.article', compact('article'));
    }

    public function getListArticleOfCategory($slug_category)
    {
        $category = Category::getCategoryBySlug($slug_category);
        $listArticle = Article::getArticleByCategoryID($category->id);

        return view('fontend.blog.list-article', compact('category','listArticle'));
    }
}
