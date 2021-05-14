
<a href="{{ route('frontpage') }}"  id="home" class="{{ (Route::currentRouteName() == 'frontpage') ? 'active' : '' }}">Home</a>
<a href="{{ route('catalog') }}" id="catalogo" class="{{ (Route::currentRouteName() == 'catalog') ? 'active' : '' }}">Catalogo</a>
			
			<a href="javascript:void(0);" id = "icon" class="icon" onclick ="myFunction()">
				<i class="fa fa-bars"></i>
			</a>
