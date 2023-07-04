<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountryRequest;
use App\Http\Services\CountryService;
use App\Models\Country;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CountryController extends Controller
{
    public function __construct(private readonly CountryService $countryService)
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $countries = $this->countryService->index();

        return view('admin.Country.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.Country.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CountryRequest $request): RedirectResponse
    {
        $this->countryService->store($request->validated());

        session()->flash('success', 'Country has Created Successfully!');

        return redirect(route('admin.country.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country): View
    {
        return view('admin.Country.show', ['country' => $country]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Country $country): View
    {
        return view('admin.Country.edit', ['country', $country]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CountryRequest $request, Country $country): RedirectResponse
    {
        $this->countryService->update($country, $request->validated());

        session()->flash('success', 'Country has Updated Successfully!');

        return redirect(route('admin.country.show', $country->id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country): RedirectResponse
    {
        $this->countryService->delete($country);

        session()->flash('success', 'Country has Deleted Successfully!');

        return redirect(route('admin.country.index'));
    }
}
