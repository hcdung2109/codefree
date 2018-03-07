@extends('backend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
            <h2 class="page-title txt-color-blueDark"><i class="fa fa-desktop fa-fw "></i> Dashboard
                <a href="{{ route('backend.user.index') }}"><span>/ {{__('backend.list_user')}}  </span></a>
            </h2>
        </div>
    </div>
    <section id="widget-grid" class="">
        <div class="row">

            <!-- NEW COL START -->
            <article class="col-sm-12 col-md-12 col-lg-6  float-none center-block">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" role="widget" data-widget-sortable="false">
                    <header role="heading"><div class="jarviswidget-ctrls" role="menu">
                            <a href="javascript:void(0);" class="button-icon jarviswidget-toggle-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Collapse"><i class="fa fa-minus "></i></a> <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Fullscreen"><i class="fa fa-expand "></i></a> <a href="javascript:void(0);" class="button-icon jarviswidget-delete-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Delete"><i class="fa fa-times"></i></a></div>
                        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                        <h2>{{__('backend.info_user')}}</h2>

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

                            <form method="POST" action="{{route('backend.user.update',$user)}}" id="smart-form-register" class="smart-form client-form">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <fieldset>
                                    <section>
                                        <label class="input"> <i class="icon-append fa fa-user"></i>
                                            <input value="{{ $user->name }}" type="text" name="name" placeholder="{{__('backend.username')}}">
                                            <b class="tooltip tooltip-bottom-right">Needed to enter the website</b>
                                        </label>
                                        <div class="note">
                                            @if ($errors->has('name'))
                                                <span class="help-inline block txt-red">{{$errors->first('name')}}</span>
                                            @endif
                                        </div>
                                    </section>

                                    <section>
                                        <label class="input"> <i class="icon-append fa fa-envelope"></i>
                                            <input value="{{ $user->email }}" type="email" name="email" placeholder="Email address">
                                            <b class="tooltip tooltip-bottom-right">Needed to verify your account</b>
                                        </label>
                                        <div class="note">
                                            @if ($errors->has('email'))
                                                <span class="help-inline block txt-red">{{$errors->first('email')}}</span>
                                            @endif
                                        </div>
                                    </section>

                                </fieldset>

                                <fieldset>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label">{{__('backend.new_password')}}</label>
                                            <label class="input"> <i class="icon-append fa fa-lock"></i>
                                                <input type="password" name="new_password" placeholder="New Password" id="password">
                                                <b class="tooltip tooltip-bottom-right">Don't forget your password</b>
                                            </label>

                                        </section>

                                        <section class="col col-6">
                                            <label class="label">{{__('backend.confirm_password')}}</label>
                                            <label class="input"> <i class="icon-append fa fa-lock"></i>
                                                <input type="password" name="passwordConfirm" placeholder="Confirm password">
                                                <b class="tooltip tooltip-bottom-right">Don't forget your password</b>
                                            </label>
                                        </section>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <section >
                                        <label class="label">{{__('backend.select_status')}}</label>
                                        <label class="select">
                                            <select name="is_active">
                                                <option value="" selected>{{__('backend.status')}}</option>
                                                <option {{ $user->is_active == STATUS_ACTIVE ? 'selected' : ''}} value="1">{{__('backend.active')}}</option>
                                                <option {{ $user->is_active == STATUS_DEACTIVE ? 'checked' : ''}} value="0">{{__('backend.pending')}}</option>
                                            </select> <i></i>
                                        </label>
                                        <div class="note">
                                            @if ($errors->has('is_active'))
                                                <span class="help-inline block txt-red">{{$errors->first('is_active')}}</span>
                                            @endif
                                        </div>
                                    </section>
                                </fieldset>

                                <fieldset>
                                    <section>
                                        <label class="label">{{__('backend.select_role')}}</label>
                                        <div class="row">
                                            @foreach($roles as $index => $role)
                                                <div class="col col-4">
                                                    <label class="checkbox">
                                                        <input {{ $user->roles->contains($role->id) ? 'checked' : ''}} type="checkbox" name="role_id[]" value="{{ $role->id }}">
                                                        <i></i> {{$role->display_name}}
                                                    </label>
                                                </div>

                                            @endforeach
                                        </div>
                                    </section>
                                </fieldset>
                                <footer>
                                    <button type="submit" class="btn btn-primary">
                                        {{__('backend.save')}}
                                    </button>
                                </footer>
                            </form>
                        </div>
                        <!-- end widget content -->

                    </div>
                    <!-- end widget div -->

                </div>
                <!-- end widget -->

            </article>
            <!-- END COL -->
        </div>
    </section>
@endsection
