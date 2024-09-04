@extends('layouts.public')

@section('title', 'Blog')

@section('plugin-css')
  <link rel="stylesheet" href="{{ asset('assets/css/plugins/owl-carousel/owl.carousel.css') }}">
@endsection

@section('css')

@endsection

@section('plugin-js')
  <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
@endsection

@section('js')

@endsection

@section('main')
  <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
    <div class="container">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Blog</a></li>
        <li class="breadcrumb-item active" aria-current="page">Grid 4 Columns</li>
      </ol>
    </div>
  </nav>

  <div class="page-content">
    <div class="container">
      <nav class="blog-nav">
        <ul class="menu-cat entry-filter justify-content-center">
          <li class="active"><a href="#" data-filter="*">All Blog Posts<span>8</span></a></li>
          <li><a href="#" data-filter=".lifestyle">Lifestyle<span>3</span></a></li>
          <li><a href="#" data-filter=".shopping">Shopping<span>1</span></a></li>
          <li><a href="#" data-filter=".fashion">Fashion<span>2</span></a></li>
          <li><a href="#" data-filter=".travel">Travel<span>3</span></a></li>
          <li><a href="#" data-filter=".hobbies">Hobbies<span>2</span></a></li>
        </ul>
      </nav>

      <div class="entry-container max-col-4" data-layout="fitRows">
        <div class="entry-item lifestyle shopping col-sm-6 col-md-4 col-lg-3">
          <article class="entry entry-grid text-center">
            <figure class="entry-media">
              <a href="single.html">
                <img src="{{ asset('assets/images/blog/grid/4cols/post-1.jpg') }}" alt="image desc">
              </a>
            </figure>

            <div class="entry-body">
              <div class="entry-meta">
                <a href="#">Nov 22, 2018</a>
                <span class="meta-separator">|</span>
                <a href="#">2 Comments</a>
              </div>

              <h2 class="entry-title">
                <a href="/blog/nhan-nhan-91">Cras ornare tristique elit.</a>
              </h2>

              <div class="entry-cats">
                in <a href="#">Lifestyle</a>,
                <a href="#">Shopping</a>
              </div>

              <div class="entry-content">
                <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor
                  eu nibh. </p>
                <a href="single.html" class="read-more">Continue Reading</a>
              </div>
            </div>
          </article>
        </div>

        <div class="entry-item lifestyle col-sm-6 col-md-4 col-lg-3">
          <article class="entry entry-grid text-center">
            <figure class="entry-media entry-video">
              <a href="single.html">
                <img src="{{ asset('assets/images/blog/grid/4cols/post-2.jpg') }}" alt="image desc">
              </a>
            </figure>

            <div class="entry-body">
              <div class="entry-meta">
                <a href="#">Nov 21, 2018</a>
                <span class="meta-separator">|</span>
                <a href="#">0 Comments</a>
              </div>

              <h2 class="entry-title">
                <a href="single.html">Vivamus vestibulum ntulla necante.</a>
              </h2>

              <div class="entry-cats">
                in <a href="#">Lifestyle</a>
              </div>

              <div class="entry-content">
                <p>Morbi purus libero, faucibus commodo quis, gravida id, est. Vestibulumvo lutpat, lacus a ultrices
                  sagittis ... </p>
                <a href="single.html" class="read-more">Continue Reading</a>
              </div>
            </div>
          </article>
        </div>

        <div class="entry-item lifestyle fashion col-sm-6 col-md-4 col-lg-3">
          <article class="entry entry-grid text-center">
            <figure class="entry-media">
              <div class="owl-carousel owl-simple owl-light owl-nav-inside" data-toggle="owl">
                <a href="single.html">
                  <img src="{{ asset('assets/images/blog/grid/4cols/post-3.jpg') }}" alt="image desc">
                </a>
                <a href="single.html">
                  <img src="{{ asset('assets/images/blog/grid/4cols/post-4.jpg') }}" alt="image desc">
                </a>
              </div>
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

              <div class="entry-content">
                <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor
                  eu nibh ... </p>
                <a href="single.html" class="read-more">Continue Reading</a>
              </div>
            </div>
          </article>
        </div>

        <div class="entry-item travel col-sm-6 col-md-4 col-lg-3">
          <article class="entry entry-grid text-center">
            <figure class="entry-media">
              <a href="single.html">
                <img src="{{ asset('assets/images/blog/grid/4cols/post-4.jpg') }}" alt="image desc">
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

              <div class="entry-content">
                <p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas auguae, eu vulputate magna eros ...
                </p>
                <a href="single.html" class="read-more">Continue Reading</a>
              </div>
            </div>
          </article>
        </div>

        <div class="entry-item travel hobbies col-sm-6 col-md-4 col-lg-3">
          <article class="entry entry-grid text-center">
            <figure class="entry-media">
              <a href="single.html">
                <img src="{{ asset('assets/images/blog/grid/4cols/post-5.jpg') }}" alt="image desc">
              </a>
            </figure>

            <div class="entry-body">
              <div class="entry-meta">
                <a href="#">Nov 11, 2018</a>
                <span class="meta-separator">|</span>
                <a href="#">2 Comments</a>
              </div>

              <h2 class="entry-title">
                <a href="single.html">Aenean dignissim pellente squefelis.</a>
              </h2>

              <div class="entry-cats">
                in <a href="#">Travel</a>,
                <a href="#">Hobbies</a>
              </div>

              <div class="entry-content">
                <p>Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus ... </p>
                <a href="single.html" class="read-more">Continue Reading</a>
              </div>
            </div>
          </article>
        </div>

        <div class="entry-item hobbies col-sm-6 col-md-4 col-lg-3">
          <article class="entry entry-grid text-center">
            <figure class="entry-media">
              <a href="single.html">
                <img src="{{ asset('assets/images/blog/grid/4cols/post-6.jpg') }}" alt="image desc">
              </a>
            </figure>

            <div class="entry-body">
              <div class="entry-meta">
                <a href="#">Nov 10, 2018</a>
                <span class="meta-separator">|</span>
                <a href="#">4 Comments</a>
              </div>

              <h2 class="entry-title">
                <a href="single.html">Quisque volutpat mattiseros.</a>
              </h2>

              <div class="entry-cats">
                in <a href="#">Hobbies</a>
              </div>

              <div class="entry-content">
                <p>Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus. Phasellus ultrices nulla quis
                  ...</p>
                <a href="single.html" class="read-more">Continue Reading</a>
              </div>
            </div>
          </article>
        </div>

        <div class="entry-item travel col-sm-6 col-md-4 col-lg-3">
          <article class="entry entry-grid text-center">
            <figure class="entry-media">
              <div class="owl-carousel owl-simple owl-light owl-nav-inside" data-toggle="owl">
                <a href="single.html">
                  <img src="{{ asset('assets/images/blog/grid/4cols/post-7.jpg') }}" alt="image desc">
                </a>
                <a href="single.html">
                  <img src="{{ asset('assets/images/blog/grid/4cols/post-6.jpg') }}" alt="image desc">
                </a>
              </div>
            </figure>

            <div class="entry-body">
              <div class="entry-meta">
                <a href="#">Nov 11, 2018</a>
                <span class="meta-separator">|</span>
                <a href="#">3 Comments</a>
              </div>

              <h2 class="entry-title">
                <a href="single.html">Utaliquam sollicitudin leo.</a>
              </h2>

              <div class="entry-cats">
                in <a href="#">Travel</a>
              </div>

              <div class="entry-content">
                <p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas auguae, eu vulputate magna eros ...
                </p>
                <a href="single.html" class="read-more">Continue Reading</a>
              </div>
            </div>
          </article>
        </div>

        <div class="entry-item fashion col-sm-6 col-md-4 col-lg-3">
          <article class="entry entry-grid text-center">
            <figure class="entry-media">
              <a href="single.html">
                <img src="{{ asset('assets/images/blog/grid/4cols/post-8.jpg') }}" alt="image desc">
              </a>
            </figure>

            <div class="entry-body">
              <div class="entry-meta">
                <a href="#">Nov 08, 2018</a>
                <span class="meta-separator">|</span>
                <a href="#">0 Comments</a>
              </div>

              <h2 class="entry-title">
                <a href="single.html">Quisque a lectus. </a>
              </h2>

              <div class="entry-cats">
                in <a href="#">Fashion</a>
              </div>

              <div class="entry-content">
                <p>Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus ... </p>
                <a href="single.html" class="read-more">Continue Reading</a>
              </div>
            </div>
          </article>
        </div>
      </div>

      <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
          <li class="page-item disabled">
            <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1"
              aria-disabled="true">
              <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
            </a>
          </li>
          <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item">
            <a class="page-link page-link-next" href="#" aria-label="Next">
              Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
@endsection
