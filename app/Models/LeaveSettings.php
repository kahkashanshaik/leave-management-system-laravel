<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveSettings extends Model
{
    use HasFactory;
    protected $fillable = ['total_leaves', 'total_festive_leaves'];
}
