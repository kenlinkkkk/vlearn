<?php

class AES_Encryption
{
    private $key, $initVector, $mode, $cipher, $encryption = null;

    /***
     * String $key        = Your secret key that you will use to encrypt/decrypt
     * String $initVector = Your secret vector that you will use to encrypt/decrypt if using CBC, CFB, OFB, or a STREAM algorhitm that requires an IV
     * String $padding    = The padding method you want to use. The default is ZERO (aka NULL byte) [ANSI_X.923,ISO_10126,PKCS7,BIT,ZERO]
     * String $mode       = The encryption mode you want to use. The default is cbc [ecb,cfb,cbc,stream,nofb,ofb]
     **/
    public function __construct($key, $initVector = '', $padding = 'PKCS7', $mode = 'cbc')
    {

        $mode = strtolower($mode);
        $padding = strtoupper($padding);
        $this->key = $key;
        $this->initVector = $initVector;
    }

    /***
     * String $text = The text that you want to encrypt
     **/
    public function encrypt($text)
    {
        $iv = $this->key;
        return openssl_encrypt(
            $text,
            'aes-128-cbc',
            $this->key,
            OPENSSL_RAW_DATA,
            $iv
        );
    }

    /***
     * String $text = The text that you want to decrypt
     **/
    public function decrypt($text)
    {
        $iv = $this->key;
        return openssl_decrypt(
            $text,
            'aes-128-cbc',
            $this->key,
            OPENSSL_RAW_DATA,
            $iv
        );
    }
}
