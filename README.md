# mini-jwt

## Instalation
```
composer require derilkillms/mini-jwt
```

### Information

**About JWT : ([wikipedia](https://en.wikipedia.org/wiki/JSON_Web_Token))**
JSON Web Token (JWT, pronounced /dʒɒt/, same as the word "jot"[1]) is a proposed Internet standard for creating data with optional signature and/or optional encryption whose payload holds JSON that asserts some number of claims. The tokens are signed either using a private secret or a public/private key.

....

**This Repository Based : PHP**
```php

require_once(__DIR__ .'/vendor/autoload.php');

use Derilkillms\MiniJwt\Auth;

$auth = new Auth();

$header = [
	'alg' => 'HS256',
	'typ' => 'JWT'
];

$payloads =  [
	'user_id' => 1,
	'user_email' => "derilkillms@gmail.com",
	'exp' => time() + 3600 
];

$secret_key= 'mysecret';

	$auth->generateJWT($payloads,$header,$secret_key); // generate jwt

	$auth->verifyJWT($token, $secret_key); //verify JWT

```