<?php

namespace App\Repository\Worker;

use App\Contracts\BaseOpContract;

interface WorkerContract extends BaseOpContract
{
    function toGetByDepartment($departement_id);
}