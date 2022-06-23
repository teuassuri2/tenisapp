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
        //$this->user->remember_token = $data['remember_token'];
        $this->user->password = md5($data['password']);
        //$this->user->email_verified_at = $data['email_verified_at'];
        $this->user->client_id = $data['client_id'];
        $this->user->save();
        return $this->user;
    }

    public function update($id, array $data) {
        $user = $this->user->find($id);
        $user->name = $data['name'];
        $user->phone = $data['phone'];
        $user->email = $data['email'];
        #$user->remember_token = $data['remember_token'];
        $user->password = $data['password'];
        #$user->email_verified_at = $data['email_verified_at'];
        #$user->client_id = $data['client_id'];
        $user->save();
        return $user;
    }

    
    public function findAllByClient($client_id) {
        return $this->user->where('client_id', $client_id)->where('status', 1)->get();
    }
    
    public function findAll() {
        return $this->user->all();
    }

    public function findOne(int $id) {
        return $this->user->find($id);
    }

    public function delete(int $id) {
        $user =  $this->user->find($id);
        $user->status = 0;
        $user->save();
        return $user;
    }
    
     public function login($data) {
        $login =  $this->user->where('email', $data['email'])->where('password', md5($data['password']))->where('status', 1)->get()->last();
        
        if (empty($login)){
            return false;
        }
        
        return $login;
    }

}
