<?php

namespace App\Http\Services;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserService extends BaseService
{
    public function __construct(
        User                          $user,
        private readonly ImageService $imageService,
    )
    {
        parent::__construct($user);
    }

    public function show(User $user)
    {
        return UserResource::make($user);
    }

    public function store(array $payload = []): Model
    {
        $user = parent::store($payload);

        $this->imageService->createImage($payload['image'], $user);

        $user->profile()->create($payload);

        return $user;
    }

    public function update($model, array $payload = []): Model
    {
        $user = parent::update($model, $payload);

        $this->imageService->updateImage($payload['image'], $user);

        $user->profile()->update([
            'user_id' => $user->id,
            'first_name' => $user->name,
            'last_name' => $user->family,
            'national_code' => '09234-nationalCode',
            'phone_number' => '09150000000',
            'date_of_birth' => now(),
        ]);

        return $user;
    }
}
