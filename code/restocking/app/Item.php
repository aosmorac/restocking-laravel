<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'amount', 'status'
    ];

    /**
     * A item belongs to a list
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rlist()
    {
        return $this->belongsTo(Rlist::class, 'list_id');
    }
}
