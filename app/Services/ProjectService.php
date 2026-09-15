<?php

namespace App\Services;

use App\Models\Project;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ProjectService
{
    public function published(int $perPage = 6): LengthAwarePaginator
    {
        return Project::query()
            ->where('is_published', true)
            ->latest('year')
            ->latest('id')
            ->paginate($perPage)
            ->withQueryString();
    }

    public function create(array $attributes): Project
    {
        return Project::query()->create($attributes);
    }
}
