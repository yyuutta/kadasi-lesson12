@if (count($users) > 0)
<ul class="media-list">
@foreach ($users as $user)
    <li class="media">
        <div class="media-left">
            <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
        </div>
        <div class="media-body">
            <div>
            <div>
                {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $user->created_at }}</span>
            </div>
            <div>
                @if (Auth::id() == $user->user_id)
                    {!! Form::open(['route' => ['microposts.destroy', $user->id], 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </li>
@endforeach
</ul>
{!! $users->render() !!}
@endif