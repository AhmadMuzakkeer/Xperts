@extends('layouts.app')

@section('content')

@if ($errors->any())
<div class="alert alert-danger">

<ul class="mb-0">

@foreach ($errors->all() as $error)

<li>{{ $error }}</li>

@endforeach

</ul>

</div>
@endif

<div class="container">

<h2 class="mb-4">Edit Company</h2>

<form method="POST" action="{{ route('companies.update',$company->id) }}" enctype="multipart/form-data">

@csrf
@method('PUT')

<div class="mb-3">
<label class="form-label">Name</label>
<input type="text" name="name" value="{{ $company->name }}" class="form-control">
</div>

<div class="mb-3">
<label class="form-label">Email</label>
<input type="email" name="email" value="{{ $company->email }}" class="form-control">
</div>

<div class="mb-3">
<label class="form-label">Website</label>
<input type="text" name="website" value="{{ $company->website }}" class="form-control">
</div>

<div class="mb-3">

<label class="form-label">Current Logo</label>
<br>

@if($company->logo)
<img src="{{ asset('storage/'.$company->logo) }}" width="120" class="mb-2">
@else
<p>No logo uploaded</p>
@endif

</div>

<div class="mb-3">
<label class="form-label">Change Logo</label>
<input type="file" name="logo" class="form-control">
</div>

<button class="btn btn-primary">Update</button>

<a href="{{ route('companies.index') }}" class="btn btn-secondary">
Cancel
</a>

</form>

</div>

@endsection