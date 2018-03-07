<div class="well padding-10">
    <h5 class="margin-top-0"><i class="fa fa-building"></i> Category:</h5>
    <div class="row">

        <div class="col-lg-12">

            <ul class="list-group no-margin">
                @foreach($listCategory as $row)
                    <li class="list-group-item">
                        <a href="{{route('blog.list-article-of-category', ['slug_category' => $row->slug])}}"> <span class="badge pull-right">{{$row->articles_count}}</span> {{$row->name}} </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

</div>