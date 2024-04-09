<?php

namespace App\Repository\Configuration;

use App\Models\Configuration;
use Illuminate\Database\Eloquent\Model;

class DepartmentRepo implements ConfigurationContract
{
    public function toAdd(array $inputs): Model
    {
        $config = Configuration::create($inputs);

        return $config;
    }

    public function toUpdate(array $inputs, $id): Model
    {
        $config = $this->toGetById($id);

        foreach ($inputs as $property => $value)
            $config->$property = $value;
        $config->update();

        return $config;
    }

    public function toDelete($id): Model
    {
        $config = $this->toGetById($id);
        $config->delete();

        return $config;
    }

    public function toGetAll($n = 10)
    {
        $configs = Configuration::paginate(10);

        return $configs;
    }

    public function toGetById($id):Model|null
    {
        $config = Configuration::findOrFail($id);

        return $config;
    }
}
