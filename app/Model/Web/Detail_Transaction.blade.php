<?php
namespace App\Model\Web;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Detail_Transaction extends Eloquent
{
    protected $collection           = 'detail_transaction';
    public $timestamps              = true;
    public $primaryKey              = '_id';
    
    protected $fillable             =   [
                                            'id_user',
                                            'id_nota',
                                            'id_kupon',
                                            'quantity',
                                            'sub_price',
                                            
                                        ];
    /**
     * Timestamp field
     *
     * @var array
     */
    protected $dates                =   [
                                            'created_at'                    , 
                                            'updated_at'                    , 
                                            'deleted_at'                    ,
                                            'published_at'
                                        ];
    /**
     * Basic rule of database
     *
     * @var array
     */
    protected $rules                =   [
                                            'published_at'                  => 'required|date',
                                        ];
    /**
     * Basic error message of rule
     *
     * @var array
     */
    protected $message              =   []; 
}