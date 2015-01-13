    <nav class="navbar navbar">
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to($entity.'s') }}" title="List {{ $entity }}s" class="header-link-secure"><i class="fa fa-list"></i></a></li>
            <li><a href="{{ URL::to($entity.'s/create') }}" title="Add a new {{ $entity }}" class="header-link-secure"><i class="fa fa-plus"></i></a></li>
        </ul>
    </nav>