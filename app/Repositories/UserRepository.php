<?php

namespace App\Repositories;

use App\Contracts\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function model()
    {
        return User::class;
    }

    public function index()
    {
        return $this->getModel()->filtered()->paginate();
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
        $data['password'] = bcrypt($data['password']);
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
}
