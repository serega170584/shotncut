<?php


namespace app\models\forms;


use yii\base\Model;

class VzrCalculateForm extends Model implements CalculatorForm
{
    public $annualPolicy;
    public $annualPolicyType = 0;
    public $insuranceProgram;
    public $insuranceTerritory;
    public $babes;
    public $adultsAndChildren;
    public $old;
    public $dayCount;
    public $optionSport;
    public $dopSport;
    public $dopLoot;
    public $dopLayer;
    public $dopTrauma;
    public $dopCancel;
    public $dates1;
    public $dates1ts;
    public $dates2;
    public $dates2ts;

    protected $optionPackets = [
        'base' => ['VZRmedical', 'VZRmedSearchRescue'],
        'dopSport' => ['VZRsporttools', 'VZRskypass'],
        'dopLoot' => ['VZRlootlost', 'VZRlootdelay', 'VZRflightdelay'],
        'dopLayer' => ['VZRjuridical', 'VZRgo'],
        'dopTrauma' => ['VZRtripstop', 'VZRns'],
        'dopCancel' => ['VZRtripcancel']
    ];

    public function rules(){

        return [
            [['annualPolicy', 'insuranceProgram', 'insuranceTerritory', 'annualPolicyType',
                'babes', 'adultsAndChildren', 'old', 'dayCount',
                'optionSport'], 'integer', 'min' => 0],
            [['annualPolicy', 'insuranceProgram', 'insuranceTerritory', 'annualPolicyType',
                'babes', 'adultsAndChildren', 'old', 'dayCount',
                'optionSport'], 'fixInteger'],

            [['dopSport', 'dopLoot', 'dopLayer', 'dopTrauma', 'dopCancel'], 'boolean'],
            [['dopSport', 'dopLoot', 'dopLayer', 'dopTrauma', 'dopCancel'], 'fixBoolean'],

            ['dates1', 'date', 'timestampAttribute' => 'dates1ts', 'format' => 'MM/dd/y'],
            ['dates2', 'date', 'timestampAttribute' => 'dates2ts', 'format' => 'MM/dd/y'],

            ['annualPolicy', 'in', 'range' => [0,1]],
            ['annualPolicyType', 'in', 'range' => [0,1]],
            ['insuranceTerritory', 'in', 'range' => [0,1,2]],
            ['insuranceProgram', 'in', 'range' => [0,1,2,3]],
            ['insuranceProgram', 'validateInsuranceProgramRange'],
            ['dayCount', 'recalculateDays'],
            ['dopSport', 'validateDopSportFix'],
        ];
    }

    public function fixInteger($attribute, $params, $validator)
    {
        $this->$attribute = (int)$this->$attribute;
    }

    public function fixBoolean($attribute, $params, $validator)
    {
        $this->$attribute = (bool)$this->$attribute;
    }

    public function validateInsuranceProgramRange($attribute, $params, $validator)
    {
        $result = false;
        if ($this->insuranceTerritory === 0) {
            $result = in_array($this->insuranceProgram, [0,1,2]);
        } elseif ($this->insuranceTerritory === 1) {
            $result = in_array($this->insuranceProgram, [1,2]);
        } elseif ($this->insuranceTerritory === 2) {
            $result = in_array($this->insuranceProgram, [3]);
        }
        if ($result === false) {
            $this->addError($attribute, \Yii::t('yii', '{attribute} is invalid.'));
        }
    }

    public function recalculateDays($attribute, $params, $validator)
    {
        if ($this->annualPolicy !== 0) {
            return;
        }

        if (!$this->dates1ts || !$this->dates2ts || $this->dates2ts < $this->dates1ts) {
            $this->addError($attribute, \Yii::t('yii', 'dates1 and dates2 required when annualPolicy==0'));
        }

        $days = ceil(($this->dates2ts - $this->dates1ts)/86400);


        $this->dayCount = $days;
    }

    public function validateDopSportFix($attribute, $params, $validator)
    {
        if ($this->dopSport) {
            $this->optionSport = 1;
        }
    }

    public function prepareRequest()
    {
        $attrFilter = ['annualPolicy', 'insuranceProgram', 'insuranceTerritory', 'annualPolicyType',
            'babes', 'adultsAndChildren', 'old', 'dayCount', 'optionSport'];
        $attributes = $this->getAttributes($attrFilter);
        $dops = ['dopSport', 'dopLoot', 'dopLayer', 'dopTrauma', 'dopCancel'];
        $risks = [];
        foreach ($this->optionPackets['base'] as $risk) {
            $risks[] = ['systemName' => $risk];
        }
        foreach ($dops as $dop) {
            if ($this->$dop) {
                foreach ($this->optionPackets[$dop] as $risk) {
                    $risks[] = ['systemName' => $risk];
                }
            }
        }
        return [
            'attributes' => $attributes,
            'risks' => $risks
        ];
    }

    public function getProductName()
    {
        return 'vzr';
    }
}