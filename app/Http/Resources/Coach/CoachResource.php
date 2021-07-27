<?php


namespace App\Http\Resources\Coach;

use Illuminate\Http\Resources\Json\JsonResource;

class CoachResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $data = [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'currency' => $this->currency,
            'timezone' => $this->timezone,
        ];

        if ($this->response_content) {
            $data = array_merge($data, [
                'response_content' => $this->response_content,
            ]);
        }

        return $data;
    }
}
