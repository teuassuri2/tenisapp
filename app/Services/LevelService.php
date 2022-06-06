<?php  namespace App\Services; use App\Models\Level; class LevelService {  private Level $level;public function __construct(Level $level)
    {
        $this->level = $level;
    }public function store(array $data){ $this->level->name = $data['name'];
 $this->level->save();
 return $this->level;
}public function update(Level $level, array $data){ $level->name = $data['name'];
 $level->save();
return $level;
}public function findAll()
    {
        return $this->level->all();
    }public function findOne(int $id)
    {
        return $this->level->find($id);
    }public function delete(int $id)
    {
        return $this->level->find($id)->delete();
    }  }