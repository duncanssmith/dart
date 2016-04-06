<?php

class CoverController extends BaseController {

    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layout.main';

    /**
     * List all the covers
     *
     * @return mixed
     */
    public function index()
    {
        // Check user is logged in
        if (Auth::check()) {

            $covers = Cover::paginate(6);

            return View::make('covers.index')
                ->with('covers', $covers)
                ->with('entity', 'cover')
                ->with('title', 'Covers');
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
        // Check user is logged in
        if (Auth::check()) {
            return View::make('covers.create')
                ->with('entity', 'cover')
                ->with('title', 'Cover create');
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
        // Check user is logged in
        if (Auth::check()) {
            // init vars
            $destinationPath = getEnv('PUBLIC_BASE_PATH').'uploads/covers/';
            $targetPath = getEnv('PUBLIC_BASE_PATH').'media/images/covers/';

            // validate
            // read more on validation at http://laravel.com/docs/validation
            $rules = array(
                'title'      => 'required'
            );
            $validator = Validator::make(Input::all(), $rules);

            // process the login
            if ($validator->fails()) {
                return Redirect::to('covers/create')
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));
            } else {
                // store
                $cover = new Cover;
                $cover->title        = Input::get('title');
                $cover->media        = Input::get('media');
                $cover->dimensions   = Input::get('dimensions');
                $cover->cover_date   = Input::get('cover_date');
                $cover->description  = Input::get('description');
                $cover->notes        = Input::get('notes');
                $cover->save();

                // create the image reference
                $cover->reference = sprintf("%04d", $cover->id);
                $cover->save();

                // upload the photo
                $this->file_upload_cover(Input::file('image'), $cover, $destinationPath, $targetPath);

                // redirect
                Session::flash('message', 'Successfully created cover');
                return Redirect::to('covers');
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
        // Check user is logged in
        if (Auth::check()) {
            // get the cover
            $cover = Cover::find($id);

            $groups = Group::all();

            // show the view and pass the cover to it
            return View::make('covers.show')
                ->with('cover', $cover)
                ->with('entity', 'cover')
                ->with('groups', $groups)
                ->with('title', 'Cover show');
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
        // Check user is logged in
        if (Auth::check()) {
            // get the cover
            $cover = Cover::find($id);

            // show the edit form and pass the cover
            return View::make('covers.edit')
                ->with('cover', $cover)
                ->with('entity', 'cover')
                ->with('title', 'Cover edit');
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
        // Check user is logged in
        if (Auth::check()) {
            // init vars
            $destinationPath = getEnv('PUBLIC_BASE_PATH').'uploads/covers/';
            $targetPath = getEnv('PUBLIC_BASE_PATH').'media/images/covers/';

            $rules = array(
                'title'       => 'required',
            );

            $validator = Validator::make(Input::all(), $rules);
            // process the login
            if ($validator->fails()) {
                return Redirect::to('covers/' . $id . '/edit')
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));
            } else {
                // store
                $cover = Cover::find($id);
                $cover->title = Input::get('title');
                $cover->reference = sprintf("%04d", $id);
                $cover->media = Input::get('media');
                $cover->dimensions = Input::get('dimensions');
                $cover->cover_date = Input::get('cover_date');
                $cover->description = Input::get('description');
                $cover->notes = Input::get('notes');
                $cover->save();

                // Check the file exists and is valid
                if ($photo = Input::file('image')) {
                    // Try to upload the photo
                    // Check we got an uploaded file
                    if ($photo->isValid())
                    {
                        $this->file_upload_cover($photo, $cover, $destinationPath, $targetPath);
                    } else {
                        //$cover->delete();
                        Session::flash('message', 'The photo file was invalid');
                        return Redirect::to('covers');
                    }
                } else {
                    //$cover->delete();
                    Session::flash('message', 'No photo file was uploaded');
                    return Redirect::to('covers');
                }

                // redirect
                Session::flash('message', 'Successfully updated cover');
                return Redirect::to('covers');
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
        // Check user is logged in
        if (Auth::check()) {
            $cover = Cover::find($id);
            $cover->delete();

            // redirect
            Session::flash('message', 'Successfully deleted the cover');
            return Redirect::to('covers');
        } else {
            // User is not logged in
            Session::flash('message', 'Please log in');
            return Redirect::to('/');
        }
    }

    /**
     * @param $photo
     * @param $cover
     * @param $destinationPath
     * @param $targetPath
     */
    public function file_upload_cover($photo, $cover, $destinationPath, $targetPath)
    {
        // init vars
        $maxWidth = 1200;
        $bgColor = '#333333';

        $fileTypes = array(
            IMAGETYPE_JPEG => 'jpg',
            IMAGETYPE_PNG => 'png',
            IMAGETYPE_GIF => 'gif',
        );
        // name the file as the cover reference
        $photo->move($destinationPath, $cover->reference);

        $target = $destinationPath.$cover->reference;

        list($width, $height, $type, $attr) = array_values(getimagesize($target));

        $extension = $fileTypes[$type];

        $canvas = Image::canvas($width, $height, $bgColor);
        $layer = Image::make($target);

        $photoWidth = $layer->width();

        if ($photoWidth > $maxWidth) {
            $layer->resize($maxWidth, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $canvas->resize($maxWidth, null, function($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        }

        // add the layer to the canvas, at the top
        $image = $canvas->insert($layer, 'center', $width, $height);

        $image->save($targetPath.$cover->reference.'.'.$extension);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function set_cover($id)
    {
        if (Auth::check()) {
            // store
            $cover = Cover::find($id);

            // show the edit form and pass the group
            return View::make('covers.set')
                ->with('cover', $cover)
                ->with('entity', 'cover')
                ->with('title', 'Set the cover');

            // redirect
            Session::flash('message', 'Successfully set cover');
            return Redirect::to('covers');
        } else {
            Session::flash('message', 'Please log in');
            return Redirect::to('/');
        }
    }

    /**
     *
     *
     */
    public function save_set_cover()
    {
        if (Auth::check()) {
            $path = getEnv('PUBLIC_BASE_PATH').'media/images/covers/';
            $currentCover = 'current.jpg';

            // Here we reset all the cover images to is_current = false
            $covers = Cover::all();

            foreach ($covers as $cover){
                $cover->is_current = false;
                $cover->save();
            }

            // Here we set the selected cover image to is_current = true
            $current = Cover::find($_POST['cover_id']);

            $current->is_current = true;
            $current->save();

            $fileName = $current->reference.'.jpg';

            copy($path.$fileName, $path.$currentCover);

            Session::flash('message', 'Cover image successfully set');
            return Redirect::to('covers');

        } else {

            Session::flash('message', 'Please log in');

            return Redirect::to('/');
        }
    }
}

