<?php

namespace App\Http\Resources;

use App\Models\Report;
use Illuminate\Http\Resources\Json\JsonResource;

class ReportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Report $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'localite' => $this->localite,
            "structure" => $this->structure,
            "text" => $this->text,
            "repere" => $this->repere,
            "created_at" => $this->created_at->format('d/m/Y H:i'),
            "nip" => $this->nip,
            "region" => $this->region,
            "province" => $this->province,
            "commune" => $this->commune,
            "agent_code" => $this->agent_code,
            'has_audio' => $this->audio !== null,
            'photos' => $this->getPhotos()
        ];
    }

    public function getPhotos(): array
    {
        $photos = [];

        if ($this['photoInput']) {
            $photos[] = url($this['photoInput']);
        }

        if ($this['photo']) {
            $photos[] = url($this['photo']);
        }

        return $photos;
    }
}
