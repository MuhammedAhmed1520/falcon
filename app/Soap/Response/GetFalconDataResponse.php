<?php


namespace App\Soap\Response;


class GetFalconDataResponse
{
    /**
     * @var string
     */
    protected $getFalconDataResponse;

    /**
     * GetConversionAmountResponse constructor.
     *
     * @param string
     */
    public function __construct($getFalconDataResponse)
    {
        $this->getFalconDataResponse = $getFalconDataResponse;
    }

    /**
     * @return string
     */
    public function getFalconDataResponse()
    {
        return $this->getFalconDataResponse;
    }

}
