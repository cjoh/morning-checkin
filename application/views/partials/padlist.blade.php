<div class="sideWidget">
<?php
echo Form::open(route('pad'),'POST');
echo "<div class=\"formRow\">";
echo Form::label("title","Create a New Pad");
echo Form::text('title');
echo "</div>";
echo Form::submit('Create Pad',array("class"=>'sideB bGreen'));
echo Form::close();
?>
</div>
<div class="divider"><span></span></div>

<ul class="subNav">
<?php $pads = Pad::where('hidden', '=', '0')->order_by('created_at','desc')->get(); ?>
@forelse($pads as $p)
    <li>
        <a href="{{route('pad', array($p->id))}}" data-pjax="#pjax-outer">
           <span class="icos-pencil"></span>{{$p->title}}</strong>
        </a>
    </li>
@empty
    <li>No Pads Created. Create One</li>
@endforelse
</ul>