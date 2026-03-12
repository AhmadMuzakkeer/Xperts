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

<h2>Create Company</h2>

<form method="POST" action="{{ route('companies.store') }}" enctype="multipart/form-data">

@csrf

<div class="mb-3">
<label class="form-label">Name</label>
<input type="text" name="name" class="form-control">
</div>

<div class="mb-3">
<label class="form-label">Email</label>
<input type="email" name="email" class="form-control">
</div>

<div class="mb-3">
<label class="form-label">Logo</label>
<input type="file" name="logo" class="form-control">
</div>

<div class="mb-3">
<label class="form-label">Website</label>
<input type="text" name="website" class="form-control">
</div>

<button class="btn btn-success">Save</button>

</form>

@endsection