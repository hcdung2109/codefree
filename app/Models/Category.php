<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Set default attributes
     * @var array
     */
    protected $attributes =  [
        'parent_id' => 0
    ];

    protected $fillable = [
        'name', 'slug', 'parent_id', 'is_active'
    ];

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        // before create
        static::creating(function ($category) {
            $category->updateSlug();
        });

        // before update
        static::updating(function ($category) {
            $category->updateSlug();
        });
    }


    public function updateSlug()
    {
        $this->slug = str_slug($this->name,"-");
    }

    /**
     * Define Relationship one-to-many
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles()
    {
        return $this->hasMany('App\Models\Article');
    }

    public function children()
    {
        return $this->hasMany("App\Models\Category","parent_id");
    }

    public function parent()
    {
        return $this->belongsTo("App\Models\Category","parent_id");
    }

    public static function getListCategory()
    {
        return self::get();
    }

    public static function getCategoryAndCountPosts()
    {
        return self::withCount('articles')->get();
    }

    public function getListCategoryPaginate()
    {
        return self::with('parent')->latest()->paginate();
    }

    public static function getCategoryBySlug($slug)
    {
        return self::where(['slug' => $slug])->first();
    }

}
