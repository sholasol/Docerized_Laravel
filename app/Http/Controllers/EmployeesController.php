<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\EmployeeService;

class EmployeesController extends Controller
{
    //main page view
    public  function index()
    {
        return view('index');
    }

    //dashboard

    public function home()
    {
        try {
            $data = [];

            if(Auth::check())
            {
                $employees = Employee::all();

                if(empty($employees->toArray()))
                {
                    return [];
                }
                //employees where salary is less than 60k, Type A
                $employeeTypeA = (new EmployeeService)->getEmployeeTypeA($employees);

                //employees where salary is more than 60k and less than 100K, Type B
                $employeeTypeB = (new EmployeeService)->getEmployeeTypeB($employees);

                //employees where salary is more than 100k, Type C
                $employeeTypeC = (new EmployeeService)->getEmployeeTypeC($employees);

                $data = [
                    'typeA' => $employeeTypeA,
                    'typeB' => $employeeTypeB,
                    'typeC' => $employeeTypeC
                ];

                return view('home')->with('data', $data);
            }
            return $data;
            
        } catch (Exception $e) {
           echo $e->getMessage();
        }

        
    }
}
