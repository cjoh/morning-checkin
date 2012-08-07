<ul class="userList">
@forelse($following as $f)
  <?php echo Cache::sear('teamlist-v2-' . $f->cache_key(), function() use ($f) { ob_start(); ?>
		<?php $stats = $f->dashdata(); ?>
		<li>
			<a href="{{route('user', array($f->nickname))}}" data-pjax="#pjax-outer">
				<img src="{{$f->gravatar()}}" alt="" />
				<div class="sidebar-summary">
					<div class="contactName">
						<strong>{{$f->bestname()}}</strong>
					</div>
					<div><?php echo preg_replace('/^\-\s/', '' ,$stats['checkin']); ?></div>
					<span class="{{$stats['status']}}"></span>
					<span class="clear"></span>
				</div>
			</a>
		</li>
	<?php return ob_get_clean(); }); ?>
@empty
	<li>You are not following anybody. Go follow someone.</li>
@endforelse
</ul>