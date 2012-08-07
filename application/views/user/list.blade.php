@layout('layout')

<?php Section::inject('page_title', 'Users'); ?>
<?php Section::inject('sidebar', View::make('following_sidebar')); ?>

@section('content')

<h2>People you aren't following</h2>
<div class="row-fluid">
  <ul class="userList followsome">
@forelse($users as $u)
  <li>
      <a href="{{route('user', array($u->nickname))}}" title="" data-pjax="#pjax-outer">
          <img src="{{$u->gravatar()}}" alt="" />
          <div class="sidebar-summary">
              <div class="contactName">
                  <strong>{{$u->name}} ({{$u->nickname}})</strong>
              </div>
              <span class="clear"></span>
          </div>
      </a>
  </li>
@empty
	<h3>Sorry</h3>
	<p>There are no users in the system. Which is weird, because you're here.</p>
@endforelse
  </ul>
</div>

@endsection