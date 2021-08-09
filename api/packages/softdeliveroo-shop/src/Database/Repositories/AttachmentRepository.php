<?php


namespace SoftDeliveroo\Database\Repositories;


use SoftDeliveroo\Database\Models\Attachment;

class AttachmentRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model()
    {
        return Attachment::class;
    }
}
