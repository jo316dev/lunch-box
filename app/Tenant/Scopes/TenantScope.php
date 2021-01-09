<?php



namespace App\Tenant\Scopes;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use App\Tenant\ManagerTenant;


class TenantScope implements Scope
{
    

    public function apply(Builder $builder, Model $model)
    {
        $tenantId = app(ManagerTenant::class);
        $builder->where('tenant_id', $tenantId->getTenantIdentify());
        
    }
}