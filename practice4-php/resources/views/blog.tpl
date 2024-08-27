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
            src="{assets path='/assets/img/blog/articles'}/{$highlight->getThumbnail()}"
            alt="{$highlight->getTitle()}" title="{$highlight->getTitle()}" />
        </div>
        <div class="col-12 col-md-6">
          <span class="topic text-primary">{$highlight->getCategoryName()}</span>
          <h1 class="title">
            {$highlight->getTitle()}
          </h1>
          <p class="desc">
            {$highlight->getDescription()}
          </p>
          <a href="/blog/{$highlight->getSlug()}-{$highlight->getId()}"
            class="btn-read btn btn-primary btn-lg">READ</a>
        </div>
      </div>
    </div>
  </section>

  <section id="article-list">
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
              <div class="article card rounded-0 border-0">
                <div class="article-thumbnail-wrapper">
                  <img
                    src="{assets path='/assets/img/blog/articles'}/{$article->getThumbnail()}"
                    class="card-img-top rounded-0 article-thumbnail"
                    title="{$article->getTitle()|capitalize}"
                    alt="{$article->getTitle()|capitalize}" />
                </div>
                <div class="card-body px-0">
                  <span class="article-category">
                    {$article->getCategoryName()|upper}
                  </span>
                  <h5 class="card-title article-title">
                    <span>
                      {$article->getTitle()|capitalize}
                    </span>
                  </h5>
                  <p class="card-text article-description">
                    <span>
                      {$article->getDescription()}
                    </span>
                  </p>
                  <a href="/blog/{$article->getSlug()}-{$article->getId()}"
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