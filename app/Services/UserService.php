<?php

namespace App\Services;

use App\Models\User;

class UserService {

    private User $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function store(array $data) {
        $this->user->name = $data['name'];
        $this->user->phone = $data['phone'];
        $this->user->email = $data['email'];
        $this->user->remember_token = $data['remember_token'];
        $this->user->password = $data['password'];
        $this->user->email_verified_at = $data['email_verified_at'];
        $this->user->client_id = $data['client_id'];
        $this->user->save();
        return $this->user;
    }

    public function update(User $user, array $data) {
        $user->name = $data['name'];
        $user->phone = $data['phone'];
        $user->email = $data['email'];
        $user->remember_token = $data['remember_token'];
        $user->password = $data['password'];
        $user->email_verified_at = $data['email_verified_at'];
        $user->client_id = $data['client_id'];
        $user->save();
        return $user;
    }

    public function findAll() {
        return $this->user->all();
    }

    public function findOne(int $id) {
        return $this->user->find($id);
    }

    public function delete(int $id) {
        return $this->user->find($id)->delete();
    }

}
