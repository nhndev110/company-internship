{extends file="layouts/main.tpl"}

{block name="title"}About Us{/block}

{block name="css"}
  <link rel="stylesheet" href="{assets path='assets/css/utils/popup.css'}" />
  <link rel="stylesheet" href="{assets path='assets/css/contact-us.css'}" />
{/block}

{block name="js"}
  <script src="{assets path='assets/js/components/popup.js'}"></script>
  <script src="{assets path='assets/js/contact-us.js'}"></script>
{/block}

{block name="main"}
  <section id="contact-us">
    <div class="container">
      <div class="row flex-column-reverse flex-lg-row">
        <div class="col-12 col-lg-6">
          <div class="contact-us-form">
            <h1 class="title">Contact Us</h1>
            <p>
              We'd love to get in touch with you! Send us a message below
            and we'll contact you in the next 24 hours. Thanks!
            </p>
            <form action="">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingName"
                  placeholder="Jane Pollock" />
                <label for="floatingName">
                  Name
                  <span class="text-danger">*</span>
                </label>
              </div>
              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingEmailAddress"
                  placeholder="jane@example.com" />
                <label for="floatingEmailAddress">
                  Email Address
                  <span class="text-danger">*</span>
                </label>
              </div>
              <div class="form-floating mb-3">
                <textarea name="message" class="form-control" id="floatingMessage"
                  placeholder="How can we help?"></textarea>
                <label for="floatingMessage">
                  Message
                  <span class="text-danger">*</span>
                </label>
              </div>
              <button type="submit" class="w-100 btn btn-primary">
                SEND
              </button>
            </form>
          </div>
        </div>
        <div class="col-12 col-lg-6">
          <div class="contact-us-img">
            <img class="w-100"
              src="{assets path='assets/img/contact-us/contact-us-1.png'}"
              alt="" />
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="social-media">
    <div class="container">
      <h2 class="text-center">Stay in touch</h2>
      <div class="social-media-list d-flex justify-content-center">
        <a href="" class="social-media-link">
          <div class="card">
            <div class="card-body">
              <box-icon class="social-media-icon" color="#0d6efd" type="logo"
                name="facebook"></box-icon>
              <h5 class="card-title">Facebook</h5>
            </div>
          </div>
        </a>
        <a href="" class="social-media-link">
          <div class="card">
            <div class="card-body">
              <box-icon class="social-media-icon" color="#0d6efd" name="instagram"
                type="logo"></box-icon>
              <h5 class="card-title">Instagram</h5>
            </div>
          </div>
        </a>
        <a href="" class="social-media-link">
          <div class="card">
            <div class="card-body">
              <box-icon class="social-media-icon" color="#0d6efd" name="envelope"
                type="solid"></box-icon>
              <h5 class="card-title">Email</h5>
            </div>
          </div>
        </a>
      </div>
    </div>
  </section>
{/block}