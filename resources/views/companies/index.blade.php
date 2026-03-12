@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">

<h2>Companies</h2>

<a href="{{ route('companies.create') }}" class="btn btn-primary">
Add Company
</a>

</div>

<form method="GET" action="{{ route('companies.index') }}" class="mb-3">

<div class="row">

<div class="col-md-4">

<input 
type="text" 
name="search" 
class="form-control"
placeholder="Search company name..."
value="{{ request('search') }}">

</div>

<div class="col-md-3">

<button class="btn btn-primary">
Search
</button>

<a href="{{ route('companies.index') }}" class="btn btn-secondary">
Reset
</a>

</div>

</div>

</form>


<table class="table table-bordered table-striped">

<thead class="table-dark">

<tr>

<th>ID</th>
<th>Logo</th>
<th>Name</th>
<th>Email</th>
<th>Website</th>
<th width="200">Action</th>

</tr>

</thead>

<tbody>

@forelse($companies as $company)

<tr>

<td>{{ $company->id }}</td>

<td>

@if($company->logo)

<img 
src="{{ asset('storage/'.$company->logo) }}" 
width="50">

@endif

</td>

<td>{{ $company->name }}</td>

<td>{{ $company->email }}</td>

<td>{{ $company->website }}</td>

<td>

<a 
href="{{ route('companies.edit',$company->id) }}" 
class="btn btn-warning btn-sm">

Edit

</a>

<form 
action="{{ route('companies.destroy',$company->id) }}" 
method="POST" 
onsubmit="return confirmDelete()" 
style="display:inline">

@csrf
@method('DELETE')

<button 
type="submit" 
class="btn btn-danger btn-sm">

Delete

</button>

</form>

</td>

</tr>

@empty

<tr>

<td colspan="6" class="text-center">
No companies found
</td>

</tr>

@endforelse

</tbody>

</table>


{{ $companies->links('pagination::bootstrap-5') }}

@endsection