<?php
namespace App\QueryFilters;

use App\QueryFilters\Filter;
use Carbon\Carbon;
class OptionType extends Filter{
    
    public function filterName(){
        return 'option-types';
    }

    public function applyFilter($builder){
        return $builder->whereIn('option_key',explode(',', request()->get($this->filterName())));
    }
}