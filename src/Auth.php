<?php

/**
 * 
 */

namespace Derilkillms\MiniJwt;

class Auth
{
	
	public function generateJWT($payloads,$headers, $secret_key){
		$header = $headers;
		$header = json_encode($header);
		$header = base64_encode($header);

		$payload = $payloads;
		$payload = json_encode($payload);
		$payload = base64_encode($payload);

		$signature = hash_hmac('sha256', "$header.$payload", $secret_key, true);
		$signature = base64_encode($signature);

		$token = "$header.$payload.$signature";

		return $token;
	}

	public function verifyJWT($token, $secret_key){
		$token_parts = explode(".", $token);
		$header = $token_parts[0];
		$payload = $token_parts[1];
		$signature = $token_parts[2];

		$valid_signature = hash_hmac('sha256', "$header.$payload", $secret_key, true);
		$valid_signature = base64_encode($valid_signature);

		if ($signature === $valid_signature) {
			$payload = json_decode(base64_decode($payload));
			if ($payload->exp < time()) {
           		 return false; // token has expired
        	}
	        return $payload; // token is valid
	    } else {
	        return false; // token is invalid
	    }
	}

}