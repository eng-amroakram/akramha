<?php

namespace App\Models;

use App\Traits\ModelHelper;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    use ModelHelper;

    protected $fillable = [
        "title",
        "charity_id",
        "user_id",
        "region_id",
        "city_id",
        "address",
        "time_receipt",
        "phone",
        "size",
        "type",
        "status",
    ];

    protected $casts = [
        "time_receipt" => "date",
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function charity()
    {
        return $this->belongsTo(User::class, 'charity_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id', 'id');
    }

    public function scopeFilters(Builder $builder, array $filters = [])
    {
        $filters = array_merge([
            'search' => '',
            'status' => null,
            'region_id' => null,
            'city_id' => null,
        ], $filters);

        $builder->when($filters['search'] != '', function ($query) use ($filters) {
            $query->where('name', 'like', '%' . $filters['search'] . '%');
        });

        $builder->when($filters['search'] == '' && $filters['status'] != null, function ($query) use ($filters) {
            $query->whereIn('status', $filters['status']);
        });

        $builder->when($filters['search'] == '' && $filters['region_id'] != null, function ($query) use ($filters) {
            $query->whereIn('region_id', $filters['region_id']);
        });

        $builder->when($filters['search'] == '' && $filters['city_id'] != null, function ($query) use ($filters) {
            $query->whereIn('city_id', $filters['city_id']);
        });
    }

    public function scopeGetRules(Builder $builder, $id = "")
    {
        return [

            "title" => ['required', 'string', 'max:225'],
            "user_id" => ['required', 'exists:users,id'],
            "region_id" => ['required', 'exists:regions,id'],
            "city_id" => ['required', 'exists:cities,id'],
            "address" => ['required', 'string', 'max:225'],
            "time_receipt" => ['required'],
            "phone" => ['required', 'string', 'max:10'],
            "size" => ['required', 'in:large,medium,small'],
            "type" => ['required', 'in:sacrifices,buffet'],
            "status" => ['required', 'in:pending,progress,completed,canceled'],
        ];
    }

    public function scopeGetMessages()
    {
        return [
            "title.required" => "ادخل عنوان الطلب",
            "region_id.required" => "اختر المنطقة",
            "city_id.required" => "اختر المدينة",
            "address.required" => "ادخل عنوان التوصيل",
            "time_receipt.required" => "ادخل وقت التوصيل",
            "phone.required" => "ادخل رقم التواصل",
        ];
    }

    public function scopeStore(Builder $builder, array $data = [])
    {
        $model = $builder->create($data);
        if ($model) {
            return true;
        }
        return false;
    }

    public function scopeUpdateModel(Builder $builder, $data, $id)
    {
        $model = $builder->find($id);
        if ($model) {
            $model = $model->update($data);
            return true;
        }
        return false;
    }
}
