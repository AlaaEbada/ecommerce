<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
    <style>
        body {
            background-color: #222; /* Dark background for better contrast */
            color: white;
        }

        .post-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #333;
            color: white;
            text-align: left;
        }

        .post-table th, .post-table td {
            padding: 15px;
            border-bottom: 1px solid #444;
        }

        .post-table th {
            background-color: #555;
        }

        .post-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.5);
        }

        .action-buttons button {
            margin-right: 10px;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }



        .alert {
            margin: 20px 0;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container-scroller">
        @include('admin.sidebar')

        <div class="container-fluid page-body-wrapper">
            @include('admin.header')

            <div class="main-panel">
                <div class="content-wrapper">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    
                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif

                    <table class="post-table">
                        <thead>
                            <tr>
                                <th>Featured Image</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $post)
                                <tr>
                                    <td>
                                        <img src="{{ asset('post/' . $post->featured_image) }}" alt="Featured Image" class="post-image">
                                    </td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->category }}</td>
                                    <td>{{ $post->user->name ?? 'Unknown' }}</td>
                                    <td>{{ $post->created_at->format('F d, Y') }}</td>
                                    <td class="action-buttons">
                                        <a href="{{ url('/posts/edit', $post->id) }}">
                                            <button class="btn btn-primary">Edit</button>
                                        </a>
                                            <a class="btn btn-danger" onclick="return confirm('Are you sure?')" 
                                            href="{{route('posts.destroy', $post->id)}}">
                                                Delete
                                            </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" style="text-align: center; padding: 20px;">
                                        No posts available.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('admin.script')
</body>
</html>
