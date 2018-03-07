@extends('fontend.layouts.master')

@section('content')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">
        <ul class="breadcrumb no-padding bg-color-transparent">
            <li><i class="fa-fw fa fa-home"></i> Home </li>
        </ul>
    </div>

    {!! $html !!}
@endsection
