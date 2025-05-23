<p>{{ $comment->user->name }} さんがコメントしました：</p>

<blockquote style="margin: 1em 0; font-style: italic;">
    "{{ $comment->comment }}"
</blockquote>

<p>投稿はこちら：</p>
<p>
    <a href="{{ route('abd.show', $comment->abandoned_bicycle_id) }}">
        {{ route('abd.show', $comment->abandoned_bicycle_id) }}
    </a>
</p>
