<?php


namespace SoftDeliveroo\Database\Repositories;

use SoftDeliveroo\Database\Models\Address;

class AddressRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model()
    {
        return Address::class;
    }
}
