<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul>
                <li class="has_sub">
                    <a href="{{ route('admin.dashboard') }}" class="{{ Request::is('admin/dashboard*') ? 'active' : '' }} waves-effect"><i class="icon-grid"></i><span> Dashboard </span> </a>
                </li>
                <li class="has_sub">
                    <a href="{{ route('admin.user') }}" class="waves-effect"><i class="icon-people"></i><span> Users </span> </a>
                </li>
                {{-- <li class="has_sub">
                    <a href="{{ route('admin.role') }}" class="{{ Request::is('admin/role*') ? 'active' : '' }} waves-effect"><i class="icon-check"></i><span> Roles </span> </a>
                </li> --}}

                <li class="has_sub">
                    <a href="{{ route('admin.service.index') }}" class="{{ Request::is('admin/service*') ? 'active' : '' }}waves-effect"><i class="ion-settings"></i><span> Services </span> </a>
                </li>
                <li class="has_sub">
                    <a href="{{ route('admin.partner.index') }}" class="{{ Request::is('admin/partner*') ? 'active' : '' }}waves-effect"><i class="fa fa-handshake-o"></i><span> Partners </span> </a>
                </li>
                <li class="has_sub">
                    <a href="{{ route('admin.award.index') }}" class="{{ Request::is('admin/award*') ? 'active' : '' }}waves-effect"><i class="icon-trophy"></i><span> Awards </span> </a>
                </li>
                <li class="has_sub">
                    <a href="{{ route('admin.testimonial.index') }}" class="{{ Request::is('admin/testimonial*') ? 'active' : '' }}waves-effect"><i class="zmdi zmdi-comment-text"></i><span> Testimonials </span> </a>
                </li>
                <li class="has_sub">
                    <a href="{{ route('admin.subscriber.index') }}" class="{{ Request::is('admin/subscriber*') ? 'active' : '' }}waves-effect"><i class="fa fa-send-o"></i><span> Subscriber </span> </a>
                </li>
                <li class="has_sub">
                    <a href="{{ route('admin.project.index') }}" class="{{ Request::is('admin/project*') ? 'active' : '' }}waves-effect"><i class="zmdi zmdi-view-quilt"></i><span> Projects </span> </a>
                </li>
                <li class="has_sub">
                    <a href="{{ route('admin.blog.index') }}" class="{{ Request::is('admin/blog*') ? 'active' : '' }}waves-effect"><i class="zmdi zmdi-blogger"></i><span> Blogs </span> </a>
                </li>
                <li class="has_sub">
                    <a href="{{ route('admin.event.index') }}" class="{{ Request::is('admin/event*') ? 'active' : '' }}waves-effect"><i class="icon-bell"></i><span> Event </span> </a>
                </li>
                <li class="has_sub">
                    <a href="{{ route('admin.news.index') }}" class="{{ Request::is('admin/news*') ? 'active' : '' }}waves-effect"><i class="typcn typcn-news"></i><span> News </span> </a>
                </li>
                <li class="has_sub">
                    <a href="{{ route('admin.story.index') }}" class="{{ Request::is('admin/story*') ? 'active' : '' }}waves-effect"><i class="zmdi zmdi-camera-roll"></i><span> Stories </span> </a>
                </li>
                <li class="has_sub">
                    <a href="{{ route('admin.team.index') }}" class="{{ Request::is('admin/team*') ? 'active' : '' }}waves-effect"><i class="fa fa-group"></i><span> Teams </span> </a>
                </li>
                <li class="has_sub">
                    <a href="{{ route('admin.join-team.index') }}" class="{{ Request::is('admin/join-team*') ? 'active' : '' }}waves-effect"><i class="icon-people"></i><span> Join Teams Request </span> </a>
                </li>
                <li class="has_sub">
                    <a href="{{ route('admin.indomitable-women.index') }}" class="{{ Request::is('admin/indomitable-women*') ? 'active' : '' }}waves-effect"><i class="icon-user-female"></i><span> Indomitable Women </span> </a>
                </li>
                <li class="has_sub">
                    <a href="{{ route('admin.album.index') }}" class="{{ Request::is('admin/album*') ? 'active' : '' }}waves-effect"><i class="ion-ios7-albums-outline"></i><span> Album </span> </a>
                </li>
                <li class="has_sub">
                    <a href="{{ route('admin.gallery.index') }}" class="{{ Request::is('admin/gallery*') ? 'active' : '' }}waves-effect"><i class="ti-gallery"></i><span> Gallery </span> </a>
                </li>
                <li class="has_sub">
                    <a href="{{ route('admin.product.index') }}" class="{{ Request::is('admin/product*') ? 'active' : '' }}waves-effect"><i class="fa fa-product-hunt"></i><span> Product </span> </a>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="icon-earphones-alt"></i> <span> Mentor Program </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="{{ route('admin.mentor-application.index') }}" class="{{ Request::is('admin/mentor-application*') ? 'active' : '' }}waves-effect"><i class="icon-earphones-alt"></i><span> Mentor </span> </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.hire-mentor.index') }}" class="{{ Request::is('admin/mentor-application*') ? 'active' : '' }}waves-effect"><i class="ion-bookmark"></i><span> Hired Mentors </span> </a>
                        </li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-crown"></i> <span> Ambassador </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="{{ route('admin.ambassador-application.index') }}" class="{{ Request::is('admin/ambassador-application*') ? 'active' : '' }}waves-effect"><i class="ti-crown"></i><span> All Ambassadors </span> </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.hire-ambassador.index') }}" class="{{ Request::is('admin/hire-ambassador*') ? 'active' : '' }}waves-effect"><i class="ti-crown"></i><span> Hired Ambassador </span> </a>
                        </li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="{{ route('admin.page-builder.index') }}" class="{{ Request::is('admin/page-builder*') ? 'active' : '' }}waves-effect"><i class="zmdi zmdi-google-pages"></i><span> Page Builder </span> </a>
                </li>
                <li class="has_sub">
                    <a href="{{ route('admin.path-finder.index') }}" class="{{ Request::is('admin/path-finder*') ? 'active' : '' }}waves-effect"><i class="zmdi zmdi-translate"></i><span> Path Finder</span> </a>
                </li>
                <li class="has_sub">
                    <a href="{{ route('admin.path-finder-reply.index') }}" class="{{ Request::is('admin/path-finder-reply*') ? 'active' : '' }}waves-effect"><i class="zmdi zmdi-translate"></i><span> Path Finder Answer</span> </a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>
    </div>
</div>
