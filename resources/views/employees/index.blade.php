@extends('layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Employees') }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                <div class="row">
                  <div class="ml-5 my-4">
                        NEW employee
                 </div>
                 <div class="ml-5 my-4">
                        <a  href="{{ route('employees.create') }}" class="btn btn-primary">Create</a>
                  </div>
                  </div>
                    <div class="card">
                        <div class="card-body p-0">
                            <table id="my-table" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Company</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <td>{{ $employee->first_name }}</td>
                                    <td>{{ $employee->last_name }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->phone }}</td>
                                    <td>{{ $employee->company->name }}</td>
                                    <td>
                                        <div class="row">
                                        <div class="col-lg-6">
                                            <a href="{{ route('employees.edit',['id' => $employee->id]) }}" class="btn btn-primary">Edit</a>
                                        </div>
                                        <div class="col-lg-6">
                                        <form action="{{ route('employees.delete', $employee->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                           
                            </tbody>
                           
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{ $employees->links() }}
@endsection
