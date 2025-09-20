<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trashed Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-danger">Trashed Posts</h1>
        <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">Back to Posts</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Content Preview</th>
                            <th>Deleted At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td><strong>{{ $post->title }}</strong></td>
                                <td>{{ \Illuminate\Support\Str::limit($post->content, 50) }}</td>
                                <td><small class="text-muted">{{ $post->deleted_at->format('Y-m-d H:i') }}</small></td>
                                <td>
                                    <form action="{{ route('posts.restore', $post->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to restore this post?')">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm btn-warning">Restore</button>
                                    </form>
                                    <form action="{{ route('posts.forceDelete', $post->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to PERMANENTLY delete this post and its image? This cannot be undone!')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete Permanently</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">No trashed posts available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-4">
        {{ $posts->links() }}
    </div>
</div>

</body>
</html>