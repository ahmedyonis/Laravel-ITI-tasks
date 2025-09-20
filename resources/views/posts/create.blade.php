<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-success mb-0">Create Post</h1>
            <a href="/posts" class="btn btn-outline-secondary">
                ← Back to Posts
            </a>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <form action="{{ route('posts.store') }}" method="post">
                            @csrf

                            <div class="mb-3">
                                <label for="title" class="form-label fw-bold">Post Title</label>
                                <input type="text" 
                                       class="form-control form-control-lg" 
                                       id="title" 
                                       name="title" 
                                       placeholder="Enter post title" 
                                       required>
                            </div>

                            <div class="mb-4">
                                <label for="content" class="form-label fw-bold">Post Content</label>
                                <textarea class="form-control" 
                                          id="content" 
                                          name="content" 
                                          rows="5" 
                                          placeholder="Write your post content here..." 
                                          required></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="users" class="form-label fw-bold">Users</label>
                                <select name="user_id" required>
                                    @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-success btn-lg">
                                    Create Post
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
