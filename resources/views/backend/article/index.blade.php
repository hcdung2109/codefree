@extends('backend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">
            <ul class="breadcrumb no-padding bg-color-transparent">
                <li><a href="{{ route('backend.dashboard') }}"><i class="fa-fw fa fa-home"></i> Dashboard </a></li>
                <li>Article</li>
            </ul>
        </div>
    </div>

    <ul class="demo-btns">
        <li>
            <a href="{{route('backend.article.create')}}" class="btn btn-labeled bg-color-magenta txt-color-white">
                <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>
                {{__('page.create_new')}}
            </a>
        </li>
    </ul>
    <section id="widget-grid" class="">

        <!-- row -->
        <div class="row">

            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget " id="wid-id-3" data-widget-editbutton="false" role="widget">
                    <header role="heading"><div class="jarviswidget-ctrls" role="menu">   <a href="javascript:void(0);" class="button-icon jarviswidget-toggle-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Collapse"><i class="fa fa-minus "></i></a> <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Fullscreen"><i class="fa fa-expand "></i></a> <a href="javascript:void(0);" class="button-icon jarviswidget-delete-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Delete"><i class="fa fa-times"></i></a></div><div class="widget-toolbar" role="menu"><a data-toggle="dropdown" class="dropdown-toggle color-box selector" href="javascript:void(0);"></a><ul class="dropdown-menu arrow-box-up-right color-select pull-right"><li><span class="bg-color-green" data-widget-setstyle="jarviswidget-color-green" rel="tooltip" data-placement="left" data-original-title="Green Grass"></span></li><li><span class="bg-color-greenDark" data-widget-setstyle="jarviswidget-color-greenDark" rel="tooltip" data-placement="top" data-original-title="Dark Green"></span></li><li><span class="bg-color-greenLight" data-widget-setstyle="jarviswidget-color-greenLight" rel="tooltip" data-placement="top" data-original-title="Light Green"></span></li><li><span class="bg-color-purple" data-widget-setstyle="jarviswidget-color-purple" rel="tooltip" data-placement="top" data-original-title="Purple"></span></li><li><span class="bg-color-magenta" data-widget-setstyle="jarviswidget-color-magenta" rel="tooltip" data-placement="top" data-original-title="Magenta"></span></li><li><span class="bg-color-pink" data-widget-setstyle="jarviswidget-color-pink" rel="tooltip" data-placement="right" data-original-title="Pink"></span></li><li><span class="bg-color-pinkDark" data-widget-setstyle="jarviswidget-color-pinkDark" rel="tooltip" data-placement="left" data-original-title="Fade Pink"></span></li><li><span class="bg-color-blueLight" data-widget-setstyle="jarviswidget-color-blueLight" rel="tooltip" data-placement="top" data-original-title="Light Blue"></span></li><li><span class="bg-color-teal" data-widget-setstyle="jarviswidget-color-teal" rel="tooltip" data-placement="top" data-original-title="Teal"></span></li><li><span class="bg-color-blue" data-widget-setstyle="jarviswidget-color-blue" rel="tooltip" data-placement="top" data-original-title="Ocean Blue"></span></li><li><span class="bg-color-blueDark" data-widget-setstyle="jarviswidget-color-blueDark" rel="tooltip" data-placement="top" data-original-title="Night Sky"></span></li><li><span class="bg-color-darken" data-widget-setstyle="jarviswidget-color-darken" rel="tooltip" data-placement="right" data-original-title="Night"></span></li><li><span class="bg-color-yellow" data-widget-setstyle="jarviswidget-color-yellow" rel="tooltip" data-placement="left" data-original-title="Day Light"></span></li><li><span class="bg-color-orange" data-widget-setstyle="jarviswidget-color-orange" rel="tooltip" data-placement="bottom" data-original-title="Orange"></span></li><li><span class="bg-color-orangeDark" data-widget-setstyle="jarviswidget-color-orangeDark" rel="tooltip" data-placement="bottom" data-original-title="Dark Orange"></span></li><li><span class="bg-color-red" data-widget-setstyle="jarviswidget-color-red" rel="tooltip" data-placement="bottom" data-original-title="Red Rose"></span></li><li><span class="bg-color-redLight" data-widget-setstyle="jarviswidget-color-redLight" rel="tooltip" data-placement="bottom" data-original-title="Light Red"></span></li><li><span class="bg-color-white" data-widget-setstyle="jarviswidget-color-white" rel="tooltip" data-placement="right" data-original-title="Purity"></span></li><li><a href="javascript:void(0);" class="jarviswidget-remove-colors" data-widget-setstyle="" rel="tooltip" data-placement="bottom" data-original-title="Reset widget color to default">Remove</a></li></ul></div>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2>{{__('page.table_article')}}</h2>

                        <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

                    <!-- widget div-->
                    <div role="content">

                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->

                        </div>
                        <!-- end widget edit box -->

                        <!-- widget content -->
                        <div class="widget-body no-padding">

                            <div id="datatable_tabletools_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                <div class="dt-toolbar">
                                    <div class="col-xs-12 col-sm-6">
                                        <div id="datatable_tabletools_filter" class="dataTables_filter">
                                            <label><span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                                                <input type="search" class="form-control" placeholder="" aria-controls="datatable_tabletools">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <table id="datatable_tabletools" class="table table-striped table-bordered table-hover dataTable no-footer table-article" width="100%" role="grid" aria-describedby="datatable_tabletools_info" style="width: 100%;">
                                    <thead>
                                    <tr role="row">
                                    <thead>
                                    <tr>
                                        <th class="text-center width-100">{{__('page.image')}}</th>
                                        <th class="text-center">{{__('page.category')}}</th>
                                        <th class="text-center">{{__('page.title')}}</th>
                                        <th class="text-center">{{__('page.summary')}}</th>
                                        <th class="text-center width-20">{{__('page.status')}}</th>
                                        <th class="text-center">{{__('page.count_views')}}</th>
                                        <th class="text-center">{{__('backen.created_at')}}</th>
                                        <th class="text-center wid-250">{{__('page.action')}}</th>
                                    </tr>
                                    </thead>
                                    </tr>
                                    </thead>
                                    <tbody class="smart-form">
                                    @foreach($articles as $item)
                                        <tr class="item-{{$item->id}}">
                                            <td ><img src="{{asset('storage/app/'.$item->image)}}"></td>
                                            <td>{{$item->category['name']}}</td>
                                            <td>{{$item->title}}</td>
                                            <td>{{str_limit($item->summary,200)}}</td>
                                            <td class="text-center">
                                                <label class="toggle">
                                                    <input onclick="clickChangeStatus({{$item->id}})" type="checkbox" name="checkbox-toggle" checked="checked" >
                                                    <i data-swchon-text="ON" data-swchoff-text="OFF"></i>
                                                </label>
                                            </td>
                                            <td class="text-center">{{$item->count_views}}</td>
                                            <td class="text-center">{{$item->created_at}}</td>
                                            <td class="text-center">
                                                <button class="btn btn-success btn-sm">
                                                    <i class="fa fa-paper-plane"></i>
                                                    {{__('page.to_top')}}
                                                </button>
                                                <a href="{{route('backend.article.edit',$item)}}" class="btn btn-info btn-sm">
                                                    <i class="fa fa-gear fa-spin"></i>
                                                    {{__('page.edit')}}
                                                </a>
                                                <button class="btn btn-danger btn-sm" onclick="clickDelete({{$item->id}})">
                                                    <i class="fa fa-trash-o"></i>
                                                    {{__('page.delete')}}
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>

                        </div>
                        <!-- end widget content -->

                    </div>
                    <!-- end widget div -->

                </div>
                <!-- end widget -->

            </article>
            <!-- WIDGET END -->

            <div class="pagination ">
                {{ $articles->links() }}
            </div>

        </div>

        <!-- end row -->

        <!-- end row -->

    </section>

@endsection

@section('script')
    <script type="text/javascript">

        function clickDelete(id) {
            // call function delete category
            ajaxDeleteItemTable(id,'article');
        }

        function clickChangeStatus(id) {
            var model = 'article/changeStatus';
            var message = 'Are you sure change status of article ?';

            // call function change status
            ajaxChangeStatus(id,model,message);
        }

    </script>
@endsection