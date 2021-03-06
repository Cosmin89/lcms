

<div id="app">
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="/admin">CMS Admin</a>
</div>
<!-- Top Menu Items -->
<ul class="nav navbar-right top-nav">
    <!--<li><a href="">Users Online: <?php //echo users_online(); ?></a></li>-->
    <li><a href="">Users Online: <span class="usersonline">@{{ usersInRoom.length }}</span></a></li>
    <li><a href="/">HOME</a></li>
  
    <li>
        <a href="javascript:;" data-toggle="dropdown" data-target="#dropdown-menu"><i class="fa fa-user"></i> {{ Auth::user()->username }} <b class="caret"></b></a>
        <ul id="dropdown-menu" class="collapse">
            <li>
                <a href="{{ route('user.profile', ['username' => Auth::user()->username]) }}"><i class="fa fa-fw fa-user"></i> Profile</a>
            </li>
            <li class="divider"></li>
            <li>
                 <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </li>
</ul>

<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li>
            <a href="{{ route('admin') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="posts_dropdown" class="collapse">
                <li>
                    <a href="{{ route('posts') }}">View All Posts</a>
                </li>
                <li>
                    <a href="{{ route('post.create') }}">Add Posts</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('categories') }}"><i class="fa fa-fw fa-wrench"></i> Categories Page</a>
        </li>
        <li class="">
            <a href="{{ route('comments') }}"><i class="fa fa-fw fa-file"></i> Comments</a>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#users"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="users" class="collapse">
                <li>
                    <a href="{{ route('users') }}">View All Users</a>
                </li>
                <li>
                    <a href="{{ route('user.create') }}">Create User</a>
                </li>
            </ul>
        </li>
        <li class="active">
            <a href="{{ route('user.profile', ['username' => Auth::user()->username]) }}"><i class="fa fa-fw fa-file"></i> Profile</a>
        </li>
    </ul>
</div>
<!-- /.navbar-collapse -->
</nav>
</div>