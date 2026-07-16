<?php

namespace App\Models;

use App\Enums\Gender;
use Database\Factories\PatientFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'birth_place', 'birth_date', 'gender', 'phone', 'address'])]
class Patient extends Model
{
    /** @use HasFactory<PatientFactory> */
    use HasFactory;

    protected function casts(): array
    {
        return [
            'gender' => Gender::class,
            'birth_date' => 'date',
        ];
    }

    protected function genderLabel(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->gender?->label(),
        );
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }
}
