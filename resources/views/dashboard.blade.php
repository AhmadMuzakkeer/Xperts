@extends('layouts.app')

@section('content')

<h2 class="mb-4">Dashboard</h2>

<div class="row">

<div class="col-md-6">

<div class="card text-white bg-primary mb-3">

<div class="card-body">

<h5 class="card-title">Total Companies</h5>

<h2>{{ $companiesCount }}</h2>

</div>

</div>

</div>

<div class="col-md-6">

<div class="card text-white bg-success mb-3">

<div class="card-body">

<h5 class="card-title">Total Employees</h5>

<h2>{{ $employeesCount }}</h2>

</div>

</div>

</div>

</div>


<h4 class="mt-4">Latest Employees</h4>

<table class="table table-bordered">

<thead class="table-dark">

<tr>
<th>Name</th>
<th>Company</th>
<th>Email</th>
</tr>

</thead>

<tbody>

@foreach($latestEmployees as $employee)

<tr>

<td>
{{ $employee->first_name }} {{ $employee->last_name }}
</td>

<td>
{{ $employee->company->name }}
</td>

<td>
{{ $employee->email }}
</td>

</tr>

@endforeach

</tbody>

</table>


<h4 class="mt-5">Companies & Employees</h4>

@foreach($companies as $company)

<div class="card mb-3">

<div class="card-header bg-dark text-white">
<strong>{{ $company->name }}</strong>
</div>

<div class="card-body">

@if($company->employees->count() > 0)

<table class="table table-bordered">

<thead class="table-light">

<tr>
<th>Employee Name</th>
<th>Email</th>
<th>Phone</th>
</tr>

</thead>

<tbody>

@foreach($company->employees as $employee)

<tr>

<td>
{{ $employee->first_name }} {{ $employee->last_name }}
</td>

<td>{{ $employee->email }}</td>
<td>{{ $employee->phone }}</td>

</tr>

@endforeach

</tbody>

</table>

@else

<p>No employees found for this company.</p>

@endif

</div>

</div>

@endforeach


<div class="mt-3">
{{ $companies->links('pagination::bootstrap-5') }}
</div>


<h4 class="mt-5">Company vs Employees</h4>

<canvas id="chart"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('chart');

new Chart(ctx, {

type: 'bar',

data: {

labels: ['Companies','Employees'],

datasets: [{

label: ' Stats',

data: [
{{ $companiesCount }},
{{ $employeesCount }}
],

backgroundColor: [
'#0d6efd',
'#198754'
]

}]

}

});

</script>

@endsection