@extends('layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ $company->name }}" id="name" name="name">
                        @if ($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ $company->email }}" id="email" name="email">
                        @if ($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="logo">Logo:</label>
                        <input type="file" class="form-control {{ $errors->has('logo') ? ' is-invalid' : '' }}" id="image" name="logo">
                        @if ($errors->has('logo'))
                            <div class="invalid-feedback">
                                {{ $errors->first('logo') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="website">Website:</label>
                        <input type="text" class="form-control {{ $errors->has('website') ? ' is-invalid' : '' }}" value="{{ $company->website }}" id="website" name="website">
                        @if ($errors->has('website'))
                            <div class="invalid-feedback">
                                {{ $errors->first('website') }}
                            </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
</div>
</div>
</div>
</div>
@endsection