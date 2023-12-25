<?php

namespace App\Repository\Worker;

use App\Models\Employe;

class WorkerRepo implements Workercontract
{
    public function toAdd(array $inputs)
    {
        $worker = Employe::create($inputs);

        return $worker;
    }

    public function toUpdate(array $inputs, $id)
    {
        $worker = $this->toGetById($id);

        foreach ($inputs as $property => $value)
            $worker->$property = $value;
        $worker->update();

        return $worker;
    }

    public function toDelete($id)
    {
        $worker = $this->toGetById($id);
        $worker->delete();

        return $worker;
    }

    public function toGetAll($n = 10)
    {
        $workers = Employe::paginate(10);

        return $workers;
    }

    public function toGetById($id)
    {
        $worker = Employe::findOrFail($id);

        return $worker;
    }

    public function toGetByDepartment($departement_id)
    {
        $workers = Employe::where('department_id', $departement_id)->get();

        return $workers;
    }
}
