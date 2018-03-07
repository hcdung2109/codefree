<aside id="left-panel">

    <!-- User info -->
    <div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as it -->

					<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
						<img src="public/backend/img/avatars/sunny.png" alt="me" class="online">
						<span>
							john.doe
						</span>
						<i class="fa fa-angle-down"></i>
					</a>

				</span>
    </div>
    <!-- end user info -->

    <nav id="navigation">
        <ul class="main-menu">
            <li>
                <a href="#" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Dashboard</span></a>
            </li>
            <li>
                <a href="{{route('backend.category.index')}}">
                    <i class="fa fa-lg fa-fw fa-list-alt"></i> <span class="menu-item-parent">{{__('backend.category')}}</span>
                </a>
                <ul>
                    <li>
                        <a href="{{route('backend.category.create')}}"><i class="fa fa-plus"></i> {{__('backend.add_category')}}</a>
                    </li>
                    <li>
                        <a href="{{route('backend.category.index')}}"><i class="fa fa-list"></i> {{__('backend.list_category')}}</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{route('backend.article.index')}}">
                    <i class="fa fa-lg fa-fw fa-pencil-square-o"></i> <span class="menu-item-parent">{{__('backend.article')}}</span>
                </a>
                <ul>
                    <li>
                        <a href="{{route('backend.article.create')}}"><i class="fa fa-plus"></i> {{__('backend.add_article')}}</a>
                    </li>
                    <li>
                        <a href="{{route('backend.article.index')}}"><i class="fa fa-list"></i> {{__('backend.list_article')}}</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{route('backend.user.index')}}">
                    <i class="fa fa-user"></i> <span class="menu-item-parent">{{__('backend.user')}}</span>
                </a>
                <ul>
                    <li>
                        <a href="{{route('backend.user.create')}}"><i class="fa fa-plus"></i> {{__('backend.add_user')}}</a>
                    </li>
                    <li>
                        <a href="{{route('backend.user.index')}}"><i class="fa fa-list"></i> {{__('backend.list_user')}}</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="{{route('backend.article.index')}}">
                    <i class="fa fa-group"></i> <span class="menu-item-parent">{{__('backend.auth')}}</span>
                </a>
                <ul>
                    <li>
                        <a href="{{route('backend.role.index')}}"><i class="fa fa-folder"></i> {{__('backend.role')}}</a>
                    </li>

                    <li>
                        <a href="javascription:void(0)"><i class="fa fa-folder"></i> {{__('backend.function')}}</a>
                        <ul>
                            <li>
                                <a href="{{route('backend.permission.create')}}"><i class="fa fa-fw fa-folder-open"></i> {{__('backend.create_function')}}</a>
                            </li>
                            <li>
                                <a href="{{route('backend.permission.index')}}"><i class="fa fa-fw fa-folder-open"></i> {{__('backend.list_function')}}</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <span class="minifyme" data-action="minifyMenu">
				<i class="fa fa-arrow-circle-left hit"></i>
			</span>

</aside>