<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Register as Customer</h2>
<form method="POST" action="{{ route('register.customer') }}">
    @csrf

    <div class="mb-3">
        <label for="first_name" class="form-label">First Name</label>
        <input name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror">
        @error('first_name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="last_name" class="form-label">Last Name</label>
        <input name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror">
        @error('last_name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror">
        @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
        @error('password')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
    </div>

    <button type="submit" class="btn btn-primary">Register as Customer</button>
</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>