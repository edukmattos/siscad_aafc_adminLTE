<?php

namespace SisCad\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\Revisionable;

class Meeting extends Revisionable
{
    use SoftDeletes;
    protected $dates = [
        'date'];

    protected $revisionEnabled = true;
    protected $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    protected $historyLimit = 9999999; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.
    protected $revisionCreationsEnabled = true;
    protected $dontKeepRevisionOf = [];
    #protected $revisionFormattedFields = array('title'  => 'string:<strong>%s</strong>', 'public' => 'boolean:No|Yes', 'deleted_at' => 'isEmpty:Active|Deleted');
    protected $revisionFormattedFieldNames = [
        'date' => 'Data',
        'description' => 'CPF',
        'meeting_type_id' => 'Tipo de Evento',
        'city_id' => 'Cidade',
        'participants_estimated_qty' => 'Previsão participantes',
        'participants_confirmed_qty' => 'Confirmação participantes',
        'participants_refunds_amount' => 'Reembolso',
        'deleted_at' => 'Excluído'
    ];
    protected $revisionFormattedFields = [
        'date' => 'datetime:d/m/Y'
        ];

    protected $revisionNullString = 'nada';
    protected $revisionUnknownString = 'desconhecido';

    protected $fillable = [
        'date',
        'description',
        'meeting_type_id',
        'city_id',
        'participants_estimated_qty',
        'participants_confirmed_qty',
        'participants_refunds_amount'
    ];

    public function meeting_type()
    {
        return $this->belongsTo('SisCad\Entities\MeetingType');   
    }

    public function city()
    {
        return $this->belongsTo('SisCad\Entities\City');   
    }
}
