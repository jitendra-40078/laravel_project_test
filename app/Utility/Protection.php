<?php

namespace App\Utility;


class Protection
{
  public static function encryptData($dataToEncrypt, $key)
  {
    $customKey = hash('sha256', $key);

    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encryptedData = openssl_encrypt(json_encode($dataToEncrypt), 'aes-256-cbc', $customKey, 0, $iv);
    $encryptedData = base64_encode($encryptedData . '::' . $iv);

    return $encryptedData;
  }

  public static function decryptData($dataToDecrypt, $key)
  {
    $customKey = hash('sha256', $key);

    list($dataToDecrypt, $iv) = explode('::', base64_decode($dataToDecrypt), 2);
    $decryptedData = openssl_decrypt($dataToDecrypt, 'aes-256-cbc', $customKey, 0, $iv);

    return $decryptedData;
  }
}