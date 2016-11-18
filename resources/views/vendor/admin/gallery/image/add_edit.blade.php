<div class="col-sm-4">
	<div class="md-form-group">
	{!! \Form::select('gallery_id', \App\Models\Gallery::lists('title', 'id'), null, ['class' => 'md-input', 'required' => true]) !!}
		<label for="label0">Category</label>
	</div>
</div>
<div class="col-sm-12">
	<div class="md-form-group">
		@if (Input::get('id') && Admin::inputValue('img'))
		<p>
			{!! HTML::image(asset('contents/'.Admin::inputValue('img')), Admin::inputValue('img'), array('width' => 100)) !!}
		</p><br/>
		@endif
		{!! \Form::file('img', ['class' => 'md-input']) !!}
		<label for="label1">Image</label>
	</div>
</div>