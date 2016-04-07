<?php namespace Acme\View\Composer;

class NavigationComposer {
	
    public function compose($view)
    {
        $group_list = \Group::where('display', '=', 1)->orderBy('order', 'asc')->get();

        $view->with('group_list', $group_list);
    }

}

