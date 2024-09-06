<header class="header header-intro-clearance header-4">
  <div class="header-top">
    <div class="container">
      <div class="header-left">
        <a href="tel:#"><i class="icon-phone"></i>Call: +0123 456 789</a>
      </div>

      <div class="header-right">
        <ul class="top-menu">
          <li>
            <a href="#">Links</a>
            <ul>
              <li>
                <div class="header-dropdown">
                  <a href="#">USD</a>
                  <div class="header-menu">
                    <ul>
                      <li><a href="#">Eur</a></li>
                      <li><a href="#">Usd</a></li>
                    </ul>
                  </div>
                </div>
              </li>
              <li>
                <div class="header-dropdown">
                  <a href="#">English</a>
                  <div class="header-menu">
                    <ul>
                      <li><a href="#">English</a></li>
                      <li><a href="#">French</a></li>
                      <li><a href="#">Spanish</a></li>
                    </ul>
                  </div>
                </div>
              </li>
              @auth
                <li>
                  <div class="header-dropdown">
                    <a href="/profile">{{ Auth::user()->name }}</a>
                    <div class="header-menu">
                      <ul>
                        <li><a class="py-2" href="#">My Account</a></li>
                        <li><a class="py-2" href="#">My Purchase</a></li>
                        <li><a class="py-2" href="{{ url('logout') }}">Logout</a></li>
                      </ul>
                    </div>
                  </div>
                </li>
              @else
                <li><a href="/login">Sign in / Sign up</a></li>
              @endauth
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="header-middle">
    <div class="container">
      <div class="header-left">
        <button class="mobile-menu-toggler">
          <span class="sr-only">Toggle mobile menu</span>
          <i class="icon-bars"></i>
        </button>

        <a href="{{ route('home.index') }}" class="logo">
          <img src="{{ asset('assets/images/demos/demo-4/logo.png') }}" alt="Molla Logo" width="105" height="25">
        </a>
      </div>

      <div class="header-center">
        <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
          <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
          <form action="#" method="get">
            <div class="header-search-wrapper search-wrapper-wide">
              <label for="q" class="sr-only">Search</label>
              <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
              <input type="search" class="form-control" name="q" id="q" placeholder="Search product ..."
                required>
            </div>
          </form>
        </div>
      </div>

      <div class="header-right">
        <div class="dropdown compare-dropdown">
          <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false" data-display="static" title="Compare Products" aria-label="Compare Products">
            <div class="icon">
              <i class="icon-random"></i>
            </div>
            <p>Compare</p>
          </a>

          <div class="dropdown-menu dropdown-menu-right">
            <ul class="compare-products">
              <li class="compare-product">
                <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                <h4 class="compare-product-title"><a href="product.html">Blue Night Dress</a></h4>
              </li>
              <li class="compare-product">
                <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                <h4 class="compare-product-title"><a href="product.html">White Long Skirt</a></h4>
              </li>
            </ul>

            <div class="compare-actions">
              <a href="#" class="action-link">Clear All</a>
              <a href="#" class="btn btn-outline-primary-2">
                <span>Compare</span>
                <i class="icon-long-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>

        <div class="wishlist">
          <a href="wishlist.html" title="Wishlist">
            <div class="icon">
              <i class="icon-heart-o"></i>
              <span class="wishlist-count badge">3</span>
            </div>
            <p>Wishlist</p>
          </a>
        </div>

        <div class="dropdown cart-dropdown">
          <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false" data-display="static">
            <div class="icon">
              <i class="icon-shopping-cart"></i>
              <span class="cart-count">2</span>
            </div>
            <p>Cart</p>
          </a>

          <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-cart-products">
              <div class="product">
                <div class="product-cart-details">
                  <h4 class="product-title">
                    <a href="product.html">Beige knitted elastic runner shoes</a>
                  </h4>

                  <span class="cart-product-info">
                    <span class="cart-product-qty">1</span>
                    x $84.00
                  </span>
                </div>

                <figure class="product-image-container">
                  <a href="product.html" class="product-image">
                    <img src="{{ asset('assets/images/products/cart/product-1.jpg') }}" alt="product">
                  </a>
                </figure>
                <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
              </div>

              <div class="product">
                <div class="product-cart-details">
                  <h4 class="product-title">
                    <a href="product.html">Blue utility pinafore denim dress</a>
                  </h4>

                  <span class="cart-product-info">
                    <span class="cart-product-qty">1</span>
                    x $76.00
                  </span>
                </div>

                <figure class="product-image-container">
                  <a href="product.html" class="product-image">
                    <img src="{{ asset('assets/images/products/cart/product-2.jpg') }}" alt="product">
                  </a>
                </figure>
                <a href="#" class="btn-remove" title="Remove Product">
                  <i class="icon-close"></i>
                </a>
              </div>
            </div>

            <div class="dropdown-cart-total">
              <span>Total</span>
              <span class="cart-total-price">$160.00</span>
            </div>

            <div class="dropdown-cart-action">
              <a href="cart.html" class="btn btn-primary">View Cart</a>
              <a href="checkout.html" class="btn btn-outline-primary-2">
                <span>Checkout</span>
                <i class="icon-long-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="header-bottom sticky-header">
    <div class="container">
      <div class="header-left">
        <div class="dropdown category-dropdown">
          <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false" data-display="static" title="Browse Categories">
            Browse Categories <i class="icon-angle-down"></i>
          </a>

          <div class="dropdown-menu">
            <nav class="side-nav">
              <ul class="menu-vertical sf-arrows">
                <li class="item-lead"><a href="#">Daily offers</a></li>
                <li class="item-lead"><a href="#">Gift Ideas</a></li>
                <li><a href="#">Beds</a></li>
                <li><a href="#">Lighting</a></li>
                <li><a href="#">Sofas & Sleeper sofas</a></li>
                <li><a href="#">Storage</a></li>
                <li><a href="#">Armchairs & Chaises</a></li>
                <li><a href="#">Decoration </a></li>
                <li><a href="#">Kitchen Cabinets</a></li>
                <li><a href="#">Coffee & Tables</a></li>
                <li><a href="#">Outdoor Furniture </a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>

      <div class="header-center">
        <nav class="main-nav">
          <ul class="menu sf-arrows">
            <li>
              <a href="{{ route('home.index') }}">Home</a>
            </li>
            <li>
              <a href="{{ route('shop.index') }}">Shop</a>
            </li>
            <li>
              <a href="{{ route('blog.index') }}">Blog</a>
            </li>
          </ul>
        </nav>
      </div>

      <div class="header-right">
        <i class="la la-lightbulb-o"></i>
        <p>Clearance<span class="highlight">&nbsp;Up to 30% Off</span></p>
      </div>
    </div>
  </div>
</header>
