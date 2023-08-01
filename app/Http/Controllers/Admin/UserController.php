<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Services\UserService;
use App\Interfaces\User\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct(private readonly UserService $userService,)
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $users = $this->userService->index($request->all());

        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request): RedirectResponse
    {
        $this->userService->store($request->validated());

        session()->flash('success', 'User has created successfully!');

        return redirect(route('admin.user.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): View
    {
        return view('admin.user.show', [
            'user' => $user->load(['profile', 'image', 'comments', 'blogs'])
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        return view('admin.user.edit', [
            'user' => $user->load(['image'])
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user): RedirectResponse
    {
        $this->userService->update($user, $request->validated());

        session()->flash(
            'success', 'User has updated successfully!'
        );

        return redirect(route('admin.user.show', $user->id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        $this->userService->delete($user);

        session()->flash('success', 'User has deleted successfully!');

        return redirect(route('admin.user.index'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $users = $this->userService->search($search);

        return view('admin.user.index', compact('users'));
    }
}
