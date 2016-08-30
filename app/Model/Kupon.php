<?php
namespace App\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Kupon extends Eloquent
{
    protected $collection           = 'kupon';
    public $timestamps              = true;
    public $primaryKey              = '_id';
    
    protected $fillable             =   [
                                            'title',
                                            'image',
                                            'location',
                                            'description',
                                            'sell',
                                            'old_price',
                                            'price',
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
                                            'price'                         => 'required|int',
                                        ];
    /**
     * Basic error message of rule
     *
     * @var array
     */
    protected $message              =   []; 
}