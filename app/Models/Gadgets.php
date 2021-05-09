<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Gadgets extends Model
{
    use HasFactory, softDeletes;

    public function format() {
        return [
            'GADGET ID' => $this->id,
            'GADGET TYPE' => $this->type,
            'COMPANY NAME' => $this->company,
            'DELETED DATE' => $this->deleted_at,
            'CREATED DATE' => $this->created_at->diffForHumans()
        ];
    }
    protected $fillable = [
        'type',
        'company'
    ];
}
