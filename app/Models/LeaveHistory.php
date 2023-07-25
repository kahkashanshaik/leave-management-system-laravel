<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveHistory extends Model
{
    use HasFactory;
    protected $table = 'leave_history';
    protected $fillable = ['user_id', 'emp_name', 'phone_no', 'emp_email', 'number_of_days', 'reason', 'from_date', 'to_date', 'status_number', 'status'];

    public static function scopeFetchLeaveByEmpId($query, $id)
    {
        $query->where('user_id', '=' , $id);
    }

}
