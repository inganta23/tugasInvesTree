@extends('layouts.app')
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel 9 CRUD Tutorial Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body> -->
  
        @section('content')
            <div class="container mt-2">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Laravel CRUD </h2>
                        </div>
                        <div class="pull-right mb-2">
                            <a class="btn btn-success" href="{{ route('articles.create') }}"> Create Article</a>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <table class="table table-bordered">
                    <tr>
                        <th>Id</th>
                        <th>Article User Id</th>
                        <th>Article Category Id</th>
                        <th>Article Title</th>
                        <th>Article Content</th>
                        <th>Article Image</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($articles as $article)
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td>{{ $article->user_id }}</td>
                            <td>{{ $article->category_id }}</td>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->content }}</td>
                            <td><img src="/image/{{ $article->image }}" width="100px"></td>
                            <td>
                                <form action="{{ route('articles.destroy',$article->id) }}" method="Post">
                                    <a class="btn btn-primary" href="{{ route('articles.edit',$article->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {!! $articles->links('vendor.pagination.simple-bootstrap-5') !!}
            </div>
        @endsection
    

<!-- </body>
</html> -->