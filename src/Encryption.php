<?php

namespace thuongmh\helperEncryption;

use Illuminate\Database\Eloquent\Model;

class Encryption extends Model
{
    protected $table = 'key_encryption';

    protected $fillable = [
        'key',
        'value'
    ];
}
