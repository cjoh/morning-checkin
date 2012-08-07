@layout('layout')

<?php Section::inject('page_title', $user->bestname()); ?>
<?php Section::inject('sidebar', View::make('following_sidebar')); ?>

@section('content')

  <?php
  if(!isset($follow->user_id)){
  	echo Form::open(route('follows'),'POST', array("class"=>"followform"));
  	echo Form::submit('Follow', array("class"=>"follow-btn buttonH bBlue"));
  } else {
  	echo Form::open(route('follow', array($follow->id)),'DELETE', array("class"=>"followform"));
  	echo Form::submit('Unfollow', array("class"=>"follow-btn buttonH bBlue"));
  }
  echo Form::hidden('target_user_id',$user->id);
  ?>

  <h1 class="profileheader">{{HTML::image($user->gravatar(),"picture of $user->name")}} {{$user->name}} ({{$user->nickname}})</h1>

  <?php
  echo Form::close();
  ?>

<div class="row-fluid">
@foreach ($checkins as $checkin)

<?php echo View::make('partials.checkin')->with(array("checkin" => $checkin)); ?>

@endforeach
</div>

@endsection