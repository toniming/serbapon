<?php

namespace app;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class User extends Eloquent {
	protected $collection = 'serbapon';
	protected $primary_key = '_id';
}