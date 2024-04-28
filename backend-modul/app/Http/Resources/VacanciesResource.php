<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VacanciesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $category = $this->job_category()->first();
        $avaible_position = $this->avaible_position()->get();

        return [
            "id" => $this->id,
            'category' => [
                'id' => $category->id,
                'job_category' => $category->job_category,
            ],
            'company' => $this->company,
            'address' => $this->address,
            'description' => $this->description,
            'avaible_position' => avaible_position_resource::collection($avaible_position),
        ];
    }
}
