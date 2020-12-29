<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name', 'description'];


    public function search($filters = null)
    {
        $result = $this->searchQuery($filters);
        return $result;
    }


    private function searchQuery($filters = null)
    {
        $results = $this->where('name', 'LIKE', "%{$filters}%")
                            ->orWhere('description', 'LIKE', "%{$filters}%")
                            ->paginate();
        return $results;
    }
}
