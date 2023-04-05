<?php

namespace App\Models\Product\Collection;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $table = 'collections';

    // prevent to delete this collection_id
    const UNCATEGORIZED_COLLECTION_ID = 1;
}

