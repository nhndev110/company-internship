{extends file="layouts/main.tpl"}

{block name="title"}About Us{/block}

{block name="css"}
  <link rel="stylesheet" href="{assets path='assets/css/about.css'}" />
{/block}

{block name="js"}

{/block}

{block name="main"}
  <section id="about">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 col-lg-6">
          <img class="w-100" src="{assets path='assets/img/about/about-img.jpeg'}"
            alt="" />
        </div>
        <div class="col-12 col-lg-6">
          <h1 class="title">It started with an idea</h1>
          <p>
            Orci bibendum tellus eget risus. Habitasse lorem orci viverra
            sed sagittis, risus elementum. Nulla leo sed sed in quam.
            Posuere mauris nulla massa platea ornare dignissim eu. Tellus
            lacus, neque erat aenean sed faucibus sit. In venenatis quam
            et vel scelerisque feugiat in vel. Non, egestas justo, lacinia
            sem facilisis eget semper. Arcu elementum tempor proin vitae
            sed. Praesent sit dui augue tincidunt volutpat vulputate
            ligula. Tellus aliquet suscipit senectus ipsum urna, nisl nunc
            ultricies massa. Elementum, ornare massa quisque aenean
            consequat amet. Diam enim, ac fermentum, ullamcorper id
            placerat ac, dictumst. Suspendisse blandit posuere id
            pharetra, ultrices consectetur enim ut.
          </p>
          <p>
            Nunc imperdiet at turpis sollicitudin vulputate velit. Commodo
            augue dolor ornare purus lobortis dui. Nisl mollis sodales
            porta vitae nulla pharetra amet, duis. Rhoncus tincidunt
            sollicitudin et sed iaculis senectus ornare sagittis. Est leo
            sed euismod id odio commodo consequat. Elit magna vitae
            ullamcorper posuere sagittis, sed natoque. Eget eget vulputate
            porttitor massa porttitor egestas donec. Id tellus parturient
            sit aliquam neque condimentum auctor.
          </p>
          <a href="our-mission.html" class="btn btn-primary btn-lg">OUR MISSON</a>
        </div>
      </div>
    </div>
  </section>
{/block}