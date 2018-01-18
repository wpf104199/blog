{{dd($target_value->toArray())}}
@if(\Auth::id()!=$target_value->id)
<div>
    @if(\Auth::user()->hasFans($target_value_id))
    <button class="btn btn-default like-button" like-value="1" like-user="6" _token="MESUY3topeHgvFqsy9EcM916UWQq6khiGHM91wHy" type="button">关注</button>
@endif
    <button class="btn btn-default like-button" like-value="1" like-user="6" _token="MESUY3topeHgvFqsy9EcM916UWQq6khiGHM91wHy" type="button">取消关注</button>
</div>
@endif