@if (count($errors) > 0)
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
<form 
	method="post"
	action="{{ route('post_form') }}"
	enctype="multipart/form-data"
>
	@csrf
	名前: <input type="text" name="name">
	タグ: <input type="text" name="tags" value="#">
	投稿: <input type="text" name="contents">
	<input type="submit">
</form>