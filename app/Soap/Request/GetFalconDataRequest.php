<?php


namespace App\Soap\Request;


class GetFalconDataRequest
{
    private $P_O_CIVIL_ID;
    private $P_FAL_PIT_NO;

    /**
     * GetFalconDataRequest constructor.
     * @param $P_O_CIVIL_ID
     * @param $P_FAL_PIT_NO
     */

    public function __construct($P_O_CIVIL_ID, $P_FAL_PIT_NO)
    {
        $this->P_O_CIVIL_ID = $P_O_CIVIL_ID;
        $this->P_FAL_PIT_NO = $P_FAL_PIT_NO;
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
    public function getPFALPITNO()
    {
        return $this->P_FAL_PIT_NO;
    }


}
