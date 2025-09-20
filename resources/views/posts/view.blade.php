<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary">Posts</h1>
        <a href="/posts/create" class="btn btn-success btn-lg">Create Post</a>
        <a href="/posts/trashed" class="btn btn-danger btn-lg">trassh</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Auther</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($posts as $post)
                            <tr>
                                <td>{{ $post['id'] }}</td>
                                <td><strong>{{ $post['title'] }}</strong></td>
                                <td>{{$post['content']}}</td>
                                <td>{{$post->user->name}}</td>
                                <td>
                                    <a href="/posts/{{ $post['id'] }}" class="btn btn-primary btn-lg">view</a>
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-secondary btn-lg">edit</a>
                                    <form id="detForm" style="display:inline;" action="{{ route('posts.destroy', $post->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this post?')">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="delete" class="btn btn-danger btn-lg">
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">No posts available.</td>
                            </tr>
                        @endforelse
                        
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
    {{ $posts->links() }}
</div>
<script>

</script>
</body>
</html>