<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <!-- resources/views/posts/index.blade.php -->
    <div class="container mx-auto pt-8">
        <h1 class="text-3xl font-bold text-purple-800 mb-8">All Posts</h1>
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-8" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <table class="w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-200 text-gray-700">
                <tr>
                    <th class="py-4 px-6">Title</th>
                    <th class="py-4 px-6">Content</th>
                    <th class="py-4 px-6">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($posts as $post)
                    <tr class="hover:bg-gray-100">
                        <td class="py-4 px-6">{{ $post->title }}</td>
                        <td class="py-4 px-6">{{ $post->content }}</td>
                        <td class="py-4 px-6">
                            <a href="{{ route('posts.show', $post) }}" class="btn btn-primary mr-2">View</a>
                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-secondary mr-2">Edit</a>
                            <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-8">
            {{ $posts->links() }}
        </div>
    </div>
</body>
</html>
