@extends('layouts.public')

@section('title', $article->title . ' - Molla')

@section('plugin-css')
  <link rel="stylesheet" href="{{ asset('assets/css/plugins/owl-carousel/owl.carousel.css') }}">
@endsection

@section('css')

@endsection

@section('plugin-js')

@endsection

@section('js')

@endsection

@section('main')
  <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
    <div class="container">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Blog</a></li>
        <li class="breadcrumb-item active" aria-current="page">Default With Sidebar</li>
      </ol>
    </div>
  </nav>

  <div class="page-content">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <article class="entry single-entry">
            <div class="entry-body">
              <div class="entry-meta">
                <span class="entry-author">
                  by <a href="#">{{ $article->author->name }}</a>
                </span>
                <span class="meta-separator">|</span>
                <a href="#">{{ $article->created_at }}</a>
                <span class="meta-separator">|</span>
                <a href="#">2 Comments</a>
              </div>

              <h2 class="entry-title">
                {{ $article->title }}
              </h2>

              <div class="entry-cats">
                in <a href="#">{{ $article->category->name }}</a>
              </div>

              <div class="entry-content editor-content">
                {!! $article->content !!}
              </div>

              <div class="entry-footer row no-gutters flex-column flex-md-row">
                <div class="col-md">
                  <div class="entry-tags">
                    <span>Tags:</span>
                    @foreach ($article->tags as $tag)
                      <a href="#">{{ $tag->name }}</a>
                    @endforeach
                  </div>
                </div>

                <div class="col-md-auto mt-2 mt-md-0">
                  <div class="social-icons social-icons-color">
                    <span class="social-label">Share this post:</span>
                    <a href="#" class="social-icon social-facebook" title="Facebook" target="_blank">
                      <i class="icon-facebook-f"></i>
                    </a>
                    <a href="#" class="social-icon social-twitter" title="Twitter" target="_blank">
                      <i class="icon-twitter"></i>
                    </a>
                    <a href="#" class="social-icon social-pinterest" title="Pinterest" target="_blank">
                      <i class="icon-pinterest"></i>
                    </a>
                    <a href="#" class="social-icon social-linkedin" title="Linkedin" target="_blank">
                      <i class="icon-linkedin"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <div class="related-posts">
              <h3 class="title">Related Posts</h3>

              <div class="owl-carousel owl-simple" data-toggle="owl"
                data-owl-options='{
                  "nav": false, 
                  "dots": true,
                  "margin": 20,
                  "loop": false,
                  "responsive": {
                    "0": {
                        "items":1
                    },
                    "480": {
                        "items":2
                    },
                    "768": {
                        "items":3
                    }
                  }
                }'>
                <article class="entry entry-grid">
                  <figure class="entry-media">
                    <a href="single.html">
                      <img src="{{ asset('assets/images/blog/grid/3cols/post-1.jpg') }}" alt="image desc">
                    </a>
                  </figure>

                  <div class="entry-body">
                    <div class="entry-meta">
                      <a href="#">Nov 22, 2018</a>
                      <span class="meta-separator">|</span>
                      <a href="#">2 Comments</a>
                    </div>

                    <h2 class="entry-title">
                      <a href="single.html">Cras ornare tristique elit.</a>
                    </h2>

                    <div class="entry-cats">
                      in <a href="#">Lifestyle</a>,
                      <a href="#">Shopping</a>
                    </div>
                  </div>
                </article>

                <article class="entry entry-grid">
                  <figure class="entry-media">
                    <a href="single.html">
                      <img src="{{ asset('assets/images/blog/grid/3cols/post-2.jpg') }}" alt="image desc">
                    </a>
                  </figure>

                  <div class="entry-body">
                    <div class="entry-meta">
                      <a href="#">Nov 21, 2018</a>
                      <span class="meta-separator">|</span>
                      <a href="#">0 Comments</a>
                    </div>

                    <h2 class="entry-title">
                      <a href="single.html">Vivamus ntulla necante.</a>
                    </h2>

                    <div class="entry-cats">
                      in <a href="#">Lifestyle</a>
                    </div>
                  </div>
                </article>

                <article class="entry entry-grid">
                  <figure class="entry-media">
                    <a href="single.html">
                      <img src="{{ asset('assets/images/blog/grid/3cols/post-3.jpg') }}" alt="image desc">
                    </a>
                  </figure>

                  <div class="entry-body">
                    <div class="entry-meta">
                      <a href="#">Nov 18, 2018</a>
                      <span class="meta-separator">|</span>
                      <a href="#">3 Comments</a>
                    </div>

                    <h2 class="entry-title">
                      <a href="single.html">Utaliquam sollicitudin leo.</a>
                    </h2>

                    <div class="entry-cats">
                      in <a href="#">Fashion</a>,
                      <a href="#">Lifestyle</a>
                    </div>
                  </div>
                </article>

                <article class="entry entry-grid">
                  <figure class="entry-media">
                    <a href="single.html">
                      <img src="{{ asset('assets/images/blog/grid/3cols/post-4.jpg') }}" alt="image desc">
                    </a>
                  </figure>

                  <div class="entry-body">
                    <div class="entry-meta">
                      <a href="#">Nov 15, 2018</a>
                      <span class="meta-separator">|</span>
                      <a href="#">4 Comments</a>
                    </div>

                    <h2 class="entry-title">
                      <a href="single.html">Fusce pellentesque suscipit.</a>
                    </h2>

                    <div class="entry-cats">
                      in <a href="#">Travel</a>
                    </div>
                  </div>
                </article>
              </div>
            </div>

            <div class="comments">
              <h3 class="title">3 Comments</h3>

              <ul>
                <li>
                  <div class="comment">
                    <figure class="comment-media">
                      <a href="#">
                        <img src="{{ asset('assets/images/blog/comments/1.jpg') }}" alt="User name">
                      </a>
                    </figure>

                    <div class="comment-body">
                      <a href="#" class="comment-reply">Reply</a>
                      <div class="comment-user">
                        <h4><a href="#">Jimmy Pearson</a></h4>
                        <span class="comment-date">November 9, 2018 at 2:19 pm</span>
                      </div>

                      <div class="comment-content">
                        <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc
                          tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti. </p>
                      </div>
                    </div>
                  </div>

                  <ul>
                    <li>
                      <div class="comment">
                        <figure class="comment-media">
                          <a href="#">
                            <img src="{{ asset('assets/images/blog/comments/2.jpg') }}" alt="User name">
                          </a>
                        </figure>

                        <div class="comment-body">
                          <a href="#" class="comment-reply">Reply</a>
                          <div class="comment-user">
                            <h4><a href="#">Lena Knight</a></h4>
                            <span class="comment-date">November 9, 2018 at 2:19 pm</span>
                          </div>

                          <div class="comment-content">
                            <p>Morbi interdum mollis sapien. Sed ac risus.</p>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>

                <li>
                  <div class="comment">
                    <figure class="comment-media">
                      <a href="#">
                        <img src="{{ asset('assets/images/blog/comments/3.jpg') }}" alt="User name">
                      </a>
                    </figure>

                    <div class="comment-body">
                      <a href="#" class="comment-reply">Reply</a>
                      <div class="comment-user">
                        <h4><a href="#">Johnathan Castillo</a></h4>
                        <span class="comment-date">November 9, 2018 at 2:19 pm</span>
                      </div>

                      <div class="comment-content">
                        <p>Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien
                          ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            <div class="reply">
              <div class="heading">
                <h3 class="title">Leave A Reply</h3>
                <p class="title-desc">Your email address will not be published. Required fields are marked *</p>
              </div>

              <form action="#">
                <label for="reply-message" class="sr-only">Comment</label>
                <textarea name="reply-message" id="reply-message" cols="30" rows="4" class="form-control" required
                  placeholder="Comment *"></textarea>

                <div class="row">
                  <div class="col-md-6">
                    <label for="reply-name" class="sr-only">Name</label>
                    <input type="text" class="form-control" id="reply-name" name="reply-name" required
                      placeholder="Name *">
                  </div>

                  <div class="col-md-6">
                    <label for="reply-email" class="sr-only">Email</label>
                    <input type="email" class="form-control" id="reply-email" name="reply-email" required
                      placeholder="Email *">
                  </div>
                </div>

                <button type="submit" class="btn btn-outline-primary-2">
                  <span>POST COMMENT</span>
                  <i class="icon-long-arrow-right"></i>
                </button>
              </form>
            </div>
        </div>

        <aside class="col-lg-3">
          <div class="sidebar">

            <div class="widget widget-cats">
              <h3 class="widget-title">Categories</h3>

              <ul>
                <li><a href="#">Lifestyle<span>3</span></a></li>
                <li><a href="#">Shopping<span>3</span></a></li>
                <li><a href="#">Fashion<span>1</span></a></li>
                <li><a href="#">Travel<span>3</span></a></li>
                <li><a href="#">Hobbies<span>2</span></a></li>
              </ul>
            </div>

            <div class="widget">
              <h3 class="widget-title">Popular Posts</h3>

              <ul class="posts-list">
                <li>
                  <figure>
                    <a href="#">
                      <img src="{{ asset('assets/images/blog/sidebar/post-1.jpg') }}" alt="post">
                    </a>
                  </figure>

                  <div>
                    <span>Nov 22, 2018</span>
                    <h4><a href="#">Aliquam tincidunt mauris eurisus.</a></h4>
                  </div>
                </li>
                <li>
                  <figure>
                    <a href="#">
                      <img src="{{ asset('assets/images/blog/sidebar/post-2.jpg') }}" alt="post">
                    </a>
                  </figure>

                  <div>
                    <span>Nov 19, 2018</span>
                    <h4><a href="#">Cras ornare tristique elit.</a></h4>
                  </div>
                </li>
                <li>
                  <figure>
                    <a href="#">
                      <img src="{{ asset('assets/images/blog/sidebar/post-3.jpg') }}" alt="post">
                    </a>
                  </figure>

                  <div>
                    <span>Nov 12, 2018</span>
                    <h4><a href="#">Vivamus vestibulum ntulla nec ante.</a></h4>
                  </div>
                </li>
                <li>
                  <figure>
                    <a href="#">
                      <img src="{{ asset('assets/images/blog/sidebar/post-4.jpg') }}" alt="post">
                    </a>
                  </figure>

                  <div>
                    <span>Nov 25, 2018</span>
                    <h4><a href="#">Donec quis dui at dolor tempor interdum.</a></h4>
                  </div>
                </li>
              </ul>
            </div>

            <div class="widget widget-banner-sidebar">
              <div class="banner-sidebar-title">ad box 280 x 280</div>

              <div class="banner-sidebar">
                <a href="#">
                  <img src="{{ asset('assets/images/blog/sidebar/banner.jpg') }}" alt="banner">
                </a>
              </div>
            </div>

            <div class="widget">
              <h3 class="widget-title">Browse Tags</h3>

              <div class="tagcloud">
                <a href="#">fashion</a>
                <a href="#">style</a>
                <a href="#">women</a>
                <a href="#">photography</a>
                <a href="#">travel</a>
                <a href="#">shopping</a>
                <a href="#">hobbies</a>
              </div>
            </div>
          </div>
        </aside>
      </div>
    </div>
  </div>
@endsection
