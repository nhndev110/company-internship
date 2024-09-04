{extends file="layouts/main.tpl"}

{block name="title"}Get Involved{/block}

{block name="css"}
  <link rel="stylesheet" href="{assets path='assets/css/utils/popup.css'}" />
  <link rel="stylesheet" href="{assets path='assets/css/get-involved.css'}" />
{/block}

{block name="js"}
  <script src="{assets path='assets/js/components/popup.js'}"></script>
  <script src="{assets path='assets/js/get-involved.js'}"></script>
{/block}

{block name="main"}
  <section id="volunteer">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-6">
          <div class="contact-us-img">
            <img class="w-100" src="assets/img/volunteer/volunteer1.jpg" alt="" />
          </div>
        </div>
        <div class="col-12 col-lg-6">
          <div class="volunteer-form">
            <h1 class="title">Volunteer with us!</h1>
            <p class="desc">
              There are so many opportunities to make a difference in the
              lives of emerging adults! Sign up to join us!
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
                  placeholder="(option)"></textarea>
                <label for="floatingMessage">
                  How are you interested in helping?
                  <span class="text-danger">*</span>
                </label>
              </div>
              <button type="submit" class="w-100 btn btn-primary">
                SEND
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="programs">
    <div class="container">
      <h2 class="text-center">
        We need your help to make these programs happen!
      </h2>
      <div class="program py-3">
        <div class="row align-items-center">
          <div class="col-12 col-lg-6">
            <img class="w-100" src="assets/img/volunteer/program1.jpeg" alt="" />
          </div>
          <div class="col-12 col-lg-6">
            <div class="program-content">
              <h3>College peer mentorships</h3>
              <p>
                Quam dolorum qui rerum ipsum sed sapiente. Aut porro enim
                fugit magni consequatur delectus est. Sit officiis
                corporis sit. Sunt magni solu
              </p>
              <a class="btn btn-primary" href="#">VOLUNTEER</a>
            </div>
          </div>
        </div>
      </div>
      <div class="program py-3">
        <div class="row align-items-center">
          <div class="col-12 col-lg-6">
            <div class="program-content">
              <h3>College peer mentorships</h3>
              <p>
                Quam dolorum qui rerum ipsum sed sapiente. Aut porro enim
                fugit magni consequatur delectus est. Sit officiis
                corporis sit. Sunt magni solu
              </p>
              <a class="btn btn-primary" href="#">VOLUNTEER</a>
            </div>
          </div>
          <div class="col-12 col-lg-6">
            <img class="w-100" src="assets/img/volunteer/program1.jpeg" alt="" />
          </div>
        </div>
      </div>
      <div class="program py-3">
        <div class="row align-items-center">
          <div class="col-12 col-lg-6">
            <img class="w-100" src="assets/img/volunteer/program1.jpeg" alt="" />
          </div>
          <div class="col-12 col-lg-6">
            <div class="program-content">
              <h3>College peer mentorships</h3>
              <p>
                Quam dolorum qui rerum ipsum sed sapiente. Aut porro enim
                fugit magni consequatur delectus est. Sit officiis
                corporis sit. Sunt magni solu
              </p>
              <a class="btn btn-primary" href="#">VOLUNTEER</a>
            </div>
          </div>
        </div>
      </div>
      <div class="program py-3">
        <div class="row align-items-center">
          <div class="col-12 col-lg-6">
            <div class="program-content">
              <h3>College peer mentorships</h3>
              <p>
                Quam dolorum qui rerum ipsum sed sapiente. Aut porro enim
                fugit magni consequatur delectus est. Sit officiis
                corporis sit. Sunt magni solu
              </p>
              <a class="btn btn-primary" href="#">VOLUNTEER</a>
            </div>
          </div>
          <div class="col-12 col-lg-6">
            <img class="w-100" src="assets/img/volunteer/program1.jpeg" alt="" />
          </div>
        </div>
      </div>
    </div>
  </section>
{/block}