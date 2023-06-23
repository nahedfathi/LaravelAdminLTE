@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Companies') }}</h1>
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
                        NEW company
                 </div>
                 <div class="ml-5 my-4">
                        <a  href="{{ route('companies.create') }}" class="btn btn-primary">Create</a>
                  </div>
                  </div>
                    <div class="card">
                        <div class="card-body p-0">
                            <table id="my-table" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Logo</th>
                                <th>Website</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($companies as $company)
                                <tr>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->email }}</td>
                                    <td> <img src="{{ $company->logo }}"width="80px" height="80px" alt=""></td>
                                    <td>{{ $company->website }}</td>
                                    <td>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <a  href="{{ route('companies.edit',['id' => $company->id]) }}" class="btn btn-primary">Edit</a>
                                        </div>
                                        <div class="col-lg-6">
                                        <form action="{{ route('companies.delete', $company->id) }}" method="POST">
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
    {{ $companies->links() }}
@endsection
