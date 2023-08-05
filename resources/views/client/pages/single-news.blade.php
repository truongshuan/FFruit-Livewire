@extends('client.layouts.master')
@section('title', $post->title)
@section('content')
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>5 phút đọc </p>
                    <h1>{{ $post->title }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- single article section -->
<div class="mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="single-article-section">
                    <div class="single-article-text">
                        {{-- <img src="{{ Storage::disk('posts')->url($post->thumbnail) }}" width="120px"
                            alt="{{ $post->title }}"> --}}
                        <div class="single-artcile-bg"
                            style="background-image: url({{ Storage::disk('posts')->url($post->thumbnail) }}">
                        </div>
                        <p class="blog-meta">
                            <span class="author"><i class="fas fa-user"></i> Admin</span>
                            <span class="date"><i class="fas fa-calendar"></i>
                                {{ $post->created_at->format('d/m/Y')}}
                            </span>
                        </p>
                        <h2>{{ $post->title }}</h2>
                        <p>{!! $post->content !!}</p>
                    </div>

                    <div class="comments-list-wrap">
                        <h3 class="comment-count-title">3 Bình luận</h3>
                        <div class="comment-list">
                            <div class="single-comment-body">
                                <div class="comment-user-avater">
                                    <img src="assets/img/avaters/avatar1.png" alt="">
                                </div>
                                <div class="comment-text-body">
                                    <h4>Jenny Joe <span class="comment-date">Aprl 26, 2020</span> <a href="#">reply</a>
                                    </h4>
                                    <p>Nunc risus ex, tempus quis purus ac, tempor consequat ex. Vivamus sem magna,
                                        maximus at est id, maximus aliquet nunc. Suspendisse lacinia velit a eros
                                        porttitor, in interdum ante faucibus Suspendisse lacinia velit a eros
                                        porttitor, in interdum ante faucibus.</p>
                                </div>
                                <div class="single-comment-body child">
                                    <div class="comment-user-avater">
                                        <img src="assets/img/avaters/avatar3.png" alt="">
                                    </div>
                                    <div class="comment-text-body">
                                        <h4>Simon Soe <span class="comment-date">Aprl 27, 2020</span> <a
                                                href="#">reply</a></h4>
                                        <p>Nunc risus ex, tempus quis purus ac, tempor consequat ex. Vivamus sem
                                            magna, maximus at est id, maximus aliquet nunc. Suspendisse lacinia
                                            velit a eros porttitor, in interdum ante faucibus.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="single-comment-body">
                                <div class="comment-user-avater">
                                    <img src="assets/img/avaters/avatar2.png" alt="">
                                </div>
                                <div class="comment-text-body">
                                    <h4>Addy Aoe <span class="comment-date">May 12, 2020</span> <a href="#">reply</a>
                                    </h4>
                                    <p>Nunc risus ex, tempus quis purus ac, tempor consequat ex. Vivamus sem magna,
                                        maximus at est id, maximus aliquet nunc. Suspendisse lacinia velit a eros
                                        porttitor, in interdum ante faucibus Suspendisse lacinia velit a eros
                                        porttitor, in interdum ante faucibus.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="comment-template">
                        <h4>Để lại bình luận</h4>
                        <p>If you have a comment dont feel hesitate to send us your opinion.</p>
                        <form action="index.html">
                            <p>
                                <input type="text" placeholder="Your Name">
                                <input type="email" placeholder="Your Email">
                            </p>
                            <p><textarea name="comment" id="comment" cols="30" rows="10"
                                    placeholder="Your Message"></textarea></p>
                            <p><input type="submit" value="Gửi"></p>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar-section">
                    <div class="recent-posts">
                        <h4>Bài viết gần đây</h4>
                        <ul>
                            @foreach ($latestPosts as $item)
                            <li>
                                <a href="{{ route('new_detail', ['slug'=> $item->slug]) }}">
                                    {{$item->title}}
                                </a>
                                <p>Đăng {{ $item->created_at->locale('vi_VN')->diffForHumans() }}</p>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="archive-posts">
                        <h4>Có thể bạn quan tâm</h4>
                        <ul>
                            @foreach ($relatedPosts as $item)
                            <li><a href="{{ route('new_detail', ['slug'=> $item->slug]) }}">{{ $item->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="tag-section">
                        <h4>Tags</h4>
                        <ul>
                            <li><a href="single-news.html">Apple</a></li>
                            <li><a href="single-news.html">Strawberry</a></li>
                            <li><a href="single-news.html">BErry</a></li>
                            <li><a href="single-news.html">Orange</a></li>
                            <li><a href="single-news.html">Lemon</a></li>
                            <li><a href="single-news.html">Banana</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end single article section -->

@endsection