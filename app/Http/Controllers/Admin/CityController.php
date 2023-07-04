<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Http\Services\CityService;
use App\Models\City;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CityController extends Controller
{
    public function __construct(private readonly CityService $cityService)
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $cities = $this->cityService->index();

        return view('admin.city.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.city.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CityRequest $request): RedirectResponse
    {
        $this->cityService->store($request->validated());

        session()->flash('success', 'City has Created Successfully!');

        return redirect(route('admin.city.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city): View
    {
        return view('admin.city.show', compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city): View
    {
        return view('admin.city.edit', ['city' => $city]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CityRequest $request, City $city): RedirectResponse
    {
        $this->cityService->update($city, $request->validated());

        session()->flash('success', 'City has Updated Successfully!');

        return redirect(route('admin.city.show', $city->id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city): RedirectResponse
    {
        $this->cityService->delete($city);

        session()->flash('success', 'City has Deleted Successfully!');

        return redirect(route('admin.city.index'));
    }
}
