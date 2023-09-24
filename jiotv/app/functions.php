<?php

// * Copyright 2021-2023 SnehTV, Inc.
// * Licensed under MIT (https://github.com/mitthu786/TS-JioTV/blob/main/LICENSE)
// * Created By : TechieSneh

function getCRED()
{
  $filePath = "assets/data/creds.jtv";
  $key_data = file_get_contents("assets/data/credskey.jtv");
  $cred_data = decrypt_data(file_get_contents($filePath), $key_data);
  return $cred_data;
}

// ENCRYPTION && DECRYPTION
function encrypt_data($data, $key)
{
  $key = intval($key);
  $encrypted = '';
  for ($i = 0; $i < strlen($data); $i++) {
    $encrypted .= chr(ord($data[$i]) + $key);
  }
  return base64_encode($encrypted);
}

function decrypt_data($e_data, $key)
{
  $key = intval($key);
  $encrypted = base64_decode($e_data);
  $decrypted = '';
  for ($i = 0; $i < strlen($encrypted); $i++) {
    $decrypted .= chr(ord($encrypted[$i]) - $key);
  }
  return $decrypted;
}
