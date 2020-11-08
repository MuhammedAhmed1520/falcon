<?php


namespace App\Soap\Response;


class SubmitFalconRequestResponse
{
    /**
     * @var string
     */
    protected $SubmitFalconRequestResponse;

    /**
     * GetConversionAmountResponse constructor.
     *
     * @param string
     */
    public function __construct($SubmitFalconRequestResponse)
    {
        $this->SubmitFalconRequestResponse = $SubmitFalconRequestResponse;
    }

    /**
     * @return string
     */
    public function getFalconRequestResponse()
    {
        return $this->SubmitFalconRequestResponse;
    }

}
