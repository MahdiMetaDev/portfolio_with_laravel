<?php

namespace App\Repositories\Profile;

use App\Interfaces\Profile\ProfileRepositoryInterface;
use App\Models\Profile;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class ProfileRepository extends BaseRepository implements ProfileRepositoryInterface
{
    public function __construct(Profile $profile)
    {
        parent::__construct($profile);
    }
}
