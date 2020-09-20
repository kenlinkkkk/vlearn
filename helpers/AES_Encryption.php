<?php

include_once ('padCrypt.php');

class AES_Encryption
{
    private $key, $initVector, $mode, $cipher, $encryption = null;
    private $allowed_bits = array(128, 192, 256);
    private $allowed_modes = array('ecb', 'cfb', 'cbc', 'nofb', 'ofb');
    private $vector_modes = array('cbc','cfb','ofb');
    private $allowed_paddings = array(
        'ANSI_X.923' => 'ANSI_X923',
        'ISO_10126'	 => 'ISO_10126',
        'PKCS7'		 => 'PKCS7',
        'BIT'		 => 'BIT',
        'ZERO'		 => 'ZERO',
    );

    /***
     * String $key        = Your secret key that you will use to encrypt/decrypt
     * String $initVector = Your secret vector that you will use to encrypt/decrypt if using CBC, CFB, OFB, or a STREAM algorhitm that requires an IV
     * String $padding    = The padding method you want to use. The default is ZERO (aka NULL byte) [ANSI_X.923,ISO_10126,PKCS7,BIT,ZERO]
     * String $mode       = The encryption mode you want to use. The default is cbc [ecb,cfb,cbc,stream,nofb,ofb]
     **/
    public function __construct($key, $padCrypt_url, $initVector = '', $padding = 'PKCS7', $mode = 'cbc')
    {

        $mode = strtolower($mode);
        $padding = strtoupper($padding);

//        if(!class_exists('padCrypt'))
//        {
//            throw new Exception('The padCrypt class must be loaded for AES_Encryption to work: '. $padCrypt_url);
//        }
//
//        if(!function_exists('mcrypt_module_open'))
//        {
//            throw new Exception('The mcrypt extension must be loaded.');
//        }
//
//        if(strlen($initVector) != 16 && in_array($mode, $this->vector_modes))
//        {
//            throw new Exception('The $initVector is supposed to be 16 bytes in for CBC, CFB, NOFB, and OFB modes.');
//        }
//        elseif(!in_array($mode, $this->vector_modes) && !empty($initVector))
//        {
//            throw new Exception('The specified encryption mode does not use an initialization vector. You should pass an empty string, zero, FALSE, or NULL.');
//        }

        $this->encryption = strlen($key)*8;

//        if(!in_array($this->encryption, $this->allowed_bits))
//        {
//            throw new Exception('The $key must be either 16, 24, or 32 bytes in length for 128, 192, and 256 bit encryption respectively.');
//        }

        $this->key = $key;
        $this->initVector = $initVector;

//        if(!in_array($mode, $this->allowed_modes))
//        {
//            throw new Exception('The $mode must be one of the following: '.implode(', ', $this->allowed_modes));
//        }
//
//        if(!array_key_exists($padding, $this->allowed_paddings))
//        {
//            throw new Exception('The $padding must be one of the following: '.implode(', ', $this->allowed_paddings));
//        }

        $this->mode = $mode;
        $this->padding = $padding;
        $this->cipher = mcrypt_module_open('rijndael-128', '', $this->mode, '');
        $this->block_size = mcrypt_get_block_size('rijndael-128', $this->mode);
    }

    /***
     * String $text = The text that you want to encrypt
     **/
    public function encrypt($text)
    {
        mcrypt_generic_init($this->cipher, $this->key, $this->initVector);
        $encrypted_text = mcrypt_generic($this->cipher, $this->pad($text, $this->block_size));
        mcrypt_generic_deinit($this->cipher);
        return $encrypted_text;
    }

    /***
     * String $text = The text that you want to decrypt
     **/
    public function decrypt($text)
    {
        mcrypt_generic_init($this->cipher, $this->key, $this->initVector);
        $decrypted_text = mdecrypt_generic($this->cipher, $text);
        mcrypt_generic_deinit($this->cipher);
        return $this->unpad($decrypted_text);
    }

    /***
     * Use this function to export the key, init_vector, padding, and mode
     * This information is necessary to later decrypt an encrypted message
     **/
    public function getConfiguration()
    {
        return array(
            'key' 			=> $this->key,
            'init_vector'   => $this->initVector,
            'padding' 		=> $this->padding,
            'mode' 			=> $this->mode,
            'encryption'	=> $this->encryption . ' Bit',
            'block_size'	=> $this->block_size,
        );
    }

    private function pad($text, $block_size)
    {
        return call_user_func_array(array('padCrypt', 'pad_'.$this->allowed_paddings[$this->padding]), array($text, $block_size));
    }

    private function unpad($text)
    {
        return call_user_func_array(array('padCrypt', 'unpad_'.$this->allowed_paddings[$this->padding]), array($text));
    }

    public function __destruct()
    {
        mcrypt_module_close($this->cipher);
    }
}
