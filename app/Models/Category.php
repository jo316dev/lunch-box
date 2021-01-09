<?php

namespace App\Models;

use App\Tenant\Observers\TenantObserver;
use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use TenantTrait;

    protected $fillable = ['name', 'url', 'tenant_id', 'description'];

    public function search($filter = null)
    {
        $results = $this
                ->where('name', 'LIKE', "%{$filter}%")
                ->orWhere('description', 'LIKE', "%{$filter}%")
                ->paginate();
        return $results;
    }

}
