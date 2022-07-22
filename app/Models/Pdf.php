<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Pdf extends Model
{
    protected $fillable = ['title', 'path'];

    public static function boot(){
        parent::boot();

        static::deleting(function (Pdf $pdf) {
            Storage::disk('public')->delete($pdf->path);
        });
}

    public function path(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Storage::url($value)
        );
    }
}
