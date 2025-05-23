<p>{{ $comment->user->name }} さんがコメントしました：</p>

<blockquote style="margin: 1em 0; font-style: italic;">
    "{{ $comment->comment }}"
</blockquote>

<p>投稿はこちら：</p>
<p>
    <a href="{{ route('sln.show', $comment->stolen_bicycle_id) }}">
        {{ route('sln.show', $comment->stolen_bicycle_id) }}
    </a>
</p>
