<?php

class UserController extends BaseController {

    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layout.main';

    public function index()
    {
        if (Auth::check()) {

            $users = User::paginate(5);

            return View::make('users.index')
                ->with('users', $users)
                ->with('title', 'Users');
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
            // get the user
            $user = User::find($id);

            // show the view and pass the user to it
            return View::make('users.show')
                ->with('user', $user)
                ->with('title', 'User show');
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
            // get the user
            $user = User::find($id);

            // show the edit form and pass the user
            return View::make('users.edit')
                ->with('user', $user)
                ->with('title', 'User edit');
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
                'username' => 'required',
                'email' => 'required',
            );
            $validator = Validator::make(Input::all(), $rules);

            // process the login
            if ($validator->fails()) {
                return Redirect::to('users/' . $id . '/edit')
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));
            } else {
                // store
                $user = User::find($id);
                $user->username       = Input::get('username');
                $user->email      = Input::get('email');
                $user->save();

                // redirect
                Session::flash('message', 'Successfully updated user');
                return Redirect::to('users');
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
            // Check the Auth user_id is not the same as the $id as this would mean user could delete their own user record!!!
            $currently_logged_in_user = Auth::user();

            $user = User::find($id);

            if ($user->id == $currently_logged_in_user->id) {
                Session::flash('message', 'You can\'t delete your own user account. Sorry.');
                return Redirect::to('users');
            } else {
                //$user->delete();
            }

            // redirect
            Session::flash('message', 'Successfully deleted the user');
            return Redirect::to('users');
        } else {
            // User is not logged in
            Session::flash('message', 'Please log in');
            return Redirect::to('/');
        }
    }
}
