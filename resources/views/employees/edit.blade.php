@extends('layouts.app')

@section('content')

<h2>Edit Employee</h2>

@if ($errors->any())
<div class="alert alert-danger">
<ul class="mb-0">
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif

<form method="POST" action="{{ route('employees.update',$employee->id) }}">

@csrf
@method('PUT')

<div class="mb-3">
<label>First Name</label>
<input type="text" name="first_name" value="{{ $employee->first_name }}" class="form-control">
</div>

<div class="mb-3">
<label>Last Name</label>
<input type="text" name="last_name" value="{{ $employee->last_name }}" class="form-control">
</div>

<div class="mb-3">
<label>Company</label>

<select name="company_id" class="form-control">

@foreach($companies as $company)

<option value="{{ $company->id }}"
{{ $employee->company_id == $company->id ? 'selected' : '' }}>

{{ $company->name }}

</option>

@endforeach

</select>

</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" value="{{ $employee->email }}" class="form-control">
</div>

<div class="mb-3">
<label>Phone</label>
<input type="text" name="phone" value="{{ $employee->phone }}" class="form-control">

</div>

<button class="btn btn-primary">Update</button>

<a href="{{ route('employees.index') }}" class="btn btn-secondary">
Cancel
</a>

</form>

@endsection