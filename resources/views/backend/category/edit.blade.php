@extends('backend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">
            <ul class="breadcrumb no-padding bg-color-transparent">
                <li><a href="{{ route('backend.dashboard') }}"><i class="fa-fw fa fa-home"></i> Dashboard </a></li>
                <li>Category</li>
            </ul>
        </div>
    </div>
    <section id="widget-grid" class="">
        <div class="row">
            <form method="POST" action="{{route('backend.category.update',$category)}}">
                {{method_field('PUT')}}
                {{csrf_field()}}
                <fieldset>
                    <legend class="txt-bold" style="padding: 15px;">Edit *</legend>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select name="parent_id" class="form-control">
                                <option value="0">Select Parent.</option>
                                {{ App\Helpers\Helper::createHtmlListCategories($listCategory, $category->parent_id) }}
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text"  name="name" class="form-control" placeholder="Enter Name" value="{{$category->name}}">
                        </div>
                        <div class="note">
                            @if ($errors->has('name'))
                                <span class="help-inline block txt-red">{{__('backend.required')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label class="radio radio-inline">
                            <input value="1" type="radio" class="radiobox" name="is_active" {{$category->is_active == 1 ? 'checked' : ''}}>
                            <span>{{__('backend.active')}}</span>
                        </label>
                        <label class="radio radio-inline" style="margin-top: 10px">
                            <input value="0" type="radio" class="radiobox" name="is_active" {{$category->is_active == 0 ? 'checked' : ''}}>
                            <span>{{__('backend.deactive')}}</span>
                        </label>
                    </div>

                    <div class="col-md-3">
                        <div class="inline-group">
                            <button type="submit" class="btn btn-primary">{{__('backend.save')}}</button>
                            <button type="reset" class="btn btn-default" >Reset</button>
                        </div>
                    </div>

                </fieldset>
            </form>
        </div>
        <!-- row -->
        <div class="row">
            <!-- NEW WIDGET START -->
            <fieldset>
                <legend class="txt-bold" style="padding: 15px;">LIST CATEGORY *</legend>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <table id="datatable_tabletools" class="table table-striped table-bordered table-hover dataTable no-footer" width="100%" role="grid" aria-describedby="datatable_tabletools_info" style="width: 100%;">
                        <thead>
                        <tr role="row">
                        <thead>
                        <tr>
                            <th class="text-center">{{__('page.name')}}</th>
                            <th class="text-center">{{__('page.parent')}}</th>
                            <th class="text-center">{{__('backend.created_at')}}</th>
                            <th class="text-center width-20">{{__('page.status')}}</th>
                            <th class="text-center wid-250">{{__('page.action')}}</th>
                        </tr>
                        </thead>
                        </tr>
                        </thead>
                        <tbody class="smart-form">
                        @foreach($listCategoryPaginate as $item)
                            <tr class="item-{{$item->id}}">
                                <td>{{$item->name}}</td>
                                <td>
                                    @if ($item->parent)
                                        {{$item->parent->name}}
                                    @else
                                        Null
                                    @endif
                                </td>
                                <td class="text-center">
                                    <label class="toggle">{{ $item->created_at }}</label>
                                </td>
                                <td class="text-center">
                                    <label class="toggle">
                                        <input onclick="clickChangeStatus({{$item->id}})" type="checkbox" name="checkbox-toggle" checked="checked" >
                                        <i data-swchon-text="ON" data-swchoff-text="OFF"></i>
                                    </label>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-success btn-sm">
                                        <i class="fa fa-paper-plane"></i>
                                        {{__('page.to_top')}}
                                    </button>
                                    <a href="{{route('backend.category.edit',$item)}}" class="btn btn-info btn-sm">
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
            </fieldset>
            <!-- WIDGET END -->

            <div class="pagination ">
                {{ $listCategoryPaginate->links() }}
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
            ajaxDeleteItemTable(id,'category');
        }

        function clickChangeStatus(id) {
            var model = 'category/changeStatus';
            var message = 'Are you sure change status ?';

            // call function change status
            ajaxChangeStatus(id,model,message);
        }

    </script>
@endsection