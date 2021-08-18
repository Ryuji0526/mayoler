<div class="my-3 h5">
  {!! $data->title !!}
  @foreach($data->mayo_tags as $mayo_tag)
    <span class="badge badge-secondary">{!! $mayo_tag->name !!}</span>
  @endforeach
</div>
<div>{!! $data->body !!}</div>
<div>
    @auth
        @if($data->isLikedByAuthUser())
          <div class="likes text-right">
            <i class="far fa-heart like-toggle liked" data-with-mayo-id="{!! $data->id !!}"></i>
          <span class="like-counter">{!! $data->likes->count() !!}</span>
          </div>
        @else
          <div class="likes text-right">
            <i class="far fa-heart heart like-toggle" data-with-mayo-id="{!! $data->id !!}"></i>
          <span class="like-counter">{!! $data->likes->count() !!}</span>
          </div>
        @endif
    @endauth
</div>