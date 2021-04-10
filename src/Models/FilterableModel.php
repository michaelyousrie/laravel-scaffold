<?php
namespace LaravelScaffold\Models;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

abstract class FilterableModel extends Model
{
    protected $filterEquals = [];
    protected $filterLike = [];
    protected $filterDates = [];
    protected $query = null;
    protected $request = null;

    public function scopeFilter($query, Request $request, array $filterEquals = [], array $filterLike = [], array $filterDates = [])
    {
        $this->query = $query;
        $this->request = $request;

        if (!empty($filterEquals)) {
            $this->filterEquals = $filterEquals;
        }

        if (!empty($filterLike)) {
            $this->filterLike = $filterLike;
        }

        if (!empty($filterDates)) {
            $this->filterDates = $filterDates;
        }

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
        }

        return $this;
    }

    protected function filterByLike()
    {
        foreach($this->filterLike as $columnName => $value) {
            if (is_numeric($columnName)) {
                $columnName = $value;
            }

            if ($this->request->has($value) and !empty($this->request->$value)) {
                $this->query->where($columnName, "LIKE", "%{$this->request->$value}%");
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
