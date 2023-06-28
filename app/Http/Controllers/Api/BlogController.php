<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\BlogRequest;
use App\Http\Resources\BlogResource;
use App\Http\Services\BlogService;
use App\Models\Blog;
use Illuminate\Support\Facades\Gate;

class BlogController extends ApiBaseController
{
    public function __construct(private readonly BlogService $blogService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = $this->blogService->index();
        return $this->sendResponse(
            BlogResource::collection($blogs),
            'Blogs Retrieved Successfully!'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        $blog = $this->blogService->store($request->validated());

        return $this->sendResponse(
            BlogResource::make($blog),
            'Blog Created Successfully',
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $blog = Blog::find($id);

        if (is_null($blog)) {
            return $this->sendError('Blog Not Found!!');
        }

        $data = $this->blogService->show($blog);

        return $this->sendResponse($data, 'Blog Retrieved Successfully!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, Blog $blog)
    {
//        if (! Gate::allows('update-blog', $blog)) {
//            abort(403);
//        }

        $this->blogService->update($blog, $request->validated());

        return $this->sendResponse(
            BlogResource::make($blog),
            'Blog Updated Successfully!'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $this->blogService->delete($blog);

        return $this->sendResponse(message: 'Blog Deleted Successfully!');
    }
}
