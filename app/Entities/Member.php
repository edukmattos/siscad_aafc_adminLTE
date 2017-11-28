<?php

namespace SisCad\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\Revisionable;
use Carbon\Carbon;
use DB;
use JansenFelipe\Utils\Utils as Utils;
use JansenFelipe\Utils\Mask as Mask;

class Member extends Revisionable
{
    use SoftDeletes;
    protected $dates = [
        'deleted_at',
        'date_aafc_ini',
        'date_aafc_fim',
        'date_inss',
        'date_fundacao',
        'birthday'];

    protected $revisionEnabled = true;
    protected $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    protected $historyLimit = 9999999; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.
    protected $revisionCreationsEnabled = true;
    protected $dontKeepRevisionOf = [];
    #protected $revisionFormattedFields = array('title'  => 'string:<strong>%s</strong>', 'public' => 'boolean:No|Yes', 'deleted_at' => 'isEmpty:Active|Deleted');
    protected $revisionFormattedFieldNames = [
        'code' => 'Matrícula',
        'cpf' => 'CPF',
        'name' => 'Nome',
        'address' => 'Endereço',
        'zip_code' => 'CEP',
        'neighborhood' => 'Bairro',
        'phone' => 'Telefone',
        'mobile' => 'Celular',
        'email' => 'e-mail', 
        'city_id' => 'Cidade',
        'member_status_id' => 'Situação',
        'member_status_reason_id' => 'Motivo desligamento',
        'plan_id' => 'Plano',
        'gender_id' => 'Sexo',
        'date_aafc_ini' => 'Data Ativo',
        'date_aafc_fim' => 'Data Desligamento',
        'date_inss' => 'Data INSS',
        'date_fundacao' => 'Data Fundação',
        'birthday' => 'Data de nascimento',
        'bank_id' => 'Banco',
        'bank_agency' => 'Agência', 
        'bank_account' => 'Conta Corrente', 
        'comments' => 'Observações',
        'deleted_at' => 'Excluído'
    ];
    protected $revisionFormattedFields = [
        'birthday' => 'datetime:d/m/Y',
        'date_aafc_ini' => 'datetime:d/m/Y',
        'date_aafc_fim' => 'datetime:d/m/Y',
        'date_fundacao' => 'datetime:d/m/Y',
        'date_inss' => 'datetime:d/m/Y'
        ];

    protected $revisionNullString = 'nada';
    protected $revisionUnknownString = 'desconhecido';

    protected $fillable = [
        'code',
        'cpf',
        'name',
        'address',
        'zip_code',
        'neighborhood',
        'phone',
        'mobile',
        'email', 
        'city_id',
        'member_status_id',
        'member_status_reason_id',
        'plan_id',
        'gender_id',
        'date_aafc_ini',
        'date_aafc_fim',
        'birthday',
        'comments'
    ];
  
    public function getPaymentTotal()
    {
        $total = 0;
        
        foreach($this->payments as $payments)
        {
            $total += $payments['payment_value_01'] + $payments['payment_value_02'] + $payments['payment_value_03'] + $payments['payment_value_04'] + $payments['payment_value_05'] + $payments['payment_value_06'] + $payments['payment_value_07'] + $payments['payment_value_08'] + $payments['payment_value_09'] + $payments['payment_value_10'] + $payments['payment_value_11'] + $payments['payment_value_12'];
        }
        return $total;
    }

    public function getCpfMaskAttribute($value)
    {
        $value = $this->cpf;

        $cpf_mask = Utils::mask($value, Mask::CPF);

        return $cpf_mask;
    }

    public function getZipCodeMaskAttribute($value)
    {
        $value = $this->zip_code;
        
        $zip_code_mask = Utils::mask($value, Mask::CEP);

        return $zip_code_mask;
    }

    public function getPhoneMaskAttribute($value)
    {
        $value = $this->phone;
        
        $phone_mask =  Utils::mask($value, '(##) ####-####');

        return $phone_mask;
    }

    public function getMobileMaskAttribute($value)
    {
        $value = $this->mobile;
        
        $mobile_mask = Utils::mask($value, '(##) #####-####');
        
        return $mobile_mask;
    }

    public function setDateAafcIniAttribute($value)
    {
        return $this->attributes['date_aafc_ini'] = Carbon::parse($value)->format('Y-m-d');
    }

    public function setDateAafcFimAttribute($value)
    {
        if(!is_null($value))
        {
            return $this->attributes['date_aafc_fim'] = Carbon::parse($value)->format('Y-m-d');
        }
    }

    public function setBirthdayAttribute($value)
    {
        if(!is_null($value))
        {
            return $this->attributes['birthday'] = Carbon::parse($value)->format('Y-m-d');
        }
    }

    public function city()
    {
        return $this->belongsTo('SisCad\Entities\City'); 
    }

    public function member_status()
    {
        return $this->belongsTo('SisCad\Entities\MemberStatus');  
    }

    public function plan()
    {
        return $this->belongsTo('SisCad\Entities\Plan');   
    }

    public function gender()
    {
        return $this->belongsTo('SisCad\Entities\Entities\Gender');   
    }

    public function member_status_reason()
    {
        return $this->belongsTo('SisCad\Entities\MemberStatusReason');   
    }

    public function bank()
    {
        return $this->belongsTo('SisCad\Entities\Bank'); 
    }

    public function payments()
    {
        return $this->hasMany('SisCad\Entities\Payment'); 
    }
}
