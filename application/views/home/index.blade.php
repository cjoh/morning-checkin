@layout('loginlayout')
<?php Section::inject('page_title', 'Login'); ?>

@section('content')

<header class="jumbotron masthead">
  <div class="inner">
    <h1>The Morning Checkin</h1>
    <p>An email-free way to start your day and see the important stuff that's going on.</p>
    <p class="download-info">
      <a href="{{url('auth/session/github')}}" class="btn btn-primary btn-large">Login With GitHub</a>
    </p>
  </div>
@if ($error = Session::get('error'))
	<div class="error">{{$error}}</div>
@endif

@endsection