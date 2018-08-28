<?php

namespace App\Http\Controllers;

use App\Rlist;
use App\Item;

use Illuminate\Http\Request;

class ItemsController extends Controller
{
    /**
     * Create a new ItemsController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Rlist $list
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Rlist $list)
    {
        $this->validate(request(), ['name' => 'required']);

        $list->addItem([
            'name' => request('name'),
            'description' => request('description')
        ]);

        return back()->with('flash', 'Your item has been added.');
    }

    /**
     * Update an existing item.
     *
     * @param Item $item
     */
    public function update(Item $item)
    {
        $this->validate(request(), ['amount' => 'required']);
        $this->validate(request(), ['status' => 'required']);
        $item->update([
            'amount'=>request(['amount'])['amount'],
            'status'=>request(['status'])['status']
        ]);
    }
}
