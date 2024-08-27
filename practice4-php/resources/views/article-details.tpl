{extends file="layouts/main.tpl"}

{block name="title"}{$article->getTitle()}{/block}

{block name="css"}
  <link rel="stylesheet" href="{assets path='assets/css/article-details.css'}" />
{/block}

{block name="js"}
  <script src="{assets path='assets/js/article-details.js'}"></script>
{/block}

{block name="main"}
  <section id="blog-header">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 col-lg-6">
          <span
            class="blog-topic text-primary">{$article->getCategoryName()|upper}</span>
          <h1 class="blog-title">
            {$article->getTitle()|capitalize}
          </h1>
          <p class="blog-author">By {$article->getAuthorName()|capitalize}</p>
        </div>
        <div class="col-12 col-lg-6">
          <img class="w-100"
            src="{assets path='assets/img/blog/articles'}/{$article->getThumbnail()}"
            alt="{$article->getTitle()|capitalize}"
            title="{$article->getTitle()|capitalize}" />
        </div>
      </div>
    </div>
  </section>

  <section id="blog-main">
    <div class="blog-main-content">
      {$article->getContent()|unescape:'html' nofilter}
    </div>
  </section>

  <section
    class="d-flex align-items-center justify-content-center flex-column bg-primary mt-4 p-4"
    style="height: 200px">
    <h2 class="text-white">
      Are you ready to make a difference in the lives of emerging adults?
    </h2>
    <div class="button-group mt-4">
      <a class="btn btn-lg btn-light me-4" href="#!">Explore Programs</a>
      <button class="btn-donate btn btn-lg btn-light">Donate</button>
    </div>
  </section>
{/block}