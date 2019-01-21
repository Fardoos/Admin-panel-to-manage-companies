@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title m-b-0">Companies</h5>
                    <a href="/companies/create" type="button" class="btn btn-primary btn-sm">add new</a>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th>logo</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">websit</th>
                        <th>action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($companies->isNotEmpty())
                        @foreach($companies as $company)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td><img src="{{!empty($company->comp_logo)?'/storage/' . $company->comp_logo:""}}" width="100px" height="100px"></td>
                                <td>{{$company->comp_name}}</td>
                                <td>{{$company->comp_email}}</td>
                                <td>{{$company->comp_website}}</td>
                                <td>
                                    <a href="/companies/{{$company->comp_id}}/edit" type="button" class="btn btn-cyan btn-sm">Edit</a>
                                    <form action="{{url('companies', [$company->comp_id])}}" method="POST">
                                        {{method_field('DELETE')}}
                                        {!! csrf_field() !!}
                                        <input type="submit" class="btn btn-danger btn-sm" value="Delete"/>
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                        @else
                        <tr> <td colspan="6">No company added yet.</td></tr>
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
                    {{ $companies->links() }}


                </ul>
            </nav>
        </div>
    </div>

@endsection