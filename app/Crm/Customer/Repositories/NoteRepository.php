<?php

namespace Crm\Customer\Repositories;

use Crm\Base\BaseRepository\BaseRepositoryWithCustomerId;
use Crm\Customer\Models\note;

class NoteRepository extends BaseRepositoryWithCustomerId
{
    
    public function __construct(note $note)
    {
        $this->setModel($note);
    }





}
