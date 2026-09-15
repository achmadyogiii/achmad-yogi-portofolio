<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        return view('portfolio');
    }

    public function store(StoreProjectRequest $request): RedirectResponse
    {
        $this->projects->create([
            ...$request->validated(),
            'user_id' => $request->user()->id,
        ]);

        return to_route('admin.projects.create')->with('status', 'Project berhasil dibuat.');
    }
}
