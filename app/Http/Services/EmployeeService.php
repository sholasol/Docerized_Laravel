<?php

namespace App\Http\Services;

class EmployeeService {

    public $employeeTypeAData = [];
    public $employeeTypeBData = [];
    public $employeeTypeCData = [];

    /***
     * Get employee type 
     */

    public function getEmployeeTypeA($employees)
    {
        $data = [];
        //get employee with salary less than 60k
        foreach($employees as $emp){
            if((int) $emp->salary < 60000)
            {
                $data['id'] = $emp->id;
                $data['employee_id'] = $emp->employee_id;
                $data['employee_name'] = $emp->employee_name;
                $data['age'] = $emp->age;
                $data['join_date'] = $emp->join_date;
                $data['salary'] = $emp->salary;
                $data['bonus'] = $emp->bonus;
                $data['medical_claim'] = $emp->medical_claim;
                $data['allowances'] = $emp->allowances;
                $data['leave_payment'] = $emp->leave_payment;

                $data['totalExpense'] = $emp->salary + 
                                        $emp->bonus +
                                        $emp->medical_claim +
                                        $emp->allowances +
                                        $emp->leave_payment;
                
                $this->getEmployeeTypeA[] = $data;

            }
        } 

        return $this->getEmployeeTypeA;
    }

    public function getEmployeeTypeB($employees)
    {
        //get employee with salary more than 60k
        foreach($employees as $emp){
            if((int) $emp->salary > 60000 && $emp->salary < 100000)
            {
                $data['id'] = $emp->id;
                $data['employee_id'] = $emp->employee_id;
                $data['employee_name'] = $emp->employee_name;
                $data['age'] = $emp->age;
                $data['join_date'] = $emp->join_date;
                $data['salary'] = $emp->salary;
                $data['bonus'] = $emp->bonus;
                $data['medical_claim'] = $emp->medical_claim;
                $data['allowances'] = $emp->allowances;
                $data['leave_payment'] = $emp->leave_payment;

                $data['totalExpense'] = $emp->salary + 
                                        $emp->bonus +
                                        $emp->medical_claim +
                                        $emp->allowances +
                                        $emp->leave_payment;
                
                $this->getEmployeeTypeB[] = $data;

            }
        } 

        return $this->getEmployeeTypeB;
    }

    public function getEmployeeTypeC($employees)
    {
        //get employee with salary less than 60k
        foreach($employees as $emp){
            if((int) $emp->salary > 100000)
            {
                $data['id'] = $emp->id;
                $data['employee_id'] = $emp-> employee_id;
                $data['employee_name'] = $emp->employee_name;
                $data['age'] = $emp->age;
                $data['join_date'] = $emp->join_date;
                $data['salary'] = $emp->salary;
                $data['bonus'] = $emp->bonus;
                $data['medical_claim'] = $emp->medical_claim;
                $data['allowances'] = $emp->allowances;
                $data['leave_payment'] = $emp->leave_payment;

                $data['totalExpense'] = $emp->salary + 
                                        $emp->bonus +
                                        $emp->medical_claim +
                                        $emp->allowances +
                                        $emp->leave_payment;
                
                $this->getEmployeeTypeC[] = $data;

            }
        } 

        return $this->getEmployeeTypeC;
    }
}