<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ScheduleStudentResource extends ResourceCollection {

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request) {
        return [
            'id' => $this->id,
            'date' => $this->date,
            'presence_absence' => $this->presence_absence,
            'status' => $this->status,
            'user_id' => $this->user_id,
            'group_student_id' => $this->group_student_id,
            'schedule_student_id' => $this->schedule_student_id,];
    }

}
