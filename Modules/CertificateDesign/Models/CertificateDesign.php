<?php

namespace Modules\CertificateDesign\Models;


use Laravel\Scout\Searchable;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CertificateDesign\Database\Factories\CertificateDesignFactory;

class CertificateDesign extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    protected $fillable = [
        'barcode_number'
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('certificate');
    }


}
