<?php

class GroupController extends BaseController {

    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layout.main';

    /**
     * @param $id
     * @return mixed
     */
    public function assign_text($id)
    {
        if (Auth::check()) {
            // store
            $text = Text::find($id);

            $links = $text->groups;

            $arr = array();
            foreach ($text->groups as $link){
                $arr[] = $link->pivot->group_id;
            }

            $groups = Group::all();

            // show the edit form and pass the group
            return View::make('texts.assign')
                ->with('text', $text)
                ->with('links', $links)
                ->with('arr', $arr)
                ->with('entity', 'text')
                ->with('groups', $groups)
                ->with('title', 'Assign the text to a group or groups');

            // redirect
            Session::flash('message', 'Successfully assigned text to group(s)');
            return Redirect::to('texts');
        } else {
            Session::flash('message', 'Please log in');
            return Redirect::to('/');
        }
    }

    /**
     *
     *
     */
    public function save_assigned_text()
    {
        if (Auth::check()) {

            $text = Text::find($_POST['text_id']);

            // only sync the pivot table data if there is any
            if (isset($_POST['groups_data'])) {
                $text->groups()->sync(array_values($_POST['groups_data']));
            } else {
                $text->groups()->detach();
            }

            Session::flash('message', 'Successfully assigned text to group(s)');
            return Redirect::to('texts');

        } else {

            Session::flash('message', 'Please log in');

            return Redirect::to('/');
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function assign_work($id)
    {
        if (Auth::check()) {
            // store
            $work = Work::find($id);

            $links = $work->groups;

            $arr = array();
            foreach ($work->groups as $link){
                $arr[] = $link->pivot->group_id;
            }

            $groups = Group::all();

            // show the edit form and pass the group
            return View::make('works.assign')
                ->with('work', $work)
                ->with('entity', 'work')
                ->with('links', $links)
                ->with('arr', $arr)
                ->with('groups', $groups)
                ->with('title', 'Assign the work to a group or groups');

            // redirect
            Session::flash('message', 'Successfully assigned work to group(s)');
            return Redirect::to('works');
        } else {
            Session::flash('message', 'Please log in');
            return Redirect::to('/');
        }
    }

    /**
     *
     *
     */
    public function save_assigned_work()
    {
        if (Auth::check()) {

            $work = Work::find($_POST['work_id']);

            // only sync the pivot table data if there is any
            if (isset($_POST['groups_data'])) {
                $work->groups()->sync(array_values($_POST['groups_data']));
            } else {
                $work->groups()->detach();
            }

            Session::flash('message', 'Successfully assigned work to group(s)');
            return Redirect::to('works');

        } else {

            Session::flash('message', 'Please log in');

            return Redirect::to('/');
        }
    }

    /**
     *
     *
     */
    public function sort_page_works($id)
    {
        if (Auth::check()) {
            $group = Group::with('Works')->where('id', '=', $id)->first();

            // Couldn't figure out how to use Eloquent to get the works ordered by the pivot table order field
            $works = DB::table('works')
            ->join('group_work', 'works.id', '=', 'group_work.work_id')
            ->join('groups', 'groups.id', '=', 'group_work.group_id')
            ->select('group_work.order', 'works.id', 'works.title', 'works.media', 'works.dimensions', 'works.reference', 'works.work_date', 'works.description', 'works.notes')
            ->where('groups.id', '=', $group->id)
            ->orderBy('group_work.order')
            ->get();

            if (sizeof($works) < 1) {
                Session::flash('message', 'There are currently no works on the '.$group->name.' page');
                return Redirect::to('pages');
            }
            if (sizeof($works) == 1) {
                Session::flash('message', 'There is currently only one work on the '.$group->name.' page');
                return Redirect::to('pages');
            }

            return View::make('works.sort')
                ->with('group', $group)
                ->with('works', $works)
                ->with('entity', 'page works')
                ->with('title', 'Sort page works');

        } else {

            Session::flash('message', 'Please log in');

            return Redirect::to('/');
        }
    }

    /**
     *
     *
     */
    public function save_page_works_order()
    {

        if (Request::ajax()){

            $uuid = Input::get('uuid');
            $id = Input::get('id');
            $group_id = Input::get('group_id');

            $i = 1;

            foreach($id as $value) {
                $groupwork = GroupWork::where('work_id', $value)->where('group_id', $group_id)->first();

                $groupwork->order = $i;
                $groupwork->save();

                $i++;
            }
        }

        return Redirect::to('/');
    }

    /**
     *
     *
     */
    public function sort_page_texts($id)
    {
        if (Auth::check()) {
            $group = Group::where('id', '=', $id)->first();

            // paginate
            $groups = Group::orderBy('id', 'asc')->paginate(9);
            $texts = $group->texts;

            if (sizeof($texts) < 1) {
                Session::flash('message', 'There are currently no texts on the '.$group->name.' page');
                return Redirect::to('pages');
            }
            if (sizeof($texts) == 1) {
                Session::flash('message', 'There is currently only one text on the '.$group->name.' page');
                return Redirect::to('pages');
            }

            return View::make('texts.sort')
                ->with('group', $group)
                ->with('texts', $texts)
                ->with('groups', $groups)
                ->with('entity', 'page texts')
                ->with('title', 'Sort page texts');

        } else {
            Session::flash('message', 'Please log in');
            return Redirect::to('/');
        }
    }

    /**
     *
     *
     */
    public function save_page_texts_order()
    {
        if (Request::ajax()){

            $uuid = Input::get('uuid');
            $id = Input::get('id');

            $i = 1;

            foreach($id as $val) {
                $grouptext = GroupText::where('text_id', $val)->first();
                $grouptext->order = $i;
                $grouptext->save();

                $i++;
            }
        }

        return Redirect::to('/');
    }

    /**
     * @return mixed
     */
    public function index()
    {
        // Check the user is logged in...
        if (Auth::check()) {
            // paginate
            $groups = Group::orderBy('id', 'asc')->paginate(9);

            return View::make('groups.index')
                ->with('groups', $groups)
                ->with('entity', 'page')
                ->with('title', 'Pages');

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
        // load the create form (app/views/groups/create.blade.php)
        if (Auth::check()) {

            return View::make('groups.create')
                ->with('entity', 'page')
                ->with('title', 'Page create');
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
                return Redirect::to('pages/create')
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));
            } else {
                // store
                $group = new Group;
                $group->name       = Input::get('name');
                $group->order      = Input::get('order');
                $group->columns    = Input::get('columns');
                $group->image_size = Input::get('image_size');
                $group->layout     = Input::get('layout');
                $group->display    = (Input::get('display') == 'on') ? 1 : 0;
                $group->save();

                // redirect
                Session::flash('message', 'Successfully created page');

                return Redirect::to('pages');
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
            // get the group
            $group = Group::find($id);

            // show the view and pass the group to it
            return View::make('groups.show')
                ->with('group', $group)
                ->with('entity', 'page')
                ->with('title', 'Page show');
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
            // get the group
            $group = Group::find($id);

            // show the edit form and pass the group
            return View::make('groups.edit')
                ->with('group', $group)
                ->with('entity', 'page')
                ->with('title', 'Page edit');
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
                return Redirect::to('pages/' . $id . '/edit')
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));
            } else {
                // store
                $group = Group::find($id);
                $group->name        = Input::get('name');
                $group->order       = Input::get('order');
                $group->columns     = Input::get('columns');
                $group->image_size  = Input::get('image_size');
                $group->layout      = Input::get('layout');
                $group->display     = (Input::get('display') == 'on') ? 1 : 0;
                $group->save();

                // redirect
                Session::flash('message', 'Successfully updated page');
                return Redirect::to('pages');
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
            $group = Group::find($id);
            $group->delete();

            // redirect
            Session::flash('message', 'Successfully deleted the page');
            return Redirect::to('pages');
        } else {
            // User is not logged in
            Session::flash('message', 'Please log in');
            return Redirect::to('/');
        }
    }
}
