<?php Section::inject('sidebar', View::make('following_sidebar')); ?>
<?php Section::inject('page_title', 'Dashboard'); ?>

@section('content')

<?php Section::inject('body_class', 'dashboard'); ?>
<?php  Bundle::start('sparkdown');?>
<div class="row">
 <div class="widget grid6 checkinform">
    <div class="whead">
        <h6>New Checkin</h6>
        <div class="showtipslinks">
          <a href="#" class="showtips btn"> show tips </a>
          <a href="#" class="hidetips sneaky btn"> hide tips </a>
        </div>
        <div class="clear"></div>
    </div>
   <?php
  echo Form::open(route('checkin'),'POST', array("id"=>"checkinform"));
  echo Form::token();
  echo Form::textarea('checkintext', '##Get Done

##Got Done

##Flags

', array('id' => 'checkintext'));
  echo Form::submit('Check In', array("class"=>"buttonH bBlue"));
  echo Form::close();
  ?>

</div>
  <div id="checkintips" class="widget grid6 checkin sneaky">

    <div class="whead">
      <h6>Checkin Tips</h6>
      <div class="clear"></div>
    </div>

    <div class="body checkin">
      <?php echo View::make('partials.checkintips'); ?>
    </div>

  </div>

</div>
@if($last_checkin)
  <?php echo View::make('partials.bigcheckin')->with(array("title"=>"Your Last Checkin", "checkin"=>$last_checkin)) ?>
  <div class="clear morecheckinscontainer">

  @if(count($older_checkins) > 0)
    <a href="#" id='showmorecheckins'>show my older checkins</a>
    <a href="#" id='hidemorecheckins' class="sneaky">hide my older checkins</a>
    <div id='mymorecheckins' class="row sneaky">
      @foreach ($older_checkins as $checkin)
        <?php echo View::make('partials.checkin')->with(array("checkin" => $checkin)); ?>
      @endforeach
    </div>
  @endif
@else
  <?php echo View::make('partials.nocheckins') ?>
@endif

</div>
<div class="clear"></div>
<div class="divider"><span></span></div>
<br/>
<h2>Checkins from People You Follow</h2>
<div class="row">
@forelse($following as $f)
  <?php
  if(count($f->checkins) > 0 ){
    echo View::make('partials.checkin')->with(array("checkin"=>$f->last_checkin(),"user"=>$f));
  }
  ?>
@empty
  <li>You aren't following anyone. Follow someone and their checkins will appear here.</li>
@endforelse
</div>
<div class="clear"></div>
<div class="divider"><span></span></div>
@endsection