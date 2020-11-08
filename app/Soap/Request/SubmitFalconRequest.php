<?php


namespace App\Soap\Request;


class SubmitFalconRequest
{
    protected $P_REQUEST_TYP;

    protected $P_O_CIVIL_ID;
    protected $P_O_A_NAME;
    protected $P_O_ADDRESS;
    protected $P_O_MOBILE;
    protected $P_O_PASSPORT_NO;
    protected $P_CIVIL_EXPIRY_DT;
    protected $P_O_MAIL;
    protected $P_NW_CIVIL_ID;

    /**
     * SubmitFalconRequest constructor.
     * @param $P_REQUEST_TYP
     * @param $P_O_CIVIL_ID
     * @param $P_O_A_NAME
     * @param $P_O_ADDRESS
     * @param $P_O_MOBILE
     * @param $P_O_PASSPORT_NO
     * @param $P_CIVIL_EXPIRY_DT
     * @param $P_O_MAIL
     * @param $P_NW_CIVIL_ID
     * @param $P_NW_A_NAME
     * @param $P_NW_ADDRESS
     * @param $P_NW_MOBILE
     * @param $P_NW_PASSPORT_NO
     * @param $P_NW_CIVIL_EXPIRY
     * @param $P_NW_O_MAIL
     * @param $P_CUR_PASS_FAL
     * @param $P_FAL_SEX
     * @param $P_FAL_SPECIES
     * @param $P_FAL_TYPE
     * @param $P_FAL_OTHER_TYPE
     * @param $P_FAL_ORIGIN_COUNTRY
     * @param $P_FAL_CITES_NO
     * @param $P_FAL_PIT_NO
     * @param $P_FAL_RING_NO
     * @param $P_FAL_INJ_DATE
     * @param $P_FAL_INJ_HOSPITAL
     * @param $P_PAYMENT_ID
     * @param $P_AMOUNT
     * @param $P_TRANS_ID
     * @param $P_TRACK_ID
     */
    public function __construct($P_REQUEST_TYP,
                                $P_O_CIVIL_ID,
                                $P_O_A_NAME,
                                $P_O_ADDRESS,
                                $P_O_MOBILE,
                                $P_O_PASSPORT_NO,
                                $P_CIVIL_EXPIRY_DT,
                                $P_O_MAIL,
                                $P_NW_CIVIL_ID,
                                $P_NW_A_NAME,
                                $P_NW_ADDRESS,
                                $P_NW_MOBILE,
                                $P_NW_PASSPORT_NO,
                                $P_NW_CIVIL_EXPIRY,
                                $P_NW_O_MAIL,
                                $P_CUR_PASS_FAL,
                                $P_FAL_SEX,
                                $P_FAL_SPECIES,
                                $P_FAL_TYPE,
                                $P_FAL_OTHER_TYPE,
                                $P_FAL_ORIGIN_COUNTRY,
                                $P_FAL_CITES_NO,
                                $P_FAL_PIT_NO,
                                $P_FAL_RING_NO,
                                $P_FAL_INJ_DATE,
                                $P_FAL_INJ_HOSPITAL,
                                $P_PAYMENT_ID,
                                $P_AMOUNT,
                                $P_TRANS_ID,
                                $P_TRACK_ID)
    {
        $this->P_REQUEST_TYP = $P_REQUEST_TYP;
        $this->P_O_CIVIL_ID = $P_O_CIVIL_ID;
        $this->P_O_A_NAME = $P_O_A_NAME;
        $this->P_O_ADDRESS = $P_O_ADDRESS;
        $this->P_O_MOBILE = $P_O_MOBILE;
        $this->P_O_PASSPORT_NO = $P_O_PASSPORT_NO;
        $this->P_CIVIL_EXPIRY_DT = $P_CIVIL_EXPIRY_DT;
        $this->P_O_MAIL = $P_O_MAIL;
        $this->P_NW_CIVIL_ID = $P_NW_CIVIL_ID;
        $this->P_NW_A_NAME = $P_NW_A_NAME;
        $this->P_NW_ADDRESS = $P_NW_ADDRESS;
        $this->P_NW_MOBILE = $P_NW_MOBILE;
        $this->P_NW_PASSPORT_NO = $P_NW_PASSPORT_NO;
        $this->P_NW_CIVIL_EXPIRY = $P_NW_CIVIL_EXPIRY;
        $this->P_NW_O_MAIL = $P_NW_O_MAIL;
        $this->P_CUR_PASS_FAL = $P_CUR_PASS_FAL;
        $this->P_FAL_SEX = $P_FAL_SEX;
        $this->P_FAL_SPECIES = $P_FAL_SPECIES;
        $this->P_FAL_TYPE = $P_FAL_TYPE;
        $this->P_FAL_OTHER_TYPE = $P_FAL_OTHER_TYPE;
        $this->P_FAL_ORIGIN_COUNTRY = $P_FAL_ORIGIN_COUNTRY;
        $this->P_FAL_CITES_NO = $P_FAL_CITES_NO;
        $this->P_FAL_PIT_NO = $P_FAL_PIT_NO;
        $this->P_FAL_RING_NO = $P_FAL_RING_NO;
        $this->P_FAL_INJ_DATE = $P_FAL_INJ_DATE;
        $this->P_FAL_INJ_HOSPITAL = $P_FAL_INJ_HOSPITAL;
        $this->P_PAYMENT_ID = $P_PAYMENT_ID;
        $this->P_AMOUNT = $P_AMOUNT;
        $this->P_TRANS_ID = $P_TRANS_ID;
        $this->P_TRACK_ID = $P_TRACK_ID;
    }

    /**
     * @return mixed
     */
    public function getPREQUESTTYP()
    {
        return $this->P_REQUEST_TYP;
    }

    /**
     * @return mixed
     */
    public function getPOCIVILID()
    {
        return $this->P_O_CIVIL_ID;
    }

    /**
     * @return mixed
     */
    public function getPOANAME()
    {
        return $this->P_O_A_NAME;
    }

    /**
     * @return mixed
     */
    public function getPOADDRESS()
    {
        return $this->P_O_ADDRESS;
    }

    /**
     * @return mixed
     */
    public function getPOMOBILE()
    {
        return $this->P_O_MOBILE;
    }

    /**
     * @return mixed
     */
    public function getPOPASSPORTNO()
    {
        return $this->P_O_PASSPORT_NO;
    }

    /**
     * @return mixed
     */
    public function getPCIVILEXPIRYDT()
    {
        return $this->P_CIVIL_EXPIRY_DT;
    }

    /**
     * @return mixed
     */
    public function getPOMAIL()
    {
        return $this->P_O_MAIL;
    }

    /**
     * @return mixed
     */
    public function getPNWCIVILID()
    {
        return $this->P_NW_CIVIL_ID;
    }

    /**
     * @return mixed
     */
    public function getPNWANAME()
    {
        return $this->P_NW_A_NAME;
    }

    /**
     * @return mixed
     */
    public function getPNWADDRESS()
    {
        return $this->P_NW_ADDRESS;
    }

    /**
     * @return mixed
     */
    public function getPNWMOBILE()
    {
        return $this->P_NW_MOBILE;
    }

    /**
     * @return mixed
     */
    public function getPNWPASSPORTNO()
    {
        return $this->P_NW_PASSPORT_NO;
    }

    /**
     * @return mixed
     */
    public function getPNWCIVILEXPIRY()
    {
        return $this->P_NW_CIVIL_EXPIRY;
    }

    /**
     * @return mixed
     */
    public function getPNWOMAIL()
    {
        return $this->P_NW_O_MAIL;
    }

    /**
     * @return mixed
     */
    public function getPCURPASSFAL()
    {
        return $this->P_CUR_PASS_FAL;
    }

    /**
     * @return mixed
     */
    public function getPFALSEX()
    {
        return $this->P_FAL_SEX;
    }

    /**
     * @return mixed
     */
    public function getPFALSPECIES()
    {
        return $this->P_FAL_SPECIES;
    }

    /**
     * @return mixed
     */
    public function getPFALTYPE()
    {
        return $this->P_FAL_TYPE;
    }

    /**
     * @return mixed
     */
    public function getPFALOTHERTYPE()
    {
        return $this->P_FAL_OTHER_TYPE;
    }

    /**
     * @return mixed
     */
    public function getPFALORIGINCOUNTRY()
    {
        return $this->P_FAL_ORIGIN_COUNTRY;
    }

    /**
     * @return mixed
     */
    public function getPFALCITESNO()
    {
        return $this->P_FAL_CITES_NO;
    }

    /**
     * @return mixed
     */
    public function getPFALPITNO()
    {
        return $this->P_FAL_PIT_NO;
    }

    /**
     * @return mixed
     */
    public function getPFALRINGNO()
    {
        return $this->P_FAL_RING_NO;
    }

    /**
     * @return mixed
     */
    public function getPFALINJDATE()
    {
        return $this->P_FAL_INJ_DATE;
    }

    /**
     * @return mixed
     */
    public function getPFALINJHOSPITAL()
    {
        return $this->P_FAL_INJ_HOSPITAL;
    }

    /**
     * @return mixed
     */
    public function getPPAYMENTID()
    {
        return $this->P_PAYMENT_ID;
    }

    /**
     * @return mixed
     */
    public function getPAMOUNT()
    {
        return $this->P_AMOUNT;
    }

    /**
     * @return mixed
     */
    public function getPTRANSID()
    {
        return $this->P_TRANS_ID;
    }

    /**
     * @return mixed
     */
    public function getPTRACKID()
    {
        return $this->P_TRACK_ID;
    }
    protected $P_NW_A_NAME;
    protected $P_NW_ADDRESS;
    protected $P_NW_MOBILE;
    protected $P_NW_PASSPORT_NO;
    protected $P_NW_CIVIL_EXPIRY;
    protected $P_NW_O_MAIL;
    protected $P_CUR_PASS_FAL;
    protected $P_FAL_SEX;
    protected $P_FAL_SPECIES;
    protected $P_FAL_TYPE;
    protected $P_FAL_OTHER_TYPE;
    protected $P_FAL_ORIGIN_COUNTRY;
    protected $P_FAL_CITES_NO;
    protected $P_FAL_PIT_NO;
    protected $P_FAL_RING_NO;
    protected $P_FAL_INJ_DATE;
    protected $P_FAL_INJ_HOSPITAL;

    protected $P_PAYMENT_ID;
    protected $P_AMOUNT;
    protected $P_TRANS_ID;
    protected $P_TRACK_ID;





}
