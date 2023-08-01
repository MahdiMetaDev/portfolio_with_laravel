<?php

namespace App\Providers;

use App\Interfaces\Blog\BlogRepositoryInterface;
use App\Interfaces\City\CityRepositoryInterface;
use App\Interfaces\Country\CountryRepositoryInterface;
use App\Interfaces\Image\ImageRepositoryInterface;
use App\Interfaces\Product\ProductRepositoryInterface;
use App\Interfaces\Profile\ProfileRepositoryInterface;
use App\Interfaces\Role\RoleRepositoryInterface;
use App\Interfaces\User\UserRepositoryInterface;
use App\Repositories\Blog\BlogRepository;
use App\Repositories\City\CityRepository;
use App\Repositories\Country\CountryRepository;
use App\Repositories\Image\ImageRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Profile\ProfileRepository;
use App\Repositories\Role\RoleRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ImageRepositoryInterface::class, ImageRepository::class);
        $this->app->bind(BlogRepositoryInterface::class, BlogRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(CountryRepositoryInterface::class, CountryRepository::class);
        $this->app->bind(CityRepositoryInterface::class, CityRepository::class);
        $this->app->bind(ProfileRepositoryInterface::class, ProfileRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
