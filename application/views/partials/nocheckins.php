  <div id="my-last-checkin" class="widget grid6 checkin" data-id="{{$last_checkin->id}}">
    <div class="whead">
      <h6>Get Started</h6>
      <div class="clear"></div>
  </div>
  <div class="body checkin">
      <p>You haven't added any checkins yet!</p>
      <?php echo View::make('partials.checkintips'); ?>
  </div>

</div>