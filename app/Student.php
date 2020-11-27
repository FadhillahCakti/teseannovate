<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Student extends Model
{
    protected $table = "t_student";
    protected $fillable = ['name','phone_number','email'];
    protected $dates = ['create_date', 'modify_date'];
}