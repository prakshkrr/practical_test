<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Login</title>
    <!-- Bootstrap CSS CDN (optional, for styling) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container mt-5" style="max-width: 400px;">
        <h2 class="mb-4 text-center">Admin Login</h2>
        <div id="error-message" class="alert alert-danger d-none"></div>

        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" id="email" class="form-control" autofocus />
                 @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" />
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100">Login as Admin</button>
        </form>
    </div>

    <!-- Optional Bootstrap JS Bundle CDN (for components like alerts) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
