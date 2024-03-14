<?php

namespace Modules\Website\App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{

  protected $table = 'media';
  public $timestamps = true;

  public static $types = ['video', 'audio', 'image'];
}
