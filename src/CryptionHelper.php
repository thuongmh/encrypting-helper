<?php
namespace thuongmh\helperEncryption;

class CryptionHelper
{
    private $encryption;
    public function __construct(\thuongmh\helperEncryption\Encryption $encryption)
    {
        $this->encryption = $encryption;
    }

    public static function decryptionHelper ($key)
    {
        $valueKeyEncryption = \thuongmh\helperEncryption\Encryption::query()->where('key', $key)->first();
        if(empty($valueKeyEncryption)) {
            return null;
        }
        $valueKey = decrypt($valueKeyEncryption->value);
        return $valueKey;
    }
}
