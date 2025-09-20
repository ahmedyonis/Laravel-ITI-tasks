<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $posts['title'] }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-primary mb-0">Post Details</h1>
            <a href="/posts" class="btn btn-outline-secondary">
                ← Back to Posts
            </a>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white border-0 pb-0">
                        <h2 class="card-title text-primary mb-1">{{ $posts['title'] }}</h2>
                        <small class="text-muted">Post ID: {{ $posts['id'] }}</small>
                    </div>
                    <div class="card-body">
                        <p class="card-text fs-5">{{ $posts['content'] }}</p>
                        <p>{{\Carbon\Carbon::parse($posts['updated_at'])->translatedFormat('d F Y - H:i')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>