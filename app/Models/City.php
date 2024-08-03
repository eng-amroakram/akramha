<?php

namespace App\Models;

use App\Traits\ModelHelper;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    use ModelHelper;

    protected $fillable = [
        "name",
        "region_id",
        "status",
    ];

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function scopeFilters(Builder $builder, array $filters = [])
    {
        $filters = array_merge([
            'search' => '',
            'status' => null,
            'region_id' => null
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
    }

    public function scopeGetRules(Builder $builder, $id = "")
    {
        return [
            'name' => ['required', 'string', 'max:255', "unique:cities,name,$id"],
            'region_id' => ['required', 'exists:regions,id'],
            'status' => ['required', 'string', 'in:active,inactive'],
        ];
    }

    public function scopeGetMessages()
    {
        return [
            "name.required" => "ادخل الاسم",
            "name.unique" => "المدينة موجودة بالفعل",
            "region_id.required" => "اختر المنطقة التابعة لها المدينة",
            "status.required" => "اختر حالة المدينة",
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
