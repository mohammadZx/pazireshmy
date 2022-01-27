<?php
namespace App\QueryFilters;

use App\QueryFilters\Filter;
use Carbon\Carbon;
class UserInsert extends Filter{
    
    public function filterName(){
        return 'user_insert';
    }

    public function applyFilter($builder){
        return $builder->whereIn('user_insert_id', explode(',', request()->get($this->filterName())));
    }
}