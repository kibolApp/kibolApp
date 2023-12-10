<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DynamicModel extends Model
{
    protected $guarded = [];

    public function setTable($name)
    {
        $this->table = $name;
        return $this;
    }
}