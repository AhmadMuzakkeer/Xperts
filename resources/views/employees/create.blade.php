@extends('layouts.app')

@section('content')

<h2>Create Employee</h2>

@if ($errors->any())
<div class="alert alert-danger">
<ul class="mb-0">
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif

<form method="POST" action="{{ route('employees.store') }}">

@csrf

<div class="mb-3">
<label>First Name</label>
<input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control">
</div>

<div class="mb-3">
<label>Last Name</label>
<input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control">
</div>

<div class="mb-3">
<label>Company</label>

<select name="company_id" class="form-control">

@foreach($companies as $company)

<option value="{{ $company->id }}" 
{{ old('company_id') == $company->id ? 'selected' : '' }}>

{{ $company->name }}

</option>

@endforeach

</select>

</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" value="{{ old('email') }}" class="form-control">
</div>

<div class="mb-3">
<label>Phone</label>
<input type="text" name="phone" value="{{ old('phone') }}" class="form-control">
</div>

<button class="btn btn-success">Save</button>

<a href="{{ route('employees.index') }}" class="btn btn-secondary">
Cancel
</a>

</form>

@endsection