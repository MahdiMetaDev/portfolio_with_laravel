<?php

namespace App\Repositories\User;

use App\Interfaces\Image\ImageRepositoryInterface;
use App\Interfaces\User\UserRepositoryInterface;
use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    public function store(array $payload = []): Model
    {
        $user = parent::store($payload);

        $user->profile()->create();
    }

    public function update($eloquent, array $payload = []): Model
    {
        $user = parent::update($eloquent, $payload);

        $user->profile()->update([
            'user_id' => $user->id,
            'first_name' => $user->name,
            'last_name' => $user->family,
            'national_code' => '09234-nationalCode',
            'phone_number' => '09150000000',
            'date_of_birth' => now(),
        ]);
    }
}
