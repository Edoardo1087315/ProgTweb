@if($img != NULL)
<img src="{{ asset('../storage/app/EventImages/' .$img) }}" >
@else
<img src="{{ asset('../storage/app/EventImages/default.jpg') }}" >
@endif