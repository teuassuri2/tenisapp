<?php

namespace App\Services;

use App\Models\Group;

class GroupService {

    private Group $group;

    public function __construct(Group $group) {
        $this->group = $group;
    }

    public function store(array $data) {
        
        $this->group->name = $data['name'];
        $this->group->client_id = $data['client_id'];
        $this->group->save();
        return $this->group;
    }

    public function update(int $id, array $data) {
        
        $group = $this->group->find($id);
        $group->name = $data['name'];
        $group->save();
        return $group;
    }

    
    public function findAllByClient($client_id) {
        return $this->group->where('client_id', $client_id)->get();
    }
    
    public function findAll() {
        return $this->group->all();
    }

    public function findOne(int $id) {
        return $this->group->find($id);
    }

    public function delete(int $id) {
        $data = $this->group->find($id);
        if (!empty($data)) {
            return $data->delete();
        } else {
            return false;
        }
    }

}
