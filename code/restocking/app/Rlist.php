<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rlist extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body'
    ];

    /**
     * Get a string path for the thread.
     *
     * @return string
     */
    public function path()
    {
        return "/lists/{$this->id}";
    }

    /**
     * A list may have many items.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany(Item::class, 'list_id');
    }

    /**
     * Add a item to the list
     *
     * @param $item
     */
    public function addItem($item)
    {
        $this->items()->create($item);
    }

}
