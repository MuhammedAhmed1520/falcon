<?php
namespace App\Knet;

class KnetGateway{

    private $TranportalId;
    private $TranTrackid;
    private $ReqTranportalId;
    private $ReqTranportalPassword;
    private $ReqAmount;
    private $ReqTrackId;
    private $ReqCurrency;
    private $ReqLangid;
    private $ReqAction;
    private $responseUrl;
    private $ReqResponseUrl;
    private $errorUrl;
    private $ReqErrorUrl;
    private $ReqUdf1;
    private $ReqUdf2;
    private $ReqUdf3;
    private $ReqUdf4;
    private $ReqUdf5;
    private $termResourceKey;
    private $knetLink ;




    public function __construct($transportalID,$transportalPassword,$termResourceKey,$responseUrl)
    {
        $this->TranportalId = $transportalID;
        $this->ReqTranportalId = "id=".$this->TranportalId;
        $this->TranTrackid = mt_rand();
        $this->ReqTranportalPassword = "password=".$transportalPassword;
        $this->ReqTrackId = "trackid=".$this->TranTrackid;
        $this->ReqCurrency = "currencycode=414";
        $this->errorUrl=$responseUrl;
        $this->responseUrl = $responseUrl;
        $this->ReqResponseUrl="responseURL=".$this->responseUrl;
        $this->ReqErrorUrl = "errorURL=".$this->errorUrl;
        $this->ReqLangid = "langid=AR";
        $this->ReqAction = "action=1";
        $this->termResourceKey = $termResourceKey;
        $this->knetLink = "https://www.kpay.com.kw/kpg/PaymentHTTP.htm?param=paymentInit"."&trandata=";
    }

    /**
     * @return mixed
     */
    public function getReqAmount()
    {
        return $this->ReqAmount;
    }

    /**
     * @param mixed $ReqAmount
     */
    public function setReqAmount($ReqAmount): void
    {
        $this->ReqAmount = "amt=".$ReqAmount;
    }

    /**
     * @return mixed
     */
    public function getReqUdf1()
    {
        return $this->ReqUdf1;
    }

    /**
     * @param mixed $ReqUdf1
     */
    public function setReqUdf1($ReqUdf1): void
    {
        $this->ReqUdf1 = "udf1=".$ReqUdf1;
    }

    /**
     * @return mixed
     */
    public function getReqUdf2()
    {
        return $this->ReqUdf2;
    }

    /**
     * @param mixed $ReqUdf2
     */
    public function setReqUdf2($ReqUdf2): void
    {
        $this->ReqUdf2 = "udf2=".$ReqUdf2;
    }

    /**
     * @return mixed
     */
    public function getReqUdf3()
    {
        return $this->ReqUdf3;
    }
    /**
     * @param mixed $ReqUdf3
     */
    public function setReqUdf3($ReqUdf3): void
    {
        $this->ReqUdf3 = "udf3=".$ReqUdf3;
    }

    /**
     * @return mixed
     */
    public function getReqUdf4()
    {
        return $this->ReqUdf4;
    }

    /**
     * @param mixed $ReqUdf4
     */
    public function setReqUdf4($ReqUdf4): void
    {
        $this->ReqUdf4 = "udf4=".$ReqUdf4;
    }

    /**
     * @return mixed
     */
    public function getReqUdf5()
    {
        return $this->ReqUdf5;
    }

    /**
     * @param mixed $ReqUdf5
     */
    public function setReqUdf5($ReqUdf5): void
    {
        $this->ReqUdf5 = "udf5=".$ReqUdf5;
    }


    public function prepareParameter()
    {
        return $this->ReqTranportalId."&".$this->ReqTranportalPassword."&".$this->ReqAction."&".$this->ReqLangid.
            "&".$this->ReqCurrency."&".$this->getReqAmount()."&".$this->ReqResponseUrl."&".$this->ReqErrorUrl.
            "&".$this->ReqTrackId."&".$this->getReqUdf1()."&".$this->getReqUdf2()."&".$this->getReqUdf3()."&".$this->getReqUdf4()."&".$this->getReqUdf5();
    }

    public function handleKnetLink(){
        // dd($this->knetLink.$this->prepareParameter()."&tranportalId=".$this->TranportalId."&responseURL=".$this->responseUrl."&errorURL=".$this->errorUrl);
        return $this->knetLink.$this->encryptAES($this->prepareParameter())."&tranportalId=".$this->TranportalId."&responseURL=".$this->responseUrl."&errorURL=".$this->errorUrl;
    }



    //AES Encryption Method Starts
    public function encryptAES($str) {
        $key = $this->termResourceKey;
        $str = $this->pkcs5_pad($str);
        $encrypted = openssl_encrypt($str, 'AES-128-CBC', $key, OPENSSL_ZERO_PADDING, $key);
        $encrypted = base64_decode($encrypted);
        $encrypted= unpack('C*', ($encrypted));
        $encrypted= $this->byteArray2Hex($encrypted);
        $encrypted = urlencode($encrypted);
        return $encrypted;
    }

    public function pkcs5_pad ($text) {
        $blocksize = 16;
        $pad = $blocksize - (strlen($text) % $blocksize);
        return $text . str_repeat(chr($pad), $pad);
    }

    public function byteArray2Hex($byteArray) {
        $chars = array_map("chr", $byteArray);
        $bin = join($chars);
        return bin2hex($bin);
    }


    //Decryption Method for AES Algorithm Starts

    public function decrypt($code) {
        $key = $this->termResourceKey;
        $code =  $this->hex2ByteArray(trim($code));
        $code=$this->byteArray2String($code);
        $iv = $key;
        $code = base64_encode($code);
        $decrypted = openssl_decrypt($code, 'AES-128-CBC', $key, OPENSSL_ZERO_PADDING, $iv);
        return $this->pkcs5_unpad($decrypted);
    }

    public function hex2ByteArray($hexString) {
        $string = hex2bin($hexString);
        return unpack('C*', $string);
    }


    public function byteArray2String($byteArray) {
        $chars = array_map("chr", $byteArray);
        return join($chars);
    }


    public function pkcs5_unpad($text){
        $pad = ord($text{strlen($text)-1});
        if ($pad > strlen($text)) {
            return false;
        }
        if (strspn($text, chr($pad), strlen($text) - $pad) != $pad) {
            return false;
        }
        return substr($text, 0, -1 * $pad);
    }


    public function handleResponse($data){
        $ResErrorText= $data['ErrorText'] ?? null; 	  	//Error Text/message
        $ResPaymentId = $data['paymentid'] ?? null;		//Payment Id
        $ResTrackID = $data['trackid'] ?? null;       	//Merchant Track ID
        $ResErrorNo = $data['Error'] ?? null;           //Error Number
        $ResAmount = $data['amt'] ?? null;              //Transaction Amount

        $pData=[];
        if(!$ResErrorText && !$ResErrorNo){
            // If No Error Decrypt Data
            $tranData = $data['trandata'] ?? null;
            $tranData = $this->decrypt($tranData);
            return $this->errorUrl."?".$tranData;
        }
        // Error And Return
        $url = $this->errorUrl ."?".
            "ErrorText=".$ResErrorText."&trackid=".$ResTrackID."&amt=".$ResAmount."&paymentid=".$ResPaymentId;
        return $url;
    }

}
