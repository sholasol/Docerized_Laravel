<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use App\Http\Services\EmployeeService;
use App\Http\Controllers\EmployeesController;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeeTest extends TestCase
{
   use RefreshDatabase; //clean and refresh the database
    /**
     * A basic unit test example.
     */
    public function test_if_user_not_logged_in(): void
    {
      $returnedValues = (new EmployeesController)->home();
      $this->assertEmpty($returnedValues);
        //$this->assertTrue(true);

        //Alternative method
        //$this->assertEquals([], $returnedValues);

    }

    /**
     * Check for type A data is returning from service function
     */

    public function test_get_employee_type_a_not_empty()
    {
        $employeea = Employee::factory(200)->create([ //passing special values instead of the default
            'join_date' => now()->toDateString(),
        ]);
        $response = (new EmployeeService)->getEmployeeTypeA($employeea);

        $this->assertNotEmpty($response);
    }

    /**
     * Check for type B data is returning from service function
     */

     public function test_get_employee_type_b_not_empty()
     {
         $employeea = Employee::factory(200)->create([ //passing special values instead of the default
             'join_date' => now()->toDateString(),
         ]);
         $response = (new EmployeeService)->getEmployeeTypeB($employeea);
 
         $this->assertNotEmpty($response);
     }

     /**
     * Check for type C data is returning from service function
     */

    public function test_get_employee_type_c_not_empty()
    {
        $employeea = Employee::factory(200)->create([ //passing special values instead of the default
            'join_date' => now()->toDateString(),
        ]);
        $response = (new EmployeeService)->getEmployeeTypeC($employeea);

        $this->assertNotEmpty($response);
    }

    /**
     * Test if the employee database get to the dashboard  //home page
     * To do this
     * Create new user
     * log in the user
     * Hash the password, use 1234567 so that we can know the password
     */

     public function test_if_user_logged_in_and_dashboard_gets_employee_data()
     {
        //create useer
        $user = User::factory()->create([
            'password' => Hash::make('1234567'),
        ]);
        //login the user
        $response = $this->post('login', [
            'email' => $user->email,
            'password' => '1234567',
        ]);

        //if logged in check
        $response->assertRedirect('/home');

        $employees = Employee::factory(200)->create([ //passing special values instead of the default
            'join_date' => now()->toDateString(),
        ]);

        $employeeTypeAData = (new EmployeeService)->getEmployeeTypeA($employees);
        $employeeTypeBData = (new EmployeeService)->getEmployeeTypeB($employees);
        $employeeTypeCData = (new EmployeeService)->getEmployeeTypeC($employees);

        $data = [
            'typeA' => $employeeTypeAData,
            'typeB' => $employeeTypeBData,
            'typeC' => $employeeTypeCData
        ];

        //get data from dashboard

       $res =  $this->get(route('home'));
        
       //check, if the data that get to dashboard is the same 
       $this->assertEquals(array_keys($data), array_keys($res['data']));

     }

     public function test_check_if_data_displayed_correctly_employee_dashboard()
     {
         //create useer
         $user = User::factory()->create([
            'password' => Hash::make('1234567'),
        ]);
        //login the user
        $response = $this->post('login', [
            'email' => $user->email,
            'password' => '1234567',
        ]);

        //if logged in check
        $response->assertRedirect('/home');

        $employees = Employee::factory(200)->create([ //passing special values instead of the default
            'join_date' => now()->toDateString(),
        ]);

        $employeeTypeAData = (new EmployeeService)->getEmployeeTypeA($employees);
        $employeeTypeBData = (new EmployeeService)->getEmployeeTypeB($employees);
        $employeeTypeCData = (new EmployeeService)->getEmployeeTypeC($employees);

        $data = [
            'typeA' => $employeeTypeAData,
            'typeB' => $employeeTypeBData,
            'typeC' => $employeeTypeCData
        ];

        $employeeTypeData = [];

        //get one employee from each type A, B, C

        foreach($employeeTypeAData as $empA)
        {
            $employeeTypeData['type_a'] = $empA['employee_name'];
        }

        foreach($employeeTypeBData as $empB)
        {
            $employeeTypeData['type_b'] = $empB['employee_name'];
        }

        foreach($employeeTypeCData as $empC)
        {
            $employeeTypeData['type_c'] = $empC['employee_name'];
        }

        //check if the data matches
        //get data from dashboard

        $response = $this->get(route('home'));

    

        $this->assertTrue(collect($response['data']['typeA'])->contains('employee_name', $employeeTypeData['type_a']));
        $this->assertTrue(collect($response['data']['typeB'])->contains('employee_name', $employeeTypeData['type_b']));
        $this->assertTrue(collect($response['data']['typeC'])->contains('employee_name', $employeeTypeData['type_c']));
     }
}
