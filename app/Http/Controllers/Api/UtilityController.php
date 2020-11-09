<?php

namespace App\Http\Controllers\Api;

use App\Modules\Option\OptionRepo;
use App\Soap\Request\GetConversionAmount;
use App\Soap\Request\GetFalconDataRequest;
use App\Soap\Request\SubmitFalconRequest;
use App\Soap\Response\GetConversionAmountResponse;
use App\Soap\Response\GetFalconDataResponse;
use App\Soap\Response\SubmitFalconRequestResponse;
use Artisaninweb\SoapWrapper\SoapWrapper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UtilityController extends Controller
{

    private $optionRepo;
    private $soapWrapper;

    public function __construct()
    {
        $this->optionRepo = new OptionRepo();
        $this->soapWrapper = new SoapWrapper();

    }
    public function allOptions($type = null)
    {
        return $this->optionRepo->getOptionByType($type);

    }

    public function _testSoap()
    {
        $this->soapWrapper->add('Currency', function ($service) {
            $service
                ->wsdl('http://currencyconverter.kowabunga.net/converter.asmx?WSDL')
                ->trace(true)
                ->options(['user_agent' => 'PHPSoapClient'])
                ->classmap([
                    GetConversionAmount::class,
                    GetConversionAmountResponse::class,
                ]);
        });


        // With classmap
        $response = $this->soapWrapper->call('Currency.GetConversionAmount', [
            new GetConversionAmount('USD', 'EUR', '2014-06-05', '1000')
        ]);
//        var_dump($response);
        dd($response);
//        $json = json_encode($response);
//        $response = json_decode($json,TRUE);

//        dd($response);
//        return $response;
//        dd($response);
//        var_dump($response);
        exit;
    }
    public function ___testSoap()
    {
        $this->soapWrapper->add('Falcon', function ($service) {
            $service
                ->wsdl('https://xmlpitest-ea.dhl.com/XMLShippingServlet')
                ->trace(true)
                ->options(['user_agent' => 'PHPSoapClient'])
                ->classmap([
                    SubmitFalconRequest::class,
                    SubmitFalconRequestResponse::class,
                ]);
        });

        $req = new SubmitFalconRequest(1, 123456789632,
            'محمد', 'تجريبى',
            12345678, '12589632',
            '2022-01-01', 'muhammedahmed1520@gmail.com',
            null, null,
            null, null,
            null, null,
            null, null,
            'M', 'test',
            '1', 'test',
            '1', '1',
            '157654', '4361',
            '2020-11-01', '1',
            '46347643', '5',
            '46347643', '46347643'
        );
//        dd($req);

        // With classmap
        $response = $this->soapWrapper->call('Falcon.submitFalconRequest', [
            $req
        ]);

//        $json = json_encode($response);
//        $response = json_decode($json,TRUE);
//        dd($response);
        exit;
    }
    public function testSoap()
    {
        $this->soapWrapper->add('Falcon', function ($service) {
            $service
                ->wsdl(env('FALCON_SOAP'))
                ->trace(true)
                ->options(['user_agent' => 'PHPSoapClient'])
                ->classmap([
                    SubmitFalconRequest::class,
                    SubmitFalconRequestResponse::class,
                ]);
        });

        $req = new SubmitFalconRequest(1, 123456789632,
            'محمد', 'تجريبى',
            12345678, '12589632',
            '2022-01-01', 'muhammedahmed1520@gmail.com',
            null, null,
            null, null,
            null, null,
            null, null,
            'M', 'test',
            '1', 'test',
            '1', '1',
            '157654', '4361',
            '2020-11-01', '1',
            '46347643', '5',
            '46347643', '46347643'
        );
//        dd($req);

        // With classmap
        $response = $this->soapWrapper->call('Falcon.submitFalconRequest', [
            $req
        ]);

//        $json = json_encode($response);
//        $response = json_decode($json,TRUE);
//        dd($response);
        exit;
    }

    public function __testSoap()
    {
        $this->soapWrapper->add('Falcon', function ($service) {
            $service
                ->wsdl(env('FALCON_SOAP'))
                ->trace(true)
                ->options(['user_agent' => 'PHPSoapClient'])
                ->classmap([
                    GetFalconDataRequest::class,
                    GetFalconDataResponse::class,
                ]);
        });


        // With classmap
        $response = $this->soapWrapper->call('Falcon.getFalconData', [
            new GetFalconDataRequest('236985471587','5555')
        ]);
//        $json = json_encode($response);
//        $response = json_decode($json,TRUE);
        dd($response);
        exit;
    }

}
