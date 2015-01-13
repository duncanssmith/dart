<?php

class TextController extends BaseController {

    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layout.main';

    /**
     * @return mixed
     */
    public function index()
    {
        // If the user is logged in...
        if (Auth::check()) {
            $texts = Text::paginate(3);

            return View::make('texts.index')
                ->with('texts', $texts)
                ->with('entity', 'text')
                ->with('title', 'Texts');
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
        // If the user is logged in...
        // load the create form (app/views/texts/create.blade.php)
        if (Auth::check()) {
            return View::make('texts.create')
                ->with('entity', 'text')
                ->with('title', 'Text create');
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
        // If the user is logged in...
        if (Auth::check()) {
            // validate
            // read more on validation at http://laravel.com/docs/validation
            $rules = array(
                'title'      => 'required',
            );
            $validator = Validator::make(Input::all(), $rules);

            // process the login
            if ($validator->fails()) {
                return Redirect::to('texts/create')
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));
            } else {
                // store
                $text = new Text;
                $text->title  = Input::get('title');
                $text->author = Input::get('author');
                $text->year  = Input::get('year');
                $text->description  = Input::get('description');
                $text->content  = Input::get('content');
                $text->publication  = Input::get('publication');
                $text->publication_date  = Input::get('publication_date');

                $text->save();

                // redirect
                Session::flash('message', 'Successfully created text');
                return Redirect::to('texts');
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
        // If the user is logged in...
        if (Auth::check()) {
            // get the text
            $text = Text::find($id);

            // show the view and pass the text to it
            return View::make('texts.show')
                ->with([
                    'text' => $text,
                    'entity' => 'text',
                    'title' => 'Text show'
                    ]);
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
        // If the user is logged in...
        if (Auth::check()) {
            // get the text
            $text = Text::find($id);

            // show the edit form and pass the text
            return View::make('texts.edit')
                ->with('text', $text)
                ->with('entity', 'text')
                ->with('title', 'Text edit');
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
        // If the user is logged in...
        if (Auth::check()) {
            // validate
            // read more on validation at http://laravel.com/docs/validation
            $rules = array(
                'title'       => 'required'
            );
            $validator = Validator::make(Input::all(), $rules);

            // process the login
            if ($validator->fails()) {
                return Redirect::to('texts/' . $id . '/edit')
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));
            } else {
                // store
                $text = Text::find($id);
                $text->title  = Input::get('title');
                $text->author = Input::get('author');
                $text->year  = Input::get('year');
                $text->description  = Input::get('description');
                $text->content  = Input::get('content');
                $text->publication  = Input::get('publication');
                $text->publication_date  = Input::get('publication_date');
                $text->save();

                // redirect
                Session::flash('message', 'Successfully updated text');
                return Redirect::to('texts');
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
        // If the user is logged in...
        if (Auth::check()) {
            $text = Text::find($id);
            $text->delete();

            // redirect
            Session::flash('message', 'Successfully deleted the text');
            return Redirect::to('texts');
        } else {
            // User is not logged in
            Session::flash('message', 'Please log in');
            return Redirect::to('/');
        }
    }
}
