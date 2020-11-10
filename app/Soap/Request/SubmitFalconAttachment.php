<?php


namespace App\Soap\Request;


class SubmitFalconAttachment
{
    protected $RequestNo;
    protected $DocName;
    protected $DocFormat;
    protected $DocFile;
    protected $AttcahmentId;

    /**
     * SubmitFalconAttachment constructor.
     * @param $RequestNo
     * @param $DocName
     * @param $DocFormat
     * @param $DocFile
     * @param $AttcahmentId
     */
    public function __construct($RequestNo, $DocName, $DocFormat, $DocFile, $AttcahmentId)
    {
        $this->RequestNo = $RequestNo;
        $this->DocName = $DocName;
        $this->DocFormat = $DocFormat;
        $this->DocFile = $DocFile;
        $this->AttcahmentId = $AttcahmentId;
    }


    /**
     * @return mixed
     */
    public function getRequestNo()
    {
        return $this->RequestNo;
    }

    /**
     * @return mixed
     */
    public function getDocName()
    {
        return $this->DocName;
    }

    /**
     * @return mixed
     */
    public function getDocFormat()
    {
        return $this->DocFormat;
    }

    /**
     * @return mixed
     */
    public function getDocFile()
    {
        return $this->DocFile;
    }

    /**
     * @return mixed
     */
    public function getAttcahmentId()
    {
        return $this->AttcahmentId;
    }



}
