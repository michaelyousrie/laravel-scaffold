<?php
namespace LaravelScaffold\Traits;

use Carbon\Carbon;
use Illuminate\Http\Request;

trait FilterableByParameters
{
    protected $filterMapper = [];
    protected $filterEquals = [];
    protected $filterLike = [];
    protected $filterDates = [];
    protected $query = null;
    protected $request = null;
    protected $paginate = true;
    protected $perPage = 50;

    public function scopeFilter($query, Request $request, array $filterEquals = [], array $filterLike = [], array $filterDates = [], $paginate = true, $perPage = 50)
    {
        $this->query = $query;
        $this->request = $request;
        $this->filterEquals = $filterEquals;
        $this->filterLike = $filterLike;
        $this->filterDates = $filterDates;
        $this->paginate = $paginate;
        $this->perPage = $perPage;
        
        $this->filterByEquals()
            ->filterByLike()
            ->filterByDates();

        return $this->query;
    }

    protected function filterByEquals()
    {
        foreach($this->filterEquals as $columnName => $value) {
            if (is_numeric($columnName)) {
                $columnName = $value;
            }

            if ($this->request->has($value) and !empty($this->request->$value)) {
                $this->query->where($columnName, $this->request->$value);
            }

            return $this;
        }
    }

    protected function filterByLike()
    {
        foreach($this->filterLike as $columnName => $value) {
            if (is_numeric($columnName)) {
                $columnName = $value;
            }

            if ($this->request->has($value) and !empty($this->request->$value)) {
                $this->query->where($columnName, "LIKE", "%$this->request->$value%");
            }
        }

        return $this;
    }

    protected function filterByDates()
    {
        foreach($this->filterDates as $type => $value) {
            if (is_numeric($type)) {
                $type = $value;
            }

            $value = Carbon::parse($value);

            if (strtolower($type) == 'from') {
                $operator = '>=';
            } else if (strtolower($type == 'to')) {
                $operator = '<=';
            }

            $this->query->whereDate('created_at', $operator, $value->toDateString());
        }

        return $this;
    }
}
