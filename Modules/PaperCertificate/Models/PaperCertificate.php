<?php

namespace Modules\PaperCertificate\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\PaperCertificate\Database\Factories\PaperCertificateFactory;

class PaperCertificate extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'communication_method',
        'link',
    ];

    // protected static function newFactory(): PaperCertificateFactory
    // {
    //     //return PaperCertificateFactory::new();
    // }
}
