{extends file="layouts/main.tpl"}

{block name="title"}{$article->getTitle()}{/block}

{block name="css"}
  <link rel="stylesheet" href="/assets/css/article-details.css" />
{/block}

{block name="js"}
  <script src="/assets/js/article-details.js"></script>
{/block}

{block name="main"}
  <main id="main">
    <section id="blog-header">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12 col-lg-6">
            <span
              class="blog-topic text-primary">{$article->getTopic()|upper}</span>
            <h1 class="blog-title">
              {$article->getTitle()|capitalize}
            </h1>
            <p class="blog-author">By Titus Grady</p>
          </div>
          <div class="col-12 col-lg-6">
            <img class="w-100" src="/assets/img/blog/blog-banner.jpg"
              alt="{$article->getTitle()|capitalize}"
              title="{$article->getTitle()|capitalize}" />
          </div>
        </div>
      </div>
    </section>

    <section id="blog-main">
      <div class="blog-main-content">
        {$article->getContent()}
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
  </main>
{/block}