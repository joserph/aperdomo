<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Validity extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'years', 'price_total', 'price_partner', 'user_id', 'user_update'];
}
