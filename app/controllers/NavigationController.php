<?php

class NavigationController extends BaseController {

    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layout.main';

    /**
     * @return mixed
     */
    public function index()
    {
        // Check the user is logged in...
        if (Auth::check()) {
            // paginate
            $navigations = Navigation::orderBy('id', 'asc')->paginate(9);

            return View::make('navigations.index')
                ->with('navigations', $navigations)
                ->with('entity', 'navigation')
                ->with('title', 'Navigations');

        } else {
            // User is not logged in
            Session::flash('message', 'Please log in');
            return Redirect::to('/');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // load the create form (app/views/navigations/create.blade.php)
        if (Auth::check()) {

            return View::make('navigations.create')
                ->with('entity', 'navigation')
                ->with('title', 'Navigation create');
        } else {
            // User is not logged in
            Session::flash('message', 'Please log in');

            return Redirect::to('/');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        if (Auth::check()) {
            // validate
            // read more on validation at http://laravel.com/docs/validation
            $rules = array(
                'name'      => 'required',
            );
            $validator = Validator::make(Input::all(), $rules);

            // process the login
            if ($validator->fails()) {
                return Redirect::to('navigations/create')
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));
            } else {
                // store
                $navigation = new Navigation;
                $navigation->name    = Input::get('name');
                $navigation->alias   = Input::get('alias');
                $navigation->url     = Input::get('url');
                $navigation->level  = Input::get('level');
                $navigation->layout  = Input::get('layout');
                $navigation->order   = Input::get('order');
                $navigation->display = (Input::get('display') == 'on') ? 1 : 0;
                $navigation->secure = (Input::get('secure') == 'on') ? 1 : 0;
                $navigation->save();

                // redirect
                Session::flash('message', 'Successfully created navigation');

                return Redirect::to('navigations');
            }
        } else {
            // User is not logged in
            Session::flash('message', 'Please log in');

            return Redirect::to('/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        if (Auth::check()) {
            // get the navigation
            $navigation = Navigation::find($id);

            // show the view and pass the navigation to it
            return View::make('navigations.show')
                ->with('navigation', $navigation)
                ->with('entity', 'navigation')
                ->with('title', 'Navigation show');
        } else {
            // User is not logged in
            Session::flash('message', 'Please log in');

            return Redirect::to('/');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        if (Auth::check()) {
            // get the navigation
            $navigation = Navigation::find($id);

            // show the edit form and pass the navigation
            return View::make('navigations.edit')
                ->with('navigation', $navigation)
                ->with('entity', 'navigation')
                ->with('title', 'Navigation edit');
        } else {
            // User is not logged in
            Session::flash('message', 'Please log in');
            return Redirect::to('/');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        if (Auth::check()) {
            // validate
            // read more on validation at http://laravel.com/docs/validation
            $rules = array(
                'name'       => 'required'
            );
            $validator = Validator::make(Input::all(), $rules);

            // process the login
            if ($validator->fails()) {
                return Redirect::to('navigations/' . $id . '/edit')
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));
            } else {
                // store
                $navigation = Navigation::find($id);
                $navigation->name    = Input::get('name');
                $navigation->alias   = Input::get('alias');
                $navigation->url     = Input::get('url');
                $navigation->level   = Input::get('level');
                $navigation->layout  = Input::get('layout');
                $navigation->order   = Input::get('order');
                $navigation->display = (Input::get('display') == 'on') ? 1 : 0;
                $navigation->secure = (Input::get('secure') == 'on') ? 1 : 0;
                $navigation->save();

                // redirect
                Session::flash('message', 'Successfully updated navigation');
                return Redirect::to('navigations');
            }
        } else {
            // User is not logged in
            Session::flash('message', 'Please log in');
            return Redirect::to('/');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if (Auth::check()) {
            $navigation = Navigation::find($id);
            $navigation->delete();

            // redirect
            Session::flash('message', 'Successfully deleted the navigation');
            return Redirect::to('navigations');
        } else {
            // User is not logged in
            Session::flash('message', 'Please log in');
            return Redirect::to('/');
        }
    }
}
