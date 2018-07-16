<?php

namespace AppBundle\Services;

class RsaExample
{
    /**
     * @var string
     */
    private $passphrase = null;

    /*
     * @var string
     */
    private $privateKey = null;

    /**
     * @var string
     */
    private $publicKey  = null;


    public function encrypt($unencryptedData)
    {
        if (empty($this->publicKey)) {
            throw new \Exception("Please set the public key before attempting encryption.");
        }

        $publicKey = openssl_get_publickey(file_get_contents('./mykey.pub'));

        if (!$publicKey) {
            throw new \Exception('Please set a valid public key before attempting encryption.');
        }

        $encrypted_data = '';
        openssl_public_encrypt($unencryptedData, $encrypted_data, $publicKey);

        return $encrypted_data;
    }

    public function decrypt($encryptedData)
    {
        if (empty($this->privateKey)) {
            throw new \Exception('Please set the private key before attempting decryption.');
        }

        $privateKey = openssl_pkey_get_private($this->privateKey, $this->passphrase);

        if (!$privateKey) {
            throw new \Exception('Please set a valid private key before attempting decryption.');
        }

        $unencryptedData = '';
        openssl_private_decrypt($encryptedData, $unencryptedData, $this->privateKey);

        return $unencryptedData;
    }

    /**
     * @return string
     */
    public function getPassphrase()
    {
        return $this->passphrase;
    }

    /**
     * @param null $passphrase
     */
    public function setPassphrase($passphrase): void
    {
        $this->passphrase = $passphrase;
    }

    /**
     * @return string
     */
    public function getPrivateKey(): string
    {
        return $this->privateKey;
    }

    /**
     * @param null $privateKey
     */
    public function setPrivateKey($privateKey): void
    {
        $this->privateKey = file_get_contents($privateKey);
    }

    /**
     * @return string
     */
    public function getPublicKey(): string
    {
        return $this->publicKey;
    }

    /**
     * @param null $publicKey
     */
    public function setPublicKey($publicKey): void
    {
        $this->publicKey = file_get_contents($publicKey);
    }
}