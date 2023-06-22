@extends('layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <form method="POST" action="{{ route('employees.update', $employee->id) }}">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label for="first_name">First Name:</label>
                                    <input type="text" class="form-control" name="first_name" value="{{ $employee->first_name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last Name:</label>
                                    <input type="text" class="form-control" name="last_name" value="{{ $employee->last_name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="company_id">Company:</label>
                                    <select class="form-control" name="company_id" required>
                                        <option value="{{$employee->company->id}}">{{$employee->company->name}}</option>
                                        @foreach($companies as $company)
                                            <option value="{{ $company->id }}" >{{ $company->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" value="{{ $employee->email }}" name="email"  required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone:</label>
                                    <input type="text" class="form-control" value="{{ $employee->phone }}" name="phone"  required>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
            </div>
</div>
</div>
</div>
@endsection