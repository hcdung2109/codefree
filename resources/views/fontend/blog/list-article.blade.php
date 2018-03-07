@extends('fontend.layouts.master')

@section('content')

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">
        <ul class="breadcrumb bg-color-transparent">
            <li><a href="{{ route('blog.home') }}"><i class="fa-fw fa fa-home"></i> Home </a></li>
            <li>{{ $category->name }}</li>
        </ul>
    </div>

    <div class="col-sm-10 col-md-10 main-content">
        <div class="group-article">
            <a class="article-title" href="javascript:void(0);">{{ $category->name }}</a>

            @foreach($listArticle as $art)
                <div class="col-sm-12 col-md-6 article-item">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/app/'.$art->image) }}" class="img-responsive article-avatar">
                    </div>
                    <div class="col-md-8 padding-left-0 height-150">
                        <h3 class="margin-top-0" ><a href = "{{ route('blog.detail-article',['slug_category' => $category->slug, 'slug_article'=> $art->slug]) }}" >{{ $art->title }}</a></h3>
                        <p >{{ str_limit($art->summary, 200) }}..</p>
                     </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection