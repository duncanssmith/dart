    <nav class="navbar navbar-fixed-top nav-bottom-line <?php echo isset($body_class) ? '' : ''?>" role="navigation">

        <div class="navbar-header">

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>

            <div class="navbar-collapse collapse " role="navigation">

                <ul class="nav navbar-nav">

                    <li class="dropdown" role="presentation">
                        <a href="/" class="navbar-brand header-link">
                            <strong>dart</strong>
                        </a>
                    </li>

                    <li class="dropdown" role="presentation">
                        <a href="#" data-toggle="dropdown" class="header-link">
                            list
                        </a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                            @foreach($group_list as $item)
                                <li><a href="/page/{{$item->id}}" class="header-dropdown-link">{{ $item->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="dropdown" role="presentation">
                        <a href="/page/1" class="header-link">
                            work
                        </a>
                    </li>

                    <li class="dropdown" role="presentation">
                        <a href="/page/2" class="header-link">
                            contact
                        </a>
                    </li>

                    <li class="dropdown" role="presentation">
                        <a href="/page/3" class="header-link">
                            info
                        </a>
                    </li>

                    @if (Auth::guest())

                    @else

                        <li><a href="/pages" class="header-link-secure"><i class="fa fa-bookmark"></i> Pages</a></li>
                        <li><a href="/works" class="header-link-secure"><i class="fa fa-paint-brush"></i> Works</a></li>
                        <li><a href="/texts" class="header-link-secure"><i class="fa fa-align-left"></i> Texts</a></li>
                        {{--<li><a href="/users" class="header-link-secure"><i class="fa fa-users"></i> Users</a></li>--}}

                    @endif

                </ul>
            </div>
        </div>
        <div class="navbar-header pull-right">
            <ul class="nav navbar-nav">

                @if (Auth::guest())

                    <li><a href="/login" title="Log in" class="<?php echo isset($body_class) ? 'header-link-secure' : 'header-link'?>"><i class="fa fa-key icon-white"></i> </a></li>

                @else

                    <li class="dropdown" role="presentation">
                        <a href="#" data-toggle="dropdown" title="Logged in as" class="header-link-secure"><i class="fa fa-user xicon-white"></i> {{ Auth::check() ?  Auth::user()->username : "" }}</a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dlabel">
                            <li class="dropdown" role="presentation"><a href="/logout" title="Log out" class="header-dropdown-link">Log out</a></li>
                        </ul>
                @endif
            </ul>
        </div>
    </nav>
<hr class="navbar-end">
