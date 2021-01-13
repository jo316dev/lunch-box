<?php

namespace App\Models;

use App\Models\Category;
use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use TenantTrait;

    protected $fillable = ['name', 'price', 'description', 'url', 'image'];



    public function categories()
    {
       return $this->belongsToMany(Category::class);
    }

    public function categoryAvailable()
    {
        // $categories = Permission::whereNotIn('id', function($query){
        //     $query->select('permission_profile.permission_id');
        //     $query->from('permission_profile');
        //     $query->whereRaw("permission_profile.profile_id={$this->id}");

        // })->get();

        $categories = Category::whereNotIn('id', function($query){

            $query->select('category_product.category_id');
            $query->from('category_product');
            $query->whereRaw("category_product.product_id={$this->id}");

        })->get();


        return $categories;
    }
}
