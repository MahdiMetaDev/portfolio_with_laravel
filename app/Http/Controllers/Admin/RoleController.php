<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Http\Services\RoleService;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct(private readonly RoleService $roleService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::orderByDesc('id')->get();

        return view('admin.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $this->roleService->store($request->validated());

        session()->flash('success', 'Role has created successfully!');

        return redirect(route('admin.role.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view('admin.role.show', ['role' => $role]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('admin.role.edit', [
            'role' => $role->load(["users"])
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, Role $role)
    {
        $this->roleService->update($role, $request->validated());

        return redirect(route('admin.role.show', $role->id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $this->roleService->delete($role);

        return back();
    }
}
