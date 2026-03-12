<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<title>Xperts</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>

body{
background:#f5f6fa;
}

.navbar{
box-shadow:0 2px 10px rgba(0,0,0,0.1);
}

.user-name{
font-weight:500;
margin-right:15px;
}

.content-card{
background:white;
padding:25px;
border-radius:10px;
box-shadow:0 4px 12px rgba(0,0,0,0.05);
}

</style>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container">

<a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
<i class="bi bi-building"></i> Xperts
</a>

<ul class="navbar-nav">

<li class="nav-item">
<a class="nav-link" href="{{ route('companies.index') }}">
<i class="bi bi-buildings"></i> Companies
</a>
</li>

<li class="nav-item">
<a class="nav-link" href="{{ route('employees.index') }}">
<i class="bi bi-people"></i> Employees
</a>
</li>

</ul>

<div class="d-flex align-items-center">

<div class="text-white user-name">
<i class="bi bi-person-circle"></i>
{{ Auth::user()->name }}
</div>

<form method="POST" action="{{ route('logout') }}">
@csrf
<button class="btn btn-outline-light btn-sm">
<i class="bi bi-box-arrow-right"></i> Logout
</button>
</form>

</div>

</div>
</nav>

<div class="container mt-4">

<div class="content-card">
@yield('content')
</div>

</div>


<script>

function confirmDelete() {

return confirm("Are you sure you want to delete this record?");

}

</script>

</body>
</html>