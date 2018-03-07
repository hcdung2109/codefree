<aside id="left-panel">

    <!-- User info -->
    <div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as it -->

					<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
						<img src="img/avatars/sunny.png" alt="me" class="online">
						<span>
							john.doe
						</span>
						<i class="fa fa-angle-down"></i>
					</a>

				</span>
    </div>
    <!-- end user info -->

    <nav id="navigation" style="border-top: 1px solid #B8B8B8; ">
        <ul class="container main-menu">
            <li style="border-left: 1px solid #B8B8B8 !important; ">
                <a href="{{ route('blog.home') }}" title="HOME">Trang Chủ</a>
            </li>
            {{ App\Helpers\Helper::createHtmlNavigation($listCategory) }}
        </ul>
    </nav>
    <span class="minifyme" data-action="minifyMenu">
				<i class="fa fa-arrow-circle-left hit"></i>
			</span>

</aside>