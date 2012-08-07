  <div id="general">

      <div class="divider"><span></span></div>

    <?php if (!isset($following)){
     // Log::info("$following not defined- grabbing now");
              $following = Auth::user()->following(true);
          };
     ?>
<?php echo View::make('partials.teamlist')->with(array("following"=>$following)); ?>

      <div class="divider"><span></span></div>
                          <div class="sidePad">
      </div>

</div>

