<p>Hallo {{ $followed->name }},</p>
<p><strong>{{ $follower->name }}</strong> folgt dir jetzt auf Webmastergram!</p>
<p>Profil ansehen: <a href="{{ route('users.show', $follower->id) }}">{{ $follower->name }}</a></p>
<p>Viele Grüße,<br>Dein Webmastergram-Team</p>
