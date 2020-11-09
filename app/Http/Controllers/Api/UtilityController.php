<?php

namespace App\Http\Controllers\Api;

use App\Modules\Option\OptionRepo;
use App\Soap\Request\GetConversionAmount;
use App\Soap\Request\SubmitFalconRequest;
use App\Soap\Response\GetConversionAmountResponse;
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

    public function testSoap()
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

        // Without classmap
        $response = $this->soapWrapper->call('Currency.GetConversionAmount',[
            new GetConversionAmount('USD', 'EUR', '2014-06-05', '1000')
        ]);

        $json = json_encode($response);
        $response = json_decode($json,TRUE);
        return $response;
//        dd($response);
//        var_dump($response);
//        exit;
    }
    public function _testSoap()
    {
        $this->soapWrapper->add('Falcon', function ($service) {
            $service
                ->wsdl('http://eprocesstest1.epa.org.kw:7002/FalconWebServices-FalconWebServices-context-root/FalconWebservicePort?WSDL')
                ->trace(true)
                ->options(['user_agent' => 'PHPSoapClient'])
                ->classmap([
                    SubmitFalconRequest::class,
                    SubmitFalconRequestResponse::class,
                ]);
        });
        // Without classmap
//        $response = $this->soapWrapper->call('Currency.GetConversionAmount', [
//            'CurrencyFrom' => 'USD',
//            'CurrencyTo'   => 'EUR',
//            'RateDate'     => '2014-06-05',
//            'Amount'       => '1000',
//        ]);


        // With classmap
        $response = $this->soapWrapper->call('Falcon.submitFalconRequest', [
            new SubmitFalconRequest(1, 123456789632,
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
            )
        ]);
//        $e = simplexml_load_string($response);
        $json = json_encode($response);
        $response = json_decode($json,TRUE);
//        $response = collect($array);
        dd($response);
        var_dump($response);
        exit;
    }

}
