<?php

namespace App\Http\Resources\Client;

use App\Http\Resources\Common\CodeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = [
            'id' => $this->id,
            'email' => $this->email,
            'first_name' => $this->first_name,
            'last_name'  => $this->last_name,
            'timezone'   => $this->timezone,
            'currency'   => $this->currency,
        ];

        // _id
        $data = array_merge($data, [
            'timezone_id' => $this->timezone_id,
            'currency_id' => $this->currency_id,
        ]);

        if ($this->relationLoaded('codeable')) {
            $data = array_merge($data, [
                'codeable' =>  CodeResource::collection($this->codeable),
            ]);
        }

        if ($this->response_content) {
            $data = array_merge($data, [
                'response_content' => $this->response_content,
            ]);
        }

        return $data;
    }
}
