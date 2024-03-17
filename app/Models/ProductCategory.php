<?php

namespace App\Models;

use App\Traits\Models\HasStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCategory extends Model
{
    use HasFactory, SoftDeletes, HasStatus;

    protected $table = 'product_categories';

    protected $fillable = [
        'name', 'description', 'parent_id', 'status',
    ];
}
