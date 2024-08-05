{extends file="layouts/main.tpl"}

{block name="title"}Blog{/block}

{block name="css"}
  <link rel="stylesheet" href="{assets path='assets/css/blog.css'}" />
{/block}

{block name="js"}
  <script src="{assets path='assets/js/blog.js'}"></script>
{/block}

{block name="main"}
  <section id="featured-post">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 col-md-6">
          <img class="w-100"
            src="{assets path='/assets/img/blog/blog-banner.jpg'}"
            alt="How COVID-19 changed our outlook on helping from a distance."
            title="How COVID-19 changed our outlook on helping from a distance." />
        </div>
        <div class="col-12 col-md-6">
          <span class="topic text-primary">FEATURED POST</span>
          <h1 class="title">
            How COVID-19 changed our outlook on helping from a distance.
          </h1>
          <p class="desc">
            Create a clean, unique, easy to use website! Jumpstart your
            non-profit website design or modernize up your existing 501c3
            with this clean, lively template for any non-profit!
          </p>
          <a href="article-details.php"
            class="btn-read btn btn-primary btn-lg">READ</a>
        </div>
      </div>
    </div>
  </section>

  <section id="all-post">
    <div class="container">
      <h2 class="text-center">All posts</h2>
      {if empty($articles)}
        <div class="alert alert-light text-center" role="alert">
          Chưa có bài viết nào
        </div>
      {else}
        <div
          class="row justify-content-center row-cols-1 row-cols-md-2 row-cols-xl-4 g-4">
          {foreach $articles as $article}
            <div class="col">
              <div class="card rounded-0 border-0">
                <img src="{assets path=$article->getThumbnail()}"
                  class="card-img-top rounded-0"
                  title="{$article->getTitle()|capitalize}"
                  alt="{$article->getTitle()|capitalize}" />
                <div class="card-body px-0">
                  <span class="topic">{$article->getTopic()|upper}</span>
                  <h5 class="card-title">{$article->getTitle()|capitalize}</h5>
                  <p class="card-text">
                    {$article->getContent()|truncate:200:"...":true}
                  </p>
                  <a href="/blog/{$article->getId()}"
                    class="btn btn-primary rounded-0 d-block d-lg-inline-block">
                    READ NOW
                  </a>
                </div>
              </div>
            </div>
          {/foreach}
        </div>
      {/if}
    </div>
  </section>
{/block}