@foreach ($comments as $comment)
    <div class="comment-box">
        <div class="comment">
            <div class="image">
                @php
                    $image = md5(strtolower(trim("$comment->user['email']")));
                    $user = $comment->user['username'];
                    $date = $comment->created_at->diffForHumans();
                    $comment_color = $comment['colorhex'];
                @endphp
                <a href="/profile/{{ $user }}">
                    <img src="https://www.gravatar.com/avatar/{{ $image }}?r=pg&d=retro" alt="{{ $user }}">
                </a>
            </div>
            <div class="info">
                <div class="name-holder">
                    <span class="name"><a href="/profile/{{ $user }}">{{ $user }}</a></span> · <span
                        class="date">{{ $date }}</span>
                </div>

                @if(isset($showComment) && $showComment == true)
                <div class="commented">
                    commented on color <a href="/color/{{$comment_color}}" style="background-color:#{{$comment_color}}">#{{$comment_color}}</a>
                </div>
                @endif

                <div>
                    <p class="comment-text">{{ $comment['comment'] }}</p>
                </div>
            </div>
        </div>

        <!--
                        <div class="votes">
                            <div class="vote active">
                                <button class="like">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-thumb-up" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M7 11v8a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1v-7a1 1 0 0 1 1 -1h3a4 4 0 0 0 4 -4v-1a2 2 0 0 1 4 0v5h3a2 2 0 0 1 2 2l-1 5a2 3 0 0 1 -2 2h-7a3 3 0 0 1 -3 -3"></path>
                                        </svg>
                                </button>
                                <span class="count">100</span>
                            </div>
                            <div class="vote">
                                <button class="dislike">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-thumb-down" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M7 13v-8a1 1 0 0 0 -1 -1h-2a1 1 0 0 0 -1 1v7a1 1 0 0 0 1 1h3a4 4 0 0 1 4 4v1a2 2 0 0 0 4 0v-5h3a2 2 0 0 0 2 -2l-1 -5a2 3 0 0 0 -2 -2h-7a3 3 0 0 0 -3 3"></path>
                                        </svg>
                                </button>
                                <span class="count">20</span>
                            </div>
                        </div>
                        -->

    </div>
@endforeach
