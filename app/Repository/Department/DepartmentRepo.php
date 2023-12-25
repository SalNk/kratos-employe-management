<?php

namespace App\Repository\Departement;

use App\Models\Departement;

class DepartmentRepo implements DepartmentContract
{
    public function toAdd(array $inputs)
    {
        $department = Departement::create($inputs);

        return $department;
    }

    public function toUpdate(array $inputs, $id)
    {
        $department = $this->toGetById($id);

        foreach ($inputs as $property => $value)
            $department->$property = $value;
        $department->update();

        return $department;
    }

    public function toDelete($id)
    {
        $department = $this->toGetById($id);
        $department->delete();

        return $department;
    }

    public function toGetAll($n = 10)
    {
        $departments = Departement::paginate(10);

        return $departments;
    }

    public function toGetById($id)
    {
        $department = Departement::findOrFail($id);

        return $department;
    }
}
