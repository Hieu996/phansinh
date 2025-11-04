<?php

namespace App\Livewire\Manager\Department;

use Livewire\Component;
use App\Models\Department;

class Departments extends Component
{
    public function render()
    {
        $departments = Department::all();
        
        return view('livewire.manager.department.departments', [
            'departments' => $departments,
        ]);
    }

    public function addDepartment()
    {
        $this->dispatch('addDepartment');
    }

    public function editDepartment($departmentId)
    {
        $this->dispatch('editDepartment', $departmentId);
    }
}
