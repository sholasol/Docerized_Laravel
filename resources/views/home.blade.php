@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-2">
            <div class="card">
                <div class="card-header">{{ __('Type A Employees with Earnings less than 60K') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="col-md-12">
                        @if(isset($data['typeA']))
                        <table id="" class="table table-striped display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Employee ID</th>
                                    <th>Age</th>
                                    <th>Salary</th>
                                    <th>Bonus</th>
                                    <th>Med Benefits</th>
                                    <th>Allowances</th>
                                    <th>Leave Expense</th>
                                    <th>Total</th>
                                    <th>Joined</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($data['typeA'] as $typeA)
                               <tr>
                                    <td>{{$typeA['employee_id']}}</td>
                                    <td>{{$typeA['employee_name']}}</td>
                                    <td>{{$typeA['age']}}</td>
                                    <td>{{$typeA['salary']}}</td>
                                    <td>{{$typeA['bonus']}}</td>
                                    <td>{{$typeA['medical_claim']}}</td>
                                    <td>{{$typeA['allowances']}}</td>
                                    <td>{{$typeA['leave_payment']}}</td>
                                    <td>{{$typeA['totalExpense']}}</td>
                                    <td>{{$typeA['join_date']}}</td>
                                </tr>
                               @endforeach
                            </tbody> 
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr>
                            </tfoot>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 mb-2">
            <div class="card">
                <div class="card-header">{{ __('Type B Employees with Earnings more than 60k and less than 100k') }}</div>

                <div class="card-body">

                    <div class="col-md-12">
                        @if(isset($data['typeB']))
                        <table id="" class="table table-striped display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Employee ID</th>
                                    <th>Age</th>
                                    <th>Salary</th>
                                    <th>Bonus</th>
                                    <th>Med Benefits</th>
                                    <th>Allowances</th>
                                    <th>Leave Expense</th>
                                    <th>Total</th>
                                    <th>Joined</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($data['typeB'] as $typeB)
                               <tr>
                                    <td>{{$typeB['employee_id']}}</td>
                                    <td>{{$typeB['employee_name']}}</td>
                                    <td>{{$typeB['age']}}</td>
                                    <td>{{$typeB['salary']}}</td>
                                    <td>{{$typeB['bonus']}}</td>
                                    <td>{{$typeB['medical_claim']}}</td>
                                    <td>{{$typeB['allowances']}}</td>
                                    <td>{{$typeB['leave_payment']}}</td>
                                    <td>{{$typeB['totalExpense']}}</td>
                                    <td>{{$typeB['join_date']}}</td>
                                </tr>
                               @endforeach
                            </tbody> 
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr>
                            </tfoot>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Type C Employees with Earnings More than 100k') }}</div>

                <div class="card-body">

                    <div class="col-md-12">
                        @if(isset($data['typeC']))
                        <table id="" class="table table-striped display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Employee ID</th>
                                    <th>Age</th>
                                    <th>Salary</th>
                                    <th>Bonus</th>
                                    <th>Med Benefits</th>
                                    <th>Allowances</th>
                                    <th>Leave Expense</th>
                                    <th>Total</th>
                                    <th>Joined</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($data['typeC'] as $typeC)
                               <tr>
                                    <td>{{$typeC['employee_id']}}</td>
                                    <td>{{$typeC['employee_name']}}</td>
                                    <td>{{$typeC['age']}}</td>
                                    <td>{{$typeC['salary']}}</td>
                                    <td>{{$typeC['bonus']}}</td>
                                    <td>{{$typeC['medical_claim']}}</td>
                                    <td>{{$typeC['allowances']}}</td>
                                    <td>{{$typeC['leave_payment']}}</td>
                                    <td>{{$typeC['totalExpense']}}</td>
                                    <td>{{$typeC['join_date']}}</td>
                                </tr>
                               @endforeach
                            </tbody> 
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr>
                            </tfoot>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        new DataTable('table.display', {
            pageLength: 10,
            lengthMenu: [5, 10, 25, 50, 100] 
        });
    </script>
@endsection
