@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">

<h2>Employees</h2>

<a href="{{ route('employees.create') }}" class="btn btn-primary">
Add Employee
</a>

</div>

<form method="GET" action="{{ route('employees.index') }}" class="mb-3">

<div class="row">

<div class="col-md-3">

<input 
type="text"
name="name"
class="form-control"
placeholder="Search employee name..."
value="{{ request('name') }}">

</div>

<div class="col-md-3">

<select name="company" class="form-control">

<option value="">All Companies</option>

@foreach($companies as $company)

<option 
value="{{ $company->id }}"
{{ request('company') == $company->id ? 'selected' : '' }}>

{{ $company->name }}

</option>

@endforeach

</select>

</div>

<div class="col-md-3">

<button class="btn btn-primary">
Filter
</button>

<a href="{{ route('employees.index') }}" class="btn btn-secondary">
Reset
</a>

</div>

</div>

</form>


<table class="table table-bordered table-striped">

<thead class="table-dark">

<tr>

<th>ID</th>
<th>Name</th>
<th>Company</th>
<th>Email</th>
<th>Phone</th>
<th width="200">Action</th>

</tr>

</thead>

<tbody>

@forelse($employees as $employee)

<tr>

<td>{{ $employee->id }}</td>

<td>
{{ $employee->first_name }} {{ $employee->last_name }}
</td>

<td>{{ $employee->company->name }}</td>

<td>{{ $employee->email }}</td>

<td>{{ $employee->phone }}</td>

<td>

<a 
href="{{ route('employees.edit',$employee->id) }}" 
class="btn btn-warning btn-sm">

Edit

</a>

<form 
action="{{ route('employees.destroy',$employee->id) }}" 
method="POST" 
onsubmit="return confirmDelete()" 
style="display:inline">

@csrf
@method('DELETE')

<button class="btn btn-danger btn-sm">
Delete
</button>

</form>

</td>

</tr>

@empty

<tr>

<td colspan="6" class="text-center">
No employees found
</td>

</tr>

@endforelse

</tbody>

</table>

{{ $employees->links('pagination::bootstrap-5') }}

@endsection