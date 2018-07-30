@if (count($favorites) > 0)
<ul class="media-list">
@foreach ($favorites as $favorite)
    <li class="media">
        <div class="media-left">
            <img class="media-object img-rounded" src="{{ Gravatar::src($favorite->user->email, 50) }}" alt="">
        </div>
        <div class="media-body">
            <div>
                {{ $favorite->user->name }}
            </div>
            <div>
                <p>{!! link_to_route('users.show', 'View profile', ['id' => $favorite->user->id]) !!} <span class="text-muted">posted at {{ $favorite->created_at }}</span></p>
            </div>
            <div>
                <p>{!! nl2br(e($favorite->content)) !!}</p>
            </div>
            <div>
                @include('user_favorite.favorite_button', ['micropost' => $favorite])
                @if (Auth::id() == $favorite->user_id)
                    {!! Form::open(['route' => ['microposts.destroy', $favorite->id], 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </li>
@endforeach
</ul>
{!! $favorites->render() !!}
@endif