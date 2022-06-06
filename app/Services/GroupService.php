<?php  namespace App\Services; use App\Models\Group; class GroupService {  private Group $group;public function __construct(Group $group)
    {
        $this->group = $group;
    }public function store(array $data){ $this->group->save();
 return $this->group;
}public function update(Group $group, array $data){ $group->save();
return $group;
}public function findAll()
    {
        return $this->group->all();
    }public function findOne(int $id)
    {
        return $this->group->find($id);
    }public function delete(int $id)
    {
        return $this->group->find($id)->delete();
    }  }