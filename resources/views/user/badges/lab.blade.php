@if(\Auth::check())
@if(\Auth::id()!=$target_value->id)
<div>
    @if(\Auth::user()->hasStar($target_value->id))
    <button class="btn btn-default like-button" like-value="1" like-user="{{$target_value->id}}"  type="button">取消关注</button>
    @else
    <button class="btn btn-default like-button" like-value="0" like-user="{{$target_value->id}}"  type="button">关注</button>
    @endif
</div>
@endif
@endif