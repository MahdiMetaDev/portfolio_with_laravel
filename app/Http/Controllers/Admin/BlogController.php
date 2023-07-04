<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Http\Services\BlogService;
use App\Models\Blog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function __construct(private readonly BlogService $blogService)
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $blogs = $this->blogService->index();

        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request): RedirectResponse
    {
        $this->blogService->store($request->validated());

        session()->flash('success', 'Blog has Created Successfully!');

        return redirect(route('admin.blog.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('admin.blog.show', [
            'blog' => $blog->load(['user', 'image', 'comments'])
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BLog $blog)
    {
        return view('admin.blog.edit', ['blog' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, Blog $blog): RedirectResponse
    {
        $this->blogService->update($blog, $request->validated());

        session()->flash('success', 'Blog has Updated Successfully!');

        return redirect(route('admin.blog.show', $blog->id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog): RedirectResponse
    {
        $this->blogService->delete($blog);

        session()->flash('success', 'Blog has Deleted Successfully!');

        return redirect(route('admin.blog.index'));
    }
}
