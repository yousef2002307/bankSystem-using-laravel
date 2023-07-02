<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserAcc;
class Branch extends Model
{
    use HasFactory;
    protected $primaryKey  = "branchId";
    
}
