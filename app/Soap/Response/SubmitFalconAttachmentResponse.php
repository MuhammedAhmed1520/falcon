<?php


namespace App\Soap\Response;


class SubmitFalconAttachmentResponse
{
    /**
     * @var string
     */
    protected $SubmitFalconAttachmentResponse;

    /**
     * GetConversionAmountResponse constructor.
     *
     * @param string
     */
    public function __construct($SubmitFalconAttachmentResponse)
    {
        $this->SubmitFalconAttachmentResponse = $SubmitFalconAttachmentResponse;
    }

    /**
     * @return string
     */
    public function getFalconRequestResponse()
    {
        return $this->SubmitFalconAttachmentResponse;
    }

}
