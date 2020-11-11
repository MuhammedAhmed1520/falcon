<?php


namespace App\Soap\Request;


class GetFalconCivilInfoRequest
{
    private $CivilId;

    /**
     * GetFalconCivilInfoRequest constructor.
     * @param $CivilId
     */
    public function __construct($CivilId)
    {
        $this->CivilId = $CivilId;
    }


    public function getCivilId()
    {
        return $this->CivilId;
    }


}
