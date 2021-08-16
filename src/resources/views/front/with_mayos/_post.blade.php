<div class="my-3 h5">
  {{ $with_mayo->title }}
  @foreach($with_mayo->mayo_tags as $mayo_tag)
    <span class="badge badge-secondary">{{ $mayo_tag->name }}</span>
  @endforeach
</div>
<div>{{ $with_mayo->body }}</div>
<div>
    @if($with_mayo->is_liked_by_auth_user())
      <div class="likes text-right">
        <i class="far fa-heart like-toggle liked" data-with-mayo-id="{{ $with_mayo->id }}"></i>
      <span class="like-counter">{{ $with_mayo->likes->count() }}</span>
      </div>
    @else
      <div class="likes text-right">
        <i class="far fa-heart heart like-toggle" data-with-mayo-id="{{ $with_mayo->id }}"></i>
      <span class="like-counter">{{ $with_mayo->likes->count() }}</span>
      </div>
    @endif
</div>