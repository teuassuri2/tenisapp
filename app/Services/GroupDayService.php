<?php

namespace App\Services;

use App\Models\GroupDay;

class GroupDayService {

    private GroupDay $groupDay;

    public function __construct(GroupDay $groupDay) {
        $this->groupDay = $groupDay;
    }

    public function store(array $data) {
        $this->groupDay->day = $data['day'];
        $this->groupDay->group_id = $data['group_id'];
        $this->groupDay->save();
        return $this->groupDay;
    }

    public function update(GroupDay $groupDay, array $data) {
        $groupDay->day = $data['day'];
        $groupDay->group_id = $data['group_id'];
        $groupDay->save();
        return $groupDay;
    }

    public function findAll() {
        return $this->groupDay->all();
    }

    public function findOne(int $id) {
        return $this->groupDay->find($id);
    }

    public function delete(int $id) {
        return $this->groupDay->find($id)->delete();
    }

}
