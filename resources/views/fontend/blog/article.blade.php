@extends('fontend.layouts.master')

@section('content')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">
        <ul class="breadcrumb no-padding bg-color-transparent">
            <li><a href="{{ route('blog.home') }}"><i class="fa-fw fa fa-home"></i> Home </a></li>
            <li><a href="{{route('blog.list-article-of-category', ['slug_category' => $article->category->slug ])}}"> {{ $article->category->name }} </a></li>
            <li>{{ $article->title }}</li>
        </ul>
    </div>

    <div class="col-sm-10 col-md-10 main-content">
        <!-- Show all article -->
        {!! $article->desc !!}}
    </div>
@endsection
