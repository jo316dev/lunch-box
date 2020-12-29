<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPlan extends Model
{
    protected $fillable = ['name'];

    /**
     * Devolve o plano em que o detalhe está cadastrado. 
     */

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }


    public function search($filter = null)
    {
        $result = $this->where('name', 'LIKE', "%{$filter}%")->paginate();

        return $result;
        
    }
}
