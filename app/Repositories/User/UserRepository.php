<?php

namespace App\Repositories\User;

use App\Interfaces\Image\ImageRepositoryInterface;
use App\Interfaces\User\UserRepositoryInterface;
use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
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

        $user->profile()->create($payload);

        return $user;
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

        return $user;
    }

    public function search(string $search): Collection
    {
        return $this->query()
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            })
            ->get();
    }
}
