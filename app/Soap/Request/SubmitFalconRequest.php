<?php


namespace App\Soap\Request;


class SubmitFalconRequest
{
    protected $RequestType;
    protected $OCivilId;
    protected $OAName;
    protected $OAddress;
    protected $OMobile;
    protected $OPassportNo;
    protected $CivilExpDate;
    protected $OMail;
    protected $NewCiviid;
    protected $NewAName;
    protected $NewAddtr;
    protected $NewMobile;
    protected $NewPassportNo;
    protected $NewCivilExpDate;
    protected $NewCurPassFal;
    protected $NewOMail;
    protected $FalSex;
    protected $FalSpecies;
    protected $FalType;
    protected $FalOtherType;
    protected $FalOriginCountry;
    protected $FalCities;
    protected $FalPitNo;
    protected $FalRingNo;
    protected $FalInjDate;
    protected $FalInjHospital;

    protected $PaymentId;
    protected $Amount;
    protected $TransId;
    protected $TrackId;

    /**
     * SubmitFalconRequest constructor.
     * @param $RequestType
     * @param $OCivilId
     * @param $OAName
     * @param $OAddress
     * @param $OMobile
     * @param $OPassportNo
     * @param $CivilExpDate
     * @param $OMail
     * @param $NewCiviid
     * @param $NewAName
     * @param $NewAddtr
     * @param $NewMobile
     * @param $NewPassportNo
     * @param $NewCivilExpDate
     * @param $NewCurPassFal
     * @param $NewOMail
     * @param $FalSex
     * @param $FalSpecies
     * @param $FalType
     * @param $FalOtherType
     * @param $FalOriginCountry
     * @param $FalCities
     * @param $FalPitNo
     * @param $FalRingNo
     * @param $FalInjDate
     * @param $FalInjHospital
     * @param $PaymentId
     * @param $Amount
     * @param $TransId
     * @param $TrackId
     */
    public function __construct($RequestType, $OCivilId, $OAName, $OAddress, $OMobile, $OPassportNo, $CivilExpDate, $OMail, $NewCiviid, $NewAName, $NewAddtr, $NewMobile, $NewPassportNo, $NewCivilExpDate, $NewCurPassFal, $NewOMail, $FalSex, $FalSpecies, $FalType, $FalOtherType, $FalOriginCountry, $FalCities, $FalPitNo, $FalRingNo, $FalInjDate, $FalInjHospital, $PaymentId, $Amount, $TransId, $TrackId)
    {
        $this->RequestType = $RequestType;
        $this->OCivilId = $OCivilId;
        $this->OAName = $OAName;
        $this->OAddress = $OAddress;
        $this->OMobile = $OMobile;
        $this->OPassportNo = $OPassportNo;
        $this->CivilExpDate = $CivilExpDate;
        $this->OMail = $OMail;
        $this->NewCiviid = $NewCiviid;
        $this->NewAName = $NewAName;
        $this->NewAddtr = $NewAddtr;
        $this->NewMobile = $NewMobile;
        $this->NewPassportNo = $NewPassportNo;
        $this->NewCivilExpDate = $NewCivilExpDate;
        $this->NewCurPassFal = $NewCurPassFal;
        $this->NewOMail = $NewOMail;
        $this->FalSex = $FalSex;
        $this->FalSpecies = $FalSpecies;
        $this->FalType = $FalType;
        $this->FalOtherType = $FalOtherType;
        $this->FalOriginCountry = $FalOriginCountry;
        $this->FalCities = $FalCities;
        $this->FalPitNo = $FalPitNo;
        $this->FalRingNo = $FalRingNo;
        $this->FalInjDate = $FalInjDate;
        $this->FalInjHospital = $FalInjHospital;
        $this->PaymentId = $PaymentId;
        $this->Amount = $Amount;
        $this->TransId = $TransId;
        $this->TrackId = $TrackId;
    }


    /**
     * @return mixed
     */
    public function getRequestType()
    {
        return $this->RequestType;
    }

    /**
     * @return mixed
     */
    public function getOCivilId()
    {
        return $this->OCivilId;
    }

    /**
     * @return mixed
     */
    public function getOAName()
    {
        return $this->OAName;
    }

    /**
     * @return mixed
     */
    public function getOAddress()
    {
        return $this->OAddress;
    }

    /**
     * @return mixed
     */
    public function getOMobile()
    {
        return $this->OMobile;
    }

    /**
     * @return mixed
     */
    public function getOPassportNo()
    {
        return $this->OPassportNo;
    }

    /**
     * @return mixed
     */
    public function getCivilExpDate()
    {
        return $this->CivilExpDate;
    }

    /**
     * @return mixed
     */
    public function getOMail()
    {
        return $this->OMail;
    }

    /**
     * @return mixed
     */
    public function getNewCiviid()
    {
        return $this->NewCiviid;
    }

    /**
     * @return mixed
     */
    public function getNewAName()
    {
        return $this->NewAName;
    }

    /**
     * @return mixed
     */
    public function getNewAddtr()
    {
        return $this->NewAddtr;
    }

    /**
     * @return mixed
     */
    public function getNewMobile()
    {
        return $this->NewMobile;
    }

    /**
     * @return mixed
     */
    public function getNewPassportNo()
    {
        return $this->NewPassportNo;
    }

    /**
     * @return mixed
     */
    public function getNewCivilExpDate()
    {
        return $this->NewCivilExpDate;
    }

    /**
     * @return mixed
     */
    public function getNewCurPassFal()
    {
        return $this->NewCurPassFal;
    }

    /**
     * @return mixed
     */
    public function getNewOMail()
    {
        return $this->NewOMail;
    }

    /**
     * @return mixed
     */
    public function getFalSex()
    {
        return $this->FalSex;
    }

    /**
     * @return mixed
     */
    public function getFalSpecies()
    {
        return $this->FalSpecies;
    }

    /**
     * @return mixed
     */
    public function getFalType()
    {
        return $this->FalType;
    }

    /**
     * @return mixed
     */
    public function getFalOtherType()
    {
        return $this->FalOtherType;
    }

    /**
     * @return mixed
     */
    public function getFalOriginCountry()
    {
        return $this->FalOriginCountry;
    }

    /**
     * @return mixed
     */
    public function getFalCities()
    {
        return $this->FalCities;
    }

    /**
     * @return mixed
     */
    public function getFalPitNo()
    {
        return $this->FalPitNo;
    }

    /**
     * @return mixed
     */
    public function getFalRingNo()
    {
        return $this->FalRingNo;
    }

    /**
     * @return mixed
     */
    public function getFalInjDate()
    {
        return $this->FalInjDate;
    }

    /**
     * @return mixed
     */
    public function getFalInjHospital()
    {
        return $this->FalInjHospital;
    }

    /**
     * @return mixed
     */
    public function getPaymentId()
    {
        return $this->PaymentId;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->Amount;
    }

    /**
     * @return mixed
     */
    public function getTransId()
    {
        return $this->TransId;
    }

    /**
     * @return mixed
     */
    public function getTrackId()
    {
        return $this->TrackId;
    }





}
