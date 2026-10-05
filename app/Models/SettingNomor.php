<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['tahun', 'nomor_terakhir'])]
class SettingNomor extends Model
{
}

