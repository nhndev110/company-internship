@extends('layouts.public')

@section('title', 'Blog - Molla')

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
      </ol>
    </div>
  </nav>

  <div class="page-content">
    <div class="container">
      <nav class="blog-nav">
        <ul class="menu-cat entry-filter justify-content-center">
          <li class="active"><a href="#" data-filter="*">All Blog Posts<span>8</span></a></li>
          @foreach ($categories as $category)
            <li>
              <a href="#" data-filter=".{{ $category->name }}">
                {{ $category->name }}
                <span>3</span>
              </a>
            </li>
          @endforeach
        </ul>
      </nav>

      <div class="entry-container max-col-4" data-layout="fitRows">
        @foreach ($articles as $article)
          <div class="entry-item {{ $article->category->name }} col-sm-6 col-md-4 col-lg-3">
            <article class="entry entry-grid text-center">
              <figure class="entry-media">
                <a href="{{ route('blog.show', [$article->slug, $article->id]) }}">
                  <img src="{{ asset('/storage/articles/') . '/' . $article->thumbnail }}" alt="image desc">
                </a>
              </figure>

              <div class="entry-body">
                <div class="entry-meta">
                  <a href="#">{{ $article->created_at }}</a>
                  <span class="meta-separator">|</span>
                  <a href="#">2 Comments</a>
                </div>

                <h2 class="entry-title">
                  <a href="{{ route('blog.show', [$article->slug, $article->id]) }}">
                    {{ $article->title }}
                  </a>
                </h2>

                <div class="entry-cats">
                  in <a href="#">{{ $article->category->name }}</a>
                </div>

                <div class="entry-content">
                  <p>{{ $article->description }}</p>
                  <a href="{{ route('blog.show', [$article->slug, $article->id]) }}" class="read-more">
                    Continue Reading
                  </a>
                </div>
              </div>
            </article>
          </div>
        @endforeach
      </div>

      <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
          <li class="page-item disabled">
            <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
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
