<?php


namespace SoftDeliveroo\Database\Repositories;

use SoftDeliveroo\Database\Models\Settings;

class SettingsRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model()
    {
        return Settings::class;
    }
}
