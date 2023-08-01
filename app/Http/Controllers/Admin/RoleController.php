<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Http\Services\RoleService;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RoleController extends Controller
{
    public function __construct(private readonly RoleService $roleService)
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $roles = $this->roleService->index($request->all());

        return view('admin.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request): RedirectResponse
    {
        $this->roleService->store($request->validated());

        session()->flash('success', 'Role has created successfully!');

        return redirect(route('admin.role.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role): View
    {
        return view('admin.role.show', ['role' => $role]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role): View
    {
        return view('admin.role.edit', [
            'role' => $role->load(["users"])
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, Role $role): RedirectResponse
    {
        $this->roleService->update($role, $request->validated());

        session()->flash('success', 'Role has Updated Successfully!');

        return redirect(route('admin.role.show', $role->id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role): RedirectResponse
    {
        $this->roleService->delete($role);

        session()->flash('success', 'Role has Deleted Successfully!');

        return redirect(route('admin.role.index'));
    }
}
