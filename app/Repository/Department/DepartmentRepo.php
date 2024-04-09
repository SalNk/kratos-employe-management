<?php

namespace App\Repository\Department;

use App\Models\Departement;
use Illuminate\Database\Eloquent\Model;
use App\Repository\Department\DepartmentContract;

class DepartmentRepo implements DepartmentContract
{
    public function toAdd(array $inputs): Model
    {
        $department = Departement::create($inputs);

        return $department;
    }

    public function toUpdate(array $inputs, $id): Model
    {
        $department = $this->toGetById($id);

        foreach ($inputs as $property => $value)
            $department->$property = $value;
        $department->update();

        return $department;
    }

    public function toDelete($id): Model
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

    public function toGetById($id): Model|null
    {
        $department = Departement::findOrFail($id);

        return $department;
    }
}
