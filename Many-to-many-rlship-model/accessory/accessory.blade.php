@extends('layouts.default')

@section('javascript')
	<script type="text/javascript" src="http://localhost/laravel/public/js/scripts/donation.js"></script> 
@endsection

@section('content')
	<div class="container-fluid">
          <div class="row">
                <div class="col-md-12">
                    <h2>{{ $title }}</h2>
                    @if($errors->has())
                    	<ul>
						    @foreach($errors->all() as $message)
						      <li>{{$message}}</li>
						    @endforeach
					  	</ul>
                    @endif
                </div>
          </div>
    </div>
	<div class="form-class"> 
	
		{!! Form::open(['url' => 'accessories', 'id' => 'my-form']) !!}
			<meta name="csrf-token" content="{{ csrf_token() }}" />

			<div class="form-group"> 
				<p>
					{!! Form::label('Categories:') !!}<br/>	
					<select name="categories" class="form-control" id="cat">
						<option value="0">Please select</option>
					@foreach($categories as $category)
						<option value="{{$category->id}}">{{$category->name}}</option>>
					@endforeach
					</select>
				</p>
			</div>

			<div class="form-group access-group-one"> 
				<p>
					{!! Form::label('Accessories:') !!}<br/>	
					<select name="accessories[]" class="form-control" id="acce">
					</select>
				</p>
					<button class="btn btn-primary">Save</button>
					<a href="#" class="btn btn-danger btn-rem-acce">Remove</a>
			</div>
			<a href="#" class="btn btn-info btn-add-more">Add more Accessory</a>

			<div class="form-group"> 
				<p>{!! Form::Submit('Submit Me', ['class' => 'btn btn-primary btn-lg']) !!}</p>
			</div>

		{!! Form::close() !!}
	</div>
	<script type="text/javascript">
		var template = '<div class="form-group access-group">'+ 
                          '<p>'+
                            '{!! Form::label('Accessories:') !!}<br/>'+  
                            '<select name="accessories[]" class="form-control" id="acce-two">'+
                            '</select>'+
                          '</p>'+
                            '<button class="btn btn-primary">Save</button>'+
                            '<a href="#" class="btn btn-danger btn-rem-acce">Remove</a>'+
                        '</div>'

    
    $(document).on('click', 'a.btn-add-more', function(e){
        e.preventDefault();
        $(this).before(template);
    });

    $(document).on('click', 'a.btn-rem-acce', function(e){
        e.preventDefault();
        $(this).parents('div.access-group').remove();
    });

	</script>

@endsection