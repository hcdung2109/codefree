@extends('backend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">
            <ul class="breadcrumb no-padding bg-color-transparent">
                <li><a href="{{ route('backend.dashboard') }}"><i class="fa-fw fa fa-home"></i> Dashboard </a></li>
                <li><a href="{{ route('backend.article.index') }}"> Article </a></li>
                <li>{{ $article->title }}</li>
            </ul>
        </div>
    </div>

    <section id="widget-grid" class="">

        <!-- START ROW -->

        <div class="row">

            <!-- NEW COL START -->
            <article class="col-sm-12 col-md-12 col-lg-12">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                        <h2>{{__('page.detail_article')}}</h2>

                    </header>

                    <!-- widget div-->
                    <div>

                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->

                        </div>
                        <!-- end widget edit box -->

                        <!-- widget content -->
                        <div class="widget-body">

                            <form class="smart-form" method="POST" action="{{route('backend.article.update',$article)}}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                {{method_field('PUT')}}
                                <div class="col col-sm-12 col-md-6 col-lg-6 ">
                                    <section>
                                        <label class="label">Select {{__('page.parent')}}</label>
                                        <label class="select">
                                            <select name="category_id">
                                                <option value="0">NO.</option>
                                                {{ App\Helpers\Helper::createHtmlListCategories($listCategory, $article->category_id) }}
                                            </select> <i></i>
                                        </label>
                                    </section>

                                    <section>
                                        <label class="label">{{__('page.title')}}</label>
                                        <label class="input">
                                            <input type="text" name="title" value="{{$article->title}}">
                                        </label>
                                        <div class="note">
                                            @if ($errors->has('title'))
                                                <span class="help-inline block txt-red">{{__('page.required')}}</span>
                                            @endif
                                        </div>
                                    </section>

                                    <section>
                                        <label class="label">Is Published</label>
                                        <div class="inline-group">
                                            <label class="radio">
                                                <input type="radio" name="is_published" {{$article->is_published == 1 ? 'checked' : ''}}  value="1">
                                                <i></i>Yes
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="is_published" {{$article->is_published == 0 ? 'checked' : ''}} value="0">
                                                <i></i>No
                                            </label>
                                        </div>
                                    </section>


                                    <section>
                                        <label class="label">{{__('page.to_top')}}</label>
                                        <div class="inline-group">
                                            <label class="radio">
                                                <input type="radio" name="to_top" checked="checked" value="0">
                                                <i></i>{{__('page.no')}}</label>
                                            <label class="radio">
                                                <input type="radio" name="to_top" value="1">
                                                <i></i>{{__('page.yes')}}</label>
                                        </div>
                                        <div class="note">
                                            <strong>Maxlength</strong> is automatically added via the "maxlength='#'" attribute
                                        </div>

                                    </section>

                                </div>
                                <div class="col col-sm-12 col-md-6 col-lg-6 ">

                                    <section>
                                        <label class="label">{{__('page.current_image')}}</label>
                                        <img class="width-200" src="{{asset('storage/app').'/'.$article->image}}" alt="">
                                    </section>

                                    <section>
                                        <label class="label">{{__('page.change_image')}}</label>
                                        <div class="input input-file">
                                            <span class="button"><input type="file" id="other_image" name="other_image" onchange="this.parentNode.nextSibling.value = this.value">Browse</span><input name="other_image" type="text" placeholder="Include some files" readonly="">
                                        </div>
                                    </section>
                                </div>
                                <div class="clear-both"></div>

                                <section>
                                    <label class="label">{{__('page.summary')}}</label>
                                    <label class="textarea textarea-resizable">
                                        <textarea  name="summary" rows="5" class="custom-scroll">{{$article->summary}}</textarea>
                                    </label>
                                    <div class="note">
                                        @if ($errors->has('summary'))
                                            <span class="help-inline block txt-red">{{__('page.required')}}</span>
                                        @endif
                                    </div>
                                </section>

                                <section>
                                    <label class="label">{{__('page.desc')}}</label>
                                    <label class="textarea textarea-resizable" style="border: 1px solid #BDBDBD;">
                                        <textarea name="desc">{{$article->desc}}</textarea>
                                    </label>
                                    <div class="note">
                                        @if ($errors->has('desc'))
                                            <span class="help-inline block txt-red">{{__('page.required')}}</span>
                                        @endif
                                    </div>
                                </section>
                                <footer>
                                    <button type="submit" class="btn btn-primary">{{__('page.update')}}</button>
                                    <button type="button" class="btn btn-default" onclick="window.history.back();">{{__('page.back')}}</button>
                                </footer>
                            </form>

                        </div>
                        <!-- end widget content -->

                    </div>
                    <!-- end widget div -->

                </div>

            </article>
            <!-- END COL -->
        </div>

        <!-- END ROW -->

    </section>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            // Config ckeditor
            CKEDITOR.replace('desc',{
                height: '800px',
                filebrowserBrowseUrl: 'js/plugin/ckfinder/ckfinder.html',
                filebrowserImageBrowseUrl: 'js/plugin/ckfinder/ckfinder.html?type=Images',
                filebrowserFlashBrowseUrl: 'js/plugin/ckfinder/ckfinder.html?type=Flash',
                filebrowserUploadUrl: 'js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                filebrowserImageUploadUrl: 'js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                filebrowserFlashUploadUrl: 'js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
            });

        });
    </script>
@endsection

