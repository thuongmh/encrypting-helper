### Installation

Run
   ```   
   composer require thuongmh/encrypting-helper --dev
   ```
   in console to install this module
   
Manual

import in config/app.php

\thuongmh\helperEncryption\HelperPackageServiceProvider::class,

use App\Http\Controllers

CryptionHelper::decryptionHelper($key)
