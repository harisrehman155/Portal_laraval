<?php


namespace App\QueryFilters;


class Status extends Filter
{
    protected function applyFilter($builder)
    {
        return $builder->where($this->filterName(),  request($this->filterName()));
    }
}
