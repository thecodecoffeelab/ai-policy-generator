<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormData extends Model
{
    protected $fillable = ['dname', 'dnumber', 'rnumber', 'approve', 'creationdate', 'ptype', 'profile'];
}