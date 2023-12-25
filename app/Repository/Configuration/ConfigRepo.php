<?php

namespace App\Repository\Configuration;

use App\Models\Configuration;

class DepartmentRepo implements ConfigContract
{
    public function toAdd(array $inputs)
    {
        $config = Configuration::create($inputs);

        return $config;
    }

    public function toUpdate(array $inputs, $id)
    {
        $config = $this->toGetById($id);

        foreach ($inputs as $property => $value)
            $config->$property = $value;
        $config->update();

        return $config;
    }

    public function toDelete($id)
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

    public function toGetById($id)
    {
        $config = Configuration::findOrFail($id);

        return $config;
    }
}
