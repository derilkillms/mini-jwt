<?php

// Active assert and make it quiet
assert_options(ASSERT_ACTIVE, 1);
assert_options(ASSERT_QUIET_EVAL, 1);

require 'Auth_test.php';


function testGenerate($value='')
{
	$auth = new Auth_test();
	$header = [
		'alg' => 'HS256',
		'typ' => 'JWT'
	];

	$payloads =  [
		'user_id' => 1,
		'user_email' => "derilkillms@gmail.com"
		// 'exp' => time() + 3600 
	];

	$secret_key= 'mysecret';

	assert($auth->generateJWT($payloads,$header,$secret_key) === "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyX2lkIjoxLCJ1c2VyX2VtYWlsIjoiZGVyaWxraWxsbXNAZ21haWwuY29tIn0=.Y90K3CQ3E7amgXQOJ8MGjCjUk3tpG2zvi4pnBNJug5E=");
}

testGenerate();