  <div class="my-last-checkin widget grid6 checkin" data-id="{{$checkin->id}}">
    <div class="whead">
      <h6>{{$title}}</h6>
      <div class="editcheckin sneaky">
        <a href="{{route('checkin_destroy', array($checkin->id))}}" class="delete btn" data-confirm="Are you sure you want to delete this checkin?"> delete </a>
        &middot;
        <a href="#" class="startedit btn"> edit </a>
        <a href="#" class="endedit sneaky btn"> done </a>
      </div>
      <div class="clear"></div>
  </div>
  <div class="checkinform sneaky">
    <textarea class="editcheckinarea">{{$checkin->checkintext}}</textarea>
  </div>
  <div class="body">
          {{$checkin->parsed_checkin()}}
  </div>

</div>