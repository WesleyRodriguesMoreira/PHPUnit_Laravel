<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'idUser' => $this->id,
            'firstNameUser' => $this->firstName,
            'lastNameUser' => $this->lastName,
            'fullNameUser' => $this->firstName .' '.$this->lastName,
            'emailUser' => $this->email,
            'created_atUser' => \Carbon\Carbon::parse($this->created_at)->tz('America/Sao_Paulo')->format('d/m/Y H:i:s'),
            'updated_atUser' => \Carbon\Carbon::parse($this->updated_at)->tz('America/Sao_Paulo')->format('d/m/Y H:i:s'),
        ];
    }
}
