<?php

class Crypter{

    public int $options;
    public int  $encryption_iv;
    public string $encryption_key;
    public string $encryption;
    public string $keyword;
    public string $ciphering;
    public int $iv_length;
    public string $decryption_key;
    public string $decryption_iv;

    public function __construct(){

        $ciphering = "AES-128-CTR";
        $iv_length = openssl_cipher_iv_length($ciphering);
        $keyword = "Bonjour";
        $encryption_iv = '1234567891011121';
        $encryption_key = "visix";
        $decryption_key = $encryption_key;
        $decryption_iv = $encryption_iv;
    }
    public function encrypt($keyword){

        $encryption = openssl_encrypt($keyword, $this->ciphering, $this->encryption_key, $this->options, $this->encryption_iv);

    }
    public function decrypt($keyword, $encryption){

        $decryption = openssl_decrypt($encryption, $this->ciphering, $this->decryption_key, $this->options,$this->decryption_iv);
    }
}