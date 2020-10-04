<?php

namespace LaravelScaffold\Traits;

trait HasTreeStructure
{
    protected $column = "parent_id";

    public function parent()
    {
        return $this->belongsTo(self::class, $this->column);
    }

    public function hasParent()
    {
        return $this->parent ? true : false;
    }

    public function children()
    {
        return $this->hasMany(self::class, $this->column);
    }

    public function hasChildren()
    {
        return $this->children->count() ? true : false;
    }
}
