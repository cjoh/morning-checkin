@layout('layout')
<?php Section::inject('page_title', $pad->title); ?>

<?php Section::inject('sidebar', View::make('pad_sidebar')); ?>

@section('content')

<h1>
  {{$pad->title}}
  <span style="float: right; font-size: 16px;">
    <a href="{{route('hide_pad', array($pad->id))}}" data-confirm="Are you sure you want to delete this pad?">(delete)</a>
  </span>
</h1>

<iframe src="{{Config::get('morningcheckin.etherpad')}}{{urlencode($pad->title)}}" height="100%" width="100%"></iframe>


@endsection