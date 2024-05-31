<?php


namespace App\QueryFilters;


class Title extends Filter
{
    protected function applyFilter($builder)
    {
        return $builder->where($this->filterName(),  'LIKE', '%' . request($this->filterName()) . '%');
    }
}
