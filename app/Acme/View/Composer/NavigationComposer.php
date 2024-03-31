<?php namespace Acme\View\Composer;

class NavigationComposer {
	
    public function compose($view)
    {
        $group_list = \Group::orderBy('order', 'asc')->where('display', '=', 1)->get();

        $view->with('group_list', $group_list);
    }

}

