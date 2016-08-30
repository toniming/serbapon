<?php
namespace App\Model\Web;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Chart extends Eloquent
{
    protected $collection           = 'chart';
    public $timestamps              = true;
    public $primaryKey              = '_id';
    
    protected $fillable             =   [
                                            'id_user',
                                            'title',
                                            'images',
                                            'price',
                                            'quantity',
                                            'sum_price',
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