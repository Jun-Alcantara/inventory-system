<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Equipment extends Model
{
    use HasFactory;

    protected $table = "equipments";

    protected $fillable = ['asset_number', 'serial_number', 'equipment_type_id', 'manufacturer', 'year_model', 'description', 'equipment_department_id', 'equipment_status_id', 'created_by'];

    public function type(): BelongsTo
    {
        return $this->belongsTo(EquipmentType::class, 'equipment_type_id');
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(EquipmentDepartment::class, 'equipment_department_id');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(EquipmentStatus::class, 'equipment_status_id');
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
