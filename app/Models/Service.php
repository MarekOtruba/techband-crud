<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'unitprice',
        'billing_period_id',
        'start_date',
        'end_date',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'unitprice' => 'float',
        'billing_period_id' => 'integer',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:125|string',
        'unitprice' => 'required|numeric',
        'billing_period_id' => 'required|integer',
        'start_date' => 'required|date',
        'end_date' => 'nullable|date',
    ];

     /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'name' => null,
        'unitprice' => 0.0,
        'billing_period_id' => null,
        'start_date' => null,
        'end_date' => null,
    ];

    /**
     * @return BelongsTo
     **/
    public function billing_period()
    {
        return $this->belongsTo(BillingPeriod::class, 'billing_period_id', 'id');
    }

    public static function model(){
        return new Service();
    }

    public function calculateMonthlyPrice($date){
        $services = Service::whereDate('start_date', '<=', $date->format('Y-m-d'))
            ->get()
            ->all();

        $sum = 0;

        foreach($services as $service){
            $end_for = null;
            if(!empty($service->end_date)){
                $end_for = $service->start_date->startOfMonth()->diffInMonths($service->end_date->startOfMonth());
            }

            if(empty($end_for) || $date->lessThan($service->start_date->addMonths($end_for)->endOfDay())){
                $diff = $service->start_date->startOfMonth()->diffInMonths((clone $date)->startOfMonth());

                if($date->lessThan($service->start_date->addMonths($diff)->endOfDay())){
                    if($diff == 0 || ($diff >= $service->billing_period->months && $diff % $service->billing_period->months == 0)){
                        $sum += $service->unitprice;
                    }
                }
            }
        }
        return $sum;
    }
}
