<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = ['name', 'parent_id', 'slug'];

	public function child()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
    
	public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

	public function parent()
	{
		return $this->belongsTo(Category::class);
	}

	public function scopeGetParent($query)
	{
		return $query->whereNull('parent_id');
	}

	public function product()
    {
        return $this->hasMany(Product::class);
    }
}
