<?php


namespace App\Soap\Response;


class GetFalconCivilInfoResponse
{
    /**
     * @var string
     */
    protected $getFalconCivilInfoResponse;

    /**
     * GetConversionAmountResponse constructor.
     *
     * @param string
     */
    public function __construct($getFalconCivilInfoResponse)
    {
        $this->getFalconCivilInfoResponse = $getFalconCivilInfoResponse;
    }

    /**
     * @return string
     */
    public function getFalconCivilInfoResponse()
    {
        return $this->getFalconCivilInfoResponse;
    }

}
