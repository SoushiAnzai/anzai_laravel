@extends('layout')

@section('content')
    <div class="container mt-4">
        <div class="border p-4">
            <div class="mb-4 text-right">
                <a class="btn btn-primary" href="{{ route('post.edit', ['post' => $post]) }}">
                    編集する
                </a>
                <form
                    style="display: inline-block;"
                    method="POST"
                    action="{{ route('post.destroy', ['post' => $post]) }}"
                >
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger">削除する</button>
                </form>
            </div>
            <h1 class="h5 mb-4">
                {{ $post->title }}
            </h1>

            <p class="mb-5">
                {!! nl2br(e($post->content)) !!}
            </p>

            <section>
                <h2 class="h5 mb-4">
                    コメント
                </h2>

                <form class="mb-4" method="POST" action="{{ route('comment.store') }}">
                    @csrf

                    <input
                        name="post_id"
                        type="hidden"
                        value="{{ $post->id }}"
                    >

                    <div class="form-group">
                        <label for="content">
                            本文
                        </label>

                        <textarea
                            id="content"
                            name="content"
                            class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}"
                            rows="4"
                        >{{ old('content') }}</textarea>
                        @if ($errors->has('content'))
                            <div class="invalid-feedback">
                                {{ $errors->first('content') }}
                            </div>
                        @endif
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                            コメントする
                        </button>
                    </div>
                </form>

                @forelse($post->comments as $comment)
                    <div class="border-top p-4">
                        <time class="text-secondary">
                            {{ $comment->created_at->format('Y.m.d H:i') }}
                        </time>
                        <p class="mt-2">
                            {!! nl2br(e($comment->content)) !!}
                        </p>
                    </div>
                @empty
                    <p>コメントはまだありません。</p>
                @endforelse
            </section>
        </div>
    </div>
@endsection