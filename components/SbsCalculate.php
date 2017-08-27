<?php


namespace app\components;


use app\models\forms\CalculatorForm;

class SbsCalculate
{
    public function calculate(CalculatorForm $form)
    {
        $data = json_encode($form->prepareRequest());
        $request = [
            'access' => [
                'login' => 'man',
                'token' => 'NDM1YTVjN2MtNTU4Zi00M2NiLWFiM2UtYTFjYzdiMTVmYjBh'
            ],
            'product' => $form->getProductName(),
            'data' => $data,
        ];
        $body = json_encode($request);
        //$body = '{"access":{"login":"man","token":"NDM1YTVjN2MtNTU4Zi00M2NiLWFiM2UtYTFjYzdiMTVmYjBh"},"product":"vzr","data":"{\"attributes\":{\"annualPolicy\":0,\"insuranceProgram\":1,\"insuranceTerritory\":0,\"babes\":0,\"adultsAndChildren\":1,\"old\":0,\"dayCount\":15,\"optionSport\":0},\"risks\":[{\"systemName\":\"VZRmedical\"},{\"systemName\":\"VZRmedKidsEvac\"},{\"systemName\":\"VZRmedVisit\"},{\"systemName\":\"VZRmedTransCosts\"},{\"systemName\":\"VZRmedDocLoss\"},{\"systemName\":\"VZRmedSearchRescue\"},{\"systemName\":\"VZRmedHotel\"},{\"systemName\":\"VZRmedTranslator\"}]}"}';

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,"https://dev.sberbankins.ru/api/calculate");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);


        $server_output = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $dump = curl_getinfo($ch, CURLINFO_HEADER_OUT);

        curl_close ($ch);

        if ($status !== 200) {
            return false;
        }

        $result = @json_decode($server_output, true);
        if (!isset($result['status']['code']) || $result['status']['code'] !== 0 || !isset($result['result'])) {
            return false;
        }

        $answer = @json_decode($result['result'], true);
        if (!$answer) {
            return false;
        }

        if (isset($answer['premium']) && $answer['currencyRate']) {
            return ceil($answer['premium'] * $answer['currencyRate']);
        }


        return false;
    }
}