@extends('backend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">
            <ul class="breadcrumb no-padding bg-color-transparent">
                <li><a href="{{ route('backend.dashboard') }}"><i class="fa-fw fa fa-home"></i> Dashboard </a></li>
                <li><a href="{{ route('backend.article.index') }}">Article </a></li>
                <li>Create new</li>
            </ul>
        </div>
    </div>

    <section id="widget-grid" class="">

        <!-- START ROW -->

        <div class="row">

            <!-- NEW COL START -->

            <form class="smart-form"  method="POST" action="{{route('backend.article.store')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <fieldset>
                    <legend class="txt-bold" style="padding: 15px;">{{__('page.article')}}</legend>
                    <div class="col col-sm-12 col-md-6 col-lg-6 ">
                        <section>
                            <label class="label">Select {{__('page.parent')}}</label>
                            <label class="select">
                                <select name="category_id">
                                    <option value="0">NO.</option>
                                    {{ App\Helpers\Helper::createHtmlListCategories($listCategory) }}
                                </select> <i></i>
                            </label>
                        </section>

                        <section>
                            <label class="label">{{__('page.title')}}</label>
                            <label class="input">
                                <input type="text" name="title">
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
                                    <input value="1" type="radio" name="is_published" checked="checked">
                                    <i></i>Yes</label>
                                <label class="radio">
                                    <input value="0" type="radio" name="is_published">
                                    <i></i>No</label>
                            </div>
                        </section>

                    </div>
                    <div class="col col-sm-12 col-md-6 col-lg-6">
                        <section>
                            <label class="label">{{__('page.image')}}</label>
                            <div class="input input-file">
                                <span class="button"><input type="file" id="image" name="image" onchange="this.parentNode.nextSibling.value = this.value">Browse</span><input type="text" placeholder="Include some files" readonly="">
                            </div>
                        </section>

                    </div>

                    <div class="clear-both"></div>

                    <section>
                        <label class="label">{{__('page.summary')}}</label>
                        <label class="textarea textarea-resizable">
                            <textarea name="summary" rows="5" class="custom-scroll"></textarea>
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
                            <textarea name="desc"></textarea>
                        </label>
                        <div class="note">
                            @if ($errors->has('desc'))
                                <span class="help-inline block txt-red">{{__('page.required')}}</span>
                            @endif
                        </div>
                    </section>

                    <footer>
                        <button type="submit" class="btn btn-primary">{{__('page.save')}}</button>
                        <button type="button" class="btn btn-default" onclick="window.history.back();">{{__('page.back')}}</button>
                    </footer>
                </fieldset>
            </form>
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

