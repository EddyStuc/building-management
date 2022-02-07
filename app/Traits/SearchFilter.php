<?php

namespace App\Traits;

trait SearchFilter
{
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn ($query, $search) =>
            $query->where(fn($query) =>
                $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('subject', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%')
                ->orWhereHas('author', function($query) use ($search) {
                    return $query->where('name', 'LIKE', '%' . $search . '%');}
                    )
            )
        );
    }
}
