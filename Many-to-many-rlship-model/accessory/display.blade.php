@foreach($categories as $category) 
	@if ($category->id === 1) 
		$categoryId = 1;
	@elseif ($category->id === 2)
		$categoryId = 1;
	@else
		$categoryId = 3;
		
		<?php return $categoryId; ?>
	@endif
@endforeach