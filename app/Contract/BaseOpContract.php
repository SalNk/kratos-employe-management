<?php

namespace App\Contracts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface BaseOpContract{
    function toAdd(array $inputs):Model;
    function toUpdate(array $inputs, $id):Model;
    function toDelete($id):Model;
    function toGetAll($n=50);
    function toGetById($id):Model|null;
}
