<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BombResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'type' => $this->getType(),
            'price' => $this->getPrice(),
            'location_country' => $this->getLocationCountry(),
            'manufacturing_country' => $this->getManufacturingCountry(),
            'stock' => $this->getStock(),
            'destruction_power' => $this->getDestructionPower(),
        ];
    }
}
