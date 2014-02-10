@extends('layouts.default')

@section('content')

	<h1>Create Article</h1>

	{{ Form::open(['route' => 'articles.store']) }}

		<label for="exampleInputEmail1">Title</label>
		{{ Form::text('title') }}
		<label for="exampleInputPassword1">Excerpt</label>
		{{ Form::textarea('excerpt') }}
		<label for="exampleInputFile">Content</label>
		{{ Form::textarea('content') }}

		{{ Form::submit('Click Me!') }}

	{{ Form::close() }}

@stop