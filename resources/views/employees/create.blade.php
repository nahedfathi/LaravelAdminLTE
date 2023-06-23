@extends('layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <form method="POST" action="{{ route('employees.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="first_name">First Name:</label>
                                    <input type="text" class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name"  >
                                    @if ($errors->has('first_name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('first_name') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last Name:</label>
                                    <input type="text" class="form-control {{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name"  >
                                    @if ($errors->has('last_name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('last_name') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="company_id">Company:</label>
                                    <select class="form-control {{ $errors->has('company_id') ? ' is-invalid' : '' }}" name="company_id" >
                                        <option value="">Select a company</option>
                                        @foreach($companies as $company)
                                            <option value="{{ $company->id }}" {{$company->id}}>{{ $company->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('company_id'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('company_id') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"  >
                                    @if ($errors->has('email'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone:</label>
                                    <input type="text" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone"  >
                                    @if ($errors->has('phone'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('phone') }}
                                        </div>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary">Create Employee</button>
                            </form>
            </div>
</div>
</div>
</div>
@endsection