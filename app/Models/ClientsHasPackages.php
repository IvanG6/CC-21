<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientsHasPackages extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [

    ];

    public function getIsFinishedAttribute(): ?bool
    {
        if ($this->finished_session_count && $this->session_count) {
            return $this->finished_session_count <= $this->session_count;
        }
        return null;
    }
}
