<div class="checkin" data-id="{{$checkin->id}}">
  <div class="widget">
    <div class="whead"><h6>
@if(isset($user))
    {{HTML::image($user->gravatar(),"picture of " . $user->bestname(), array("class"=>"minigrav"))}}
    {{HTML::link(route('user', array($user->nickname)),$user->bestname())}} on
@endif
    {{ date('D, n/j', strtotime($checkin->created_at)) }}</h6>
      <div class="clear"></div>
    </div>
    <div class="body">
      {{$checkin->parsed_checkin()}}
    </div>
  </div>
</div>
