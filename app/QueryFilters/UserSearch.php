<?php
namespace App\QueryFilters;

use App\QueryFilters\Filter;

class UserSearch extends Filter{
    
    public function filterName(){
        return 'user-search';
    }

    public function applyFilter($builder){
        return $builder->whereHas('user', function($q){
            $q->where('name', 'LIKE', "%".request()->get($this->filterName())."%")
            ->orWhere('phone', 'LIKE', "%".request()->get($this->filterName())."%");
        });
    }
}