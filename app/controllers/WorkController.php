<?php
//use Work\Repositories\Work\WorkRepository;

class WorkController extends BaseController {

    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layout.main';

    /**
     * List all the works
     *
     * @return mixed
     */
    public function index()
    {
        // Check user is logged in
        if (Auth::check()) {

            $works = Work::paginate(6);

            return View::make('works.index')
                ->with('works', $works)
                ->with('entity', 'work')
                ->with('title', 'Works');
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
            return View::make('works.create')
                ->with('entity', 'work')
                ->with('title', 'Work create');
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
            //$destination_path = '/Users/duncansmith/Sites/dart.local/public/dsscript/uploads';
            $destination_path = getEnv('PUBLIC_BASE_PATH').'uploads/';
            $target_path = getEnv('PUBLIC_BASE_PATH').'media/images/';
            $action = 'store';            

            // validate
            // read more on validation at http://laravel.com/docs/validation
            $rules = array(
                'title'      => 'required'
            );
            $validator = Validator::make(Input::all(), $rules);

            // process the login
            if ($validator->fails()) {
                return Redirect::to('works/create')
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));
            } else {
                // store
                $work = new Work;
                $work->title       = Input::get('title');
                $work->media       = Input::get('media');
                $work->dimensions  = Input::get('dimensions');
                $work->work_date   = Input::get('work_date');
                $work->description = Input::get('description');
                $work->notes       = Input::get('notes');
                $work->save();

                // create the image reference
                $work->reference = sprintf("%04d", $work->id);
                $work->save();

                // Try to upload the photo
                $this->file_upload_resize_cut(Input::file('image'), $work, $destination_path, $target_path, $action);                

                // redirect
                Session::flash('message', 'Successfully created work');
                return Redirect::to('works');
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
            // get the work
            $work = Work::find($id);

            $groups = Group::all();

            // show the view and pass the work to it
            return View::make('works.show')
                ->with('work', $work)
                ->with('entity', 'work')
                ->with('groups', $groups)
                ->with('title', 'Work show');
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
            // get the work
            $work = Work::find($id);

            // show the edit form and pass the work
            return View::make('works.edit')
                ->with('work', $work)
                ->with('entity', 'work')
                ->with('title', 'Work edit');
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
            //$destination_path = '/Users/duncansmith/Sites/dart.local/public/dsscript/uploads';
            $destination_path = getEnv('PUBLIC_BASE_PATH').'uploads/';
            $target_path = getEnv('PUBLIC_BASE_PATH').'media/images/';
            $action = 'update';
            $rules = array(
                'title'       => 'required',
            );

            $validator = Validator::make(Input::all(), $rules);
            // process the login
            if ($validator->fails()) {
                return Redirect::to('works/' . $id . '/edit')
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));
            } else {
                // store
                $work = Work::find($id);
                $work->title = Input::get('title');
                $work->reference = sprintf("%04d", $id);
                $work->media = Input::get('media');
                $work->dimensions = Input::get('dimensions');
                $work->work_date = Input::get('work_date');
                $work->description = Input::get('description');
                $work->notes = Input::get('notes');
                $work->save();


                // Check the file exists and is valid
                if ($photo = Input::file('image')) {
                    // Try to upload the photo
                    // Check we got an uploaded file
                    if ($photo->isValid())
                    {
                        $this->file_upload_resize_cut($photo, $work, $destination_path, $target_path, $action);                
                    } else {
                        //$work->delete();
                        Session::flash('message', 'The photo file was invalid');
                        return Redirect::to('works');
                    }
                } else {
                    //$work->delete();
                    Session::flash('message', 'No photo file was uploaded');
                    return Redirect::to('works');
                }

                // redirect
                Session::flash('message', 'Successfully updated work');
                return Redirect::to('works');
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
            $work = Work::find($id);
            $work->delete();

            // redirect
            Session::flash('message', 'Successfully deleted the work');
            return Redirect::to('works');
        } else {
            // User is not logged in
            Session::flash('message', 'Please log in');
            return Redirect::to('/');
        }
    }

    /**
     *
     */
    public function file_upload_resize_cut($photo, $work, $destination_path, $target_path, $action)
    {
        // name the ref field after the work id
        $ref = sprintf("%04d", $work->id);

        $photo->move($destination_path, $work->id);

        $target = $destination_path.$work->id;

        $canvas = Image::canvas(640, 640, '#ffffff');
        $layer = Image::make($target);

        $photo_height = $layer->height();
        $photo_width = $layer->width();

        if ($photo_height > $photo_width) {
            //portrait, vertical
            $layer->resize(null, 640, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        } else {
            //landscape, horizontal
            $layer->resize(640, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        }
        // add the layer to the canvas, centered
        $image = $canvas->insert($layer, 'center', 320, 320);

        $image->save($target_path.'640/'.$ref.'.jpg');
        $image->resize(320, 320);
        $image->save($target_path.'320/'.$ref.'.jpg');
        $image->resize(160, 160);
        $image->save($target_path.'160/'.$ref.'.jpg');
        $image->resize(120, 120);
        $image->save($target_path.'120/'.$ref.'.jpg');
        $image->resize(64, 64);
        $image->save($target_path.'64/'.$ref.'.jpg');
    }
}
