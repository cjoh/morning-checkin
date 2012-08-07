@layout('layout')
<?php Section::inject('page_title', 'Pads'); ?>

<?php Section::inject('sidebar', View::make('pad_sidebar')); ?>

@section('content')

<h1>Pads</h1>
<p>You can create a new pad on the left, or click on an existing one to edit.</p>

@endsection