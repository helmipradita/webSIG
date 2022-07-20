<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AllProductsModel extends Model
{
    use HasFactory;
    use Sluggable;

    // protected $fillable = ['title', 'body', 'excerpt'];
    protected $guarded = ['id'];
    protected $with = ['category', 'author'];

    public function AllData()
    {
        return DB::table('products')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function InsertData($data)
    {
        return DB::table('products')
            ->insert($data);
    }
}
