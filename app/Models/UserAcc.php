<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Branch;
class UserAcc extends Model
{
    use HasFactory;
    protected $table = "useraccounts";
    public function users()
    {
        return $this->belongsTo(Branch::class, 'branch_id','branchId');
    }
}
