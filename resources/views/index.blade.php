<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Welcome to the Index Page</h1>
        <p>This is the main view for your Laravel application.</p>
        <a href="{{ url('/create') }}" class="btn btn-primary">Create New</a>
    </div>
</body>
</html>