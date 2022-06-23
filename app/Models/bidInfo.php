<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bidInfo extends Model
{
    use HasFactory;
    protected $table="bid_info";
    protected $primaryKey="bid";


    protected $fillable = [
        'bid',
        'startingAmount',
        'timePeriod',
        'submitTime',
        'fid',
        'pid'
    ];
}
