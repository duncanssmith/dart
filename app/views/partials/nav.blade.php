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
                            <strong>David Ryan</strong>
                        </a>
                    </li>

                    <li><a href="/page/8" class="header-link">Bio</a></li>
                    <li class="dropdown" role="presentation">
                        <a href="#" data-toggle="dropdown" class="header-link">
                            Paintings
                        </a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                            @foreach($group_list as $item)
                                <li><a href="/page/{{$item->id}}" class="header-dropdown-link">{{ $item->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="/page/3" class="header-link">Texts</a></li>
                    <li class="dropdown" role="presentation">
                        <a href="#"  data-toggle="dropdown" class="header-link">
                            Projects
			</a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
													<li><a href="/page/9" class="header-dropdown-link">Via di San Teodoro 8</a></li>
													<li><a href="/page/10" class="header-dropdown-link">Chemical Free (?) - Venice Biennale</a></li>
													<li><a href="/page/11" class="header-dropdown-link">Drawing Towards Sound</a></li>
													<li><a href="/page/19" class="header-dropdown-link">British School at Rome</a></li>
													<li><a href="/page/20" class="header-dropdown-link">Painting, Drawing and Architecture (Phases 1,2,3 and 4)</a></li>
													<li><a href="/page/12" class="header-dropdown-link">Recitativo</a></li>
													<li><a href="/page/13" class="header-dropdown-link">Aphorisms</a></li>
													<li><a href="/page/14" class="header-dropdown-link">The Undersides of Practice, APT Gallery</a></li>
													<li><a href="/page/15" class="header-dropdown-link">Pescia Museo Civico, Italy</a></li>
													<li><a href="/page/16" class="header-dropdown-link">I-ME/Inscriptions</a></li>
													<li><a href="/page/17" class="header-dropdown-link">Echoes, Fragments, Inscriptions</a></li>
													<li><a href="/page/18" class="header-dropdown-link">WIP</a></li>
                        </ul>
                    </li>

                    <!--<li class="dropdown" role="presentation">
                        <a href="/page/1" class="header-link">
                            first
                        </a>
                    </li>-->

                    @if (Auth::guest())

                        {{--<li><a href="/register" class="header-link-secure">Register</a></li>--}}

                    @else

                        <li><a href="/pages" class="header-link-secure" title="Add or update pages"><i class="fa fa-bookmark"></i> Pages</a></li>
                        <li><a href="/works" class="header-link-secure" title="Add or update works"><i class="fa fa-paint-brush"></i> Works</a></li>
                        <li><a href="/texts" class="header-link-secure" title="Add or update texts"><i class="fa fa-align-left"></i> Texts</a></li>
			<li><a href="/covers" class="header-link-secure" title="Set, add, or change the cover image"><i class="fa fa-photo"></i> Covers</a></li>

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
