<?php

namespace App\Http\Controllers;

use App\Rlist;

use Illuminate\Http\Request;

class RlistController extends Controller
{
    /**
     * ListsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param  Channel      $channel
     * @param ThreadFilters $filters
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = Rlist::latest()->get();

        if (request()->wantsJson()) {
            return $lists;
        }

        //print_r($lists->toJson());

        return view('rlists.index', compact('lists'));
    }

    /**
     * Save a new list
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        $list = Rlist::create([
            'title' => request('title'),
            'body' => request('body')
        ]);

        return redirect('/lists');
    }


    public function show (Rlist $list)
    {
        return view('rlists.show', [
           'list' => $list,
           'items' => $list->items()->get()
        ]);
    }



}
