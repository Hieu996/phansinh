<?php

namespace App\Livewire\Manager\Department;


use Flux\Flux;
use Livewire\Component;
use App\Models\Department;
use Livewire\Attributes\On;

class ActionsDepartment extends Component
{

    public $isEditMode = false;
    public $name;
    public $departmentId;

    public function render()
    {
        return view('livewire.manager.department.actions-department');
    }

    #[On('addDepartment')]
    public function addDepartment()
    {

        $this->resetErrorBag();

        $this->name = '';



        $this->isEditMode = false;
        Flux::modal('actions-department')->show();
    }

    public function createDepartment()
    {

        //dd($this->all());

        $this->validate([
            'name' => 'required|string|max:255|unique:departments,name',
        ]);

        // Logic to create a new department
        Department::create(['name' => $this->name]);

        $this->redirectRoute('admin.manager.departments');
    }

    #[On('editDepartment')]
    public function editDepartment($departmentId)
    {

        $this->resetErrorBag();

        $department = Department::findOrFail($departmentId);

        $this->name = $department->name;
        $this->departmentId = $department->id;

        $this->isEditMode = true;

        Flux::modal('actions-department')->show();
    }

    public function updateDepartment()
    {
        $this->validate([
            'name' => 'required|string|max:255|unique:departments,name,' . $this->departmentId,
        ]);

        $department = Department::findOrFail($this->departmentId);
        $department->update(['name' => $this->name]);

        // $department->delete();

        $this->redirectRoute('admin.manager.departments');
    }

    //delete department
    // public function deleteDepartment($departmentId)
    // {
    //     $department = Department::findOrFail($departmentId);
    //     $this-departmentId = $department->id;
    //     Flux::modal('delete-department')->show();


    //deltee cofm
     //$department = Department::findOrFail($this-departmentId);
     // $department->delete();
}
