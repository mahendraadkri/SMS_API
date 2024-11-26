<?php

namespace Modules\BulkSMS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\BulkSMS\Database\Factories\BulkSMSFactory;

class BulkSMS extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): BulkSMSFactory
    // {
    //     // return BulkSMSFactory::new();
    // }
}
