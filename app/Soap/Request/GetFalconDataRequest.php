<?php


namespace App\Soap\Request;


class GetFalconDataRequest
{
    private $CivilId;
    private $FalPitNo;

    /**
     * GetFalconDataRequest constructor.
     * @param $P_O_CIVIL_ID
     * @param $P_FAL_PIT_NO
     */

    public function __construct($P_O_CIVIL_ID, $P_FAL_PIT_NO)
    {
        $this->CivilId = $P_O_CIVIL_ID;
        $this->FalPitNo = $P_FAL_PIT_NO;
    }

    /**
     * @return mixed
     */
    public function getCivilId()
    {
        return $this->CivilId;
    }

    /**
     * @return mixed
     */
    public function getFalPitNo()
    {
        return $this->FalPitNo;
    }



}
