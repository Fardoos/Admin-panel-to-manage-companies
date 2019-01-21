@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title m-b-0">employees</h5>
                    <a href="/employees/create" type="button" class="btn btn-primary btn-sm">add new</a>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th>First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Company</th>
                        <th>action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($employees->isNotEmpty())
                        @foreach($employees as $employee)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$employee->emp_first_name}}</td>
                                <td>{{$employee->emp_last_name}}</td>
                                <td>{{$employee->emp_email}}</td>
                                <td>{{$employee->emp_phone}}</td>
                                <td>{{$employee->company->comp_name}}</td>
                                <td>
                                    <a href="/employees/{{$employee->emp_id}}/edit" type="button" class="btn btn-cyan btn-sm">Edit</a>
                                    <form action="{{url('employees', [$employee->emp_id])}}" method="POST">
                                        {{method_field('DELETE')}}
                                        {!! csrf_field() !!}
                                        <input type="submit" class="btn btn-danger btn-sm" value="Delete"/>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr> <td colspan="6">No employees added yet.</td></tr>
                    @endif


                    </tbody>
                </table>

            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    {{ $employees->links() }}


                </ul>
            </nav>
        </div>
    </div>

@endsection