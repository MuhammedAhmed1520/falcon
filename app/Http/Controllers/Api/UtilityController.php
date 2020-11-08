<?php

namespace App\Http\Controllers\Api;

use App\Modules\Option\OptionRepo;
use App\Soap\Request\GetConversionAmount;
use App\Soap\Response\GetConversionAmountResponse;
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
        // Without classmap
//        $response = $this->soapWrapper->call('Currency.GetConversionAmount', [
//            'CurrencyFrom' => 'USD',
//            'CurrencyTo'   => 'EUR',
//            'RateDate'     => '2014-06-05',
//            'Amount'       => '1000',
//        ]);


        // With classmap
        $response = $this->soapWrapper->call('Currency.GetConversionAmount', [
            new GetConversionAmount('USD', 'EG', '2020-11-08', '1000')
        ]);

        dd($response);
        var_dump($response);
        exit;
    }
    public function testSoap()
    {
        $this->soapWrapper->add('Falcon', function ($service) {
            $service
                ->wsdl('http://eprocesstest1.epa.org.kw:7002/FalconWebServices-FalconWebServices-context-root/FalconWebservicePort?WSDL')
                ->trace(true)
                ->options(['user_agent' => 'PHPSoapClient'])
                ->classmap([
                    GetConversionAmount::class,
                    GetConversionAmountResponse::class,
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
        $response = $this->soapWrapper->call('Currency.GetConversionAmount', [
            new GetConversionAmount('USD', 'EG', '2020-11-08', '1000')
        ]);

        dd($response);
        var_dump($response);
        exit;
    }

}
