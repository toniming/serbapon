<?php
namespace App\Model\Web;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Transaction extends Eloquent
{
    protected $collection           = 'transaction';
    public $timestamps              = true;
    public $primaryKey              = '_id';
    
    protected $fillable             =   [
                                            'id_user',
                                            'id_nota',
                                            'date_buy',
                                            'sum_price',
                                            'desti_bank',
                                            'image',
                                            'bank',
                                            'name_send',
                                        ];
    /**
     * Timestamp field
     *
     * @var array
     */
    protected $dates                =   [
                                            'created_at'                    , 
                                            'updated_at'                    , 
                                            'date_buy'                    
                                        ];
    /**
     * Basic rule of database
     *
     * @var array
     */
    protected $rules                =   [
                                            'date_buy'                  => 'required|date',
                                        ];
    /**
     * Basic error message of rule
     *
     * @var array
     */
    protected $message              =   []; 
}