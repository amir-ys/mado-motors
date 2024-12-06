<?php

namespace App\Repositories;

use App\Contracts\Repositories\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function model()
    {
        return User::class;
    }

    public function changeRole(int $userId)
    {
        $user = $this->find($userId);
        $user->role = $user->role == "user" ? "admin" : "user";
        $user->save();
        return $user;
    }

    public function store(array $data): Model|Builder
    {
        if (array_key_exists('password', $data)) {
            $data['password'] = bcrypt($data['password']);
        } else {
            $data['password'] = bcrypt($data['mobile'] . $data['national_code']);
        }
        return $this->create($data);
    }

    public function update(array $attributes, $id)
    {
        $user = $this->find($id);
        $attributes['password'] = bcrypt($attributes["password"]);
        $user->fill($attributes);
        $user->save();
        return $user;
    }


    public function updateProfile(array $attributes, $id)
    {
        $user = $this->find($id);
        $user->fill($attributes);
        $user->save();

        $user->load(['mainAddress']);

        return $user;
    }

    public function findByMobile($mobile)
    {
        return $this->whereMobile($mobile)->firstOrFail();
    }
}
