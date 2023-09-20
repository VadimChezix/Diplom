<?php
namespace App\Filters;
class StatementStatusFilter extends QueryFilter
{

public function status($status=null)
{
    return $this->builder->when($status, function($query) use($status){
    $query->where('status',$status);
});
}
};

