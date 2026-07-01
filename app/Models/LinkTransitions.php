<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkTransitions extends Model
{
    /** @use HasFactory<\Database\Factories\LinkStatisticsFactory> */
    use HasFactory;
    protected $guarded = [];
}
