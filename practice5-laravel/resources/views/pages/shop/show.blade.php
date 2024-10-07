@extends('layouts.public')

@section('title', 'detail')

@section('css')

@endsection

@section('js')

@endsection

@section('main')
  <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
    <div class="container d-flex align-items-center">
      <nav class="product-pager ml-auto" aria-label="Product">
        <a class="product-pager-link product-pager-prev" href="#" aria-label="Previous" tabindex="-1">
          <i class="icon-angle-left"></i>
          <span>Prev</span>
        </a>

        <a class="product-pager-link product-pager-next" href="#" aria-label="Next" tabindex="-1">
          <span>Next</span>
          <i class="icon-angle-right"></i>
        </a>
      </nav>
    </div>
  </nav>

  <div class="page-content">
    <div class="container">
      <div class="product-details-top mb-2">
        <div class="row">
          <div class="col-md-6">
            <div class="product-gallery">
              <figure class="product-main-image">
                <img id="product-zoom" src="{{ asset('assets/images/products/single/extended/3.jpg') }}"
                  data-zoom-image="{{ asset('assets/images/products/single/extended/3-big.jpg') }}" alt="product image">

                <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                  <i class="icon-arrows"></i>
                </a>
              </figure>

              <div id="product-zoom-gallery" class="product-image-gallery">
                <a class="product-gallery-item" href="#"
                  data-image="{{ asset('assets/images/products/single/extended/1.jpg') }}"
                  data-zoom-image="{{ asset('assets/images/products/single/extended/1-big.jpg') }}">
                  <img src="{{ asset('assets/images/products/single/extended/1-small.jpg') }}" alt="product side">
                </a>

                <a class="product-gallery-item" href="#"
                  data-image="{{ asset('assets/images/products/single/extended/2.jpg') }}"
                  data-zoom-image="{{ asset('assets/images/products/single/extended/2-big.jpg') }}">
                  <img src="{{ asset('assets/images/products/single/extended/2-small.jpg') }}" alt="product cross">
                </a>

                <a class="product-gallery-item active" href="#"
                  data-image="{{ asset('assets/images/products/single/extended/3.jpg') }}"
                  data-zoom-image="{{ asset('assets/images/products/single/extended/3-big.jpg') }}">
                  <img src="{{ asset('assets/images/products/single/extended/3-small.jpg') }}" alt="product with model">
                </a>

                <a class="product-gallery-item" href="#"
                  data-image="{{ asset('assets/images/products/single/extended/4.jpg') }}"
                  data-zoom-image="{{ asset('assets/images/products/single/extended/4-big.jpg') }}">
                  <img src="{{ asset('assets/images/products/single/extended/4-small.jpg') }}" alt="product back">
                </a>

              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="product-details">
              <h1 class="product-title">Yellow tie strap block heel sandals</h1>

              <div class="ratings-container">
                <div class="ratings">
                  <div class="ratings-val" style="width: 80%;"></div>
                </div>
                <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reviews )</a>
              </div>

              <div class="product-price">
                $70.00
              </div>

              <div class="product-content">
                <p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue.
                  Morbi purus libero, faucibus adipiscing. Sed lectus. </p>
              </div>

              <div class="details-filter-row details-row-size">
                <label>Color:</label>

                <div class="product-nav product-nav-dots">
                  <a href="#" class="active" style="background: #eab656;"><span class="sr-only">Color
                      name</span></a>
                  <a href="#" style="background: #333333;"><span class="sr-only">Color name</span></a>
                  <a href="#" style="background: #3a588b;"><span class="sr-only">Color name</span></a>
                  <a href="#" style="background: #caab97;"><span class="sr-only">Color name</span></a>
                </div>
              </div>

              <div class="details-filter-row details-row-size">
                <label for="size">Size:</label>
                <div class="select-custom">
                  <select name="size" id="size" class="form-control">
                    <option value="#" selected="selected">Select a size</option>
                    <option value="s">Small</option>
                    <option value="m">Medium</option>
                    <option value="l">Large</option>
                    <option value="xl">Extra Large</option>
                  </select>
                </div>

                <a href="#" class="size-guide"><i class="icon-th-list"></i>size guide</a>
              </div>

              <div class="details-filter-row details-row-size">
                <label for="qty">Qty:</label>
                <div class="product-details-quantity">
                  <input type="number" id="qty" class="form-control" value="1" min="1"
                    max="10" step="1" data-decimals="0" required>
                </div>
              </div>

              <div class="product-details-action">
                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>

                <div class="details-action-wrapper">
                  <a href="#" class="btn-product btn-wishlist" title="Wishlist"><span>Add to Wishlist</span></a>
                  <a href="#" class="btn-product btn-compare" title="Compare"><span>Add to Compare</span></a>
                </div>
              </div>

              <div class="product-details-footer">
                <div class="product-cat">
                  <span>Category:</span>
                  <a href="#">Women</a>,
                  <a href="#">Shoes</a>,
                  <a href="#">Sandals</a>,
                  <a href="#">Yellow</a>
                </div>

                <div class="social-icons social-icons-sm">
                  <span class="social-label">Share:</span>
                  <a href="#" class="social-icon" title="Facebook" target="_blank"><i
                      class="icon-facebook-f"></i></a>
                  <a href="#" class="social-icon" title="Twitter" target="_blank"><i
                      class="icon-twitter"></i></a>
                  <a href="#" class="social-icon" title="Instagram" target="_blank"><i
                      class="icon-instagram"></i></a>
                  <a href="#" class="social-icon" title="Pinterest" target="_blank"><i
                      class="icon-pinterest"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="product-details-tab product-details-extended">
      <div class="container">
        <ul class="nav nav-pills justify-content-center" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab"
              role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab"
              aria-controls="product-review-tab" aria-selected="false">Reviews (2)</a>
          </li>
        </ul>
      </div>

      <div class="tab-content">
        <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel"
          aria-labelledby="product-desc-link">
          <div class="product-desc-content">
            <div class="container">
              <blockquote>
                <p>“ Everything is important - <br>that success is in the details. ”</p>

                <cite>- Steve Jobs</cite>
              </blockquote>
              <p>Nullam mollis. Ut justo. Suspendisse potenti. Sed egestas, ante et vulputate volutpat, eros pede
                semper est, vitae luctus metus libero eu augue. </p>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
          <div class="reviews">
            <div class="container">
              <h3>Reviews (2)</h3>
              <div class="review">
                <div class="row no-gutters">
                  <div class="col-auto">
                    <h4><a href="#">Samanta J.</a></h4>
                    <div class="ratings-container">
                      <div class="ratings">
                        <div class="ratings-val" style="width: 80%;"></div>
                      </div>
                    </div>
                    <span class="review-date">6 days ago</span>
                  </div>
                  <div class="col">
                    <h4>Good, perfect size</h4>

                    <div class="review-content">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus cum dolores assumenda
                        asperiores facilis porro reprehenderit animi culpa atque blanditiis commodi perspiciatis
                        doloremque, possimus, explicabo, autem fugit beatae quae voluptas!</p>
                    </div>

                    <div class="review-action">
                      <a href="#"><i class="icon-thumbs-up"></i>Helpful (2)</a>
                      <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="review">
                <div class="row no-gutters">
                  <div class="col-auto">
                    <h4><a href="#">John Doe</a></h4>
                    <div class="ratings-container">
                      <div class="ratings">
                        <div class="ratings-val" style="width: 100%;"></div>
                      </div>
                    </div>
                    <span class="review-date">5 days ago</span>
                  </div>
                  <div class="col">
                    <h4>Very good</h4>

                    <div class="review-content">
                      <p>Sed, molestias, tempore? Ex dolor esse iure hic veniam laborum blanditiis laudantium iste amet.
                        Cum non voluptate eos enim, ab cumque nam, modi, quas iure illum repellendus, blanditiis
                        perspiciatis beatae!</p>
                    </div>

                    <div class="review-action">
                      <a href="#"><i class="icon-thumbs-up"></i>Helpful (0)</a>
                      <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <h2 class="title text-center mb-4">You May Also Like</h2>
      <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
        data-owl-options='{
                "nav": false, 
                "dots": true,
                "margin": 20,
                "loop": false,
                "responsive": {
                    "0": {
                        "items":1
                    },
                    "480": {
                        "items":2
                    },
                    "768": {
                        "items":3
                    },
                    "992": {
                        "items":4
                    },
                    "1200": {
                        "items":4,
                        "nav": true,
                        "dots": false
                    }
                }
            }'>
        <div class="product product-7">
          <figure class="product-media">
            <span class="product-label label-new">New</span>
            <a href="product.html">
              <img src="{{ asset('assets/images/products/product-4.jpg') }}" alt="Product image"
                class="product-image">
            </a>

            <div class="product-action-vertical">
              <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
              <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick
                  view</span></a>
              <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
            </div>

            <div class="product-action">
              <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
            </div>
          </figure>

          <div class="product-body">
            <div class="product-cat">
              <a href="#">Women</a>
            </div>
            <h3 class="product-title"><a href="product.html">Brown paperbag waist <br>pencil skirt</a></h3>

            <div class="product-price">
              $60.00
            </div>
            <div class="ratings-container">
              <div class="ratings">
                <div class="ratings-val" style="width: 20%;"></div>
              </div>
              <span class="ratings-text">( 2 Reviews )</span>
            </div>
          </div>
        </div>
        <div class="product product-7">
          <figure class="product-media">
            <span class="product-label label-new">New</span>
            <a href="product.html">
              <img src="{{ asset('assets/images/products/product-4.jpg') }}" alt="Product image"
                class="product-image">
            </a>

            <div class="product-action-vertical">
              <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
              <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick
                  view</span></a>
              <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
            </div>

            <div class="product-action">
              <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
            </div>
          </figure>

          <div class="product-body">
            <div class="product-cat">
              <a href="#">Women</a>
            </div>
            <h3 class="product-title"><a href="product.html">Brown paperbag waist <br>pencil skirt</a></h3>

            <div class="product-price">
              $60.00
            </div>
            <div class="ratings-container">
              <div class="ratings">
                <div class="ratings-val" style="width: 20%;"></div>
              </div>
              <span class="ratings-text">( 2 Reviews )</span>
            </div>
          </div>
        </div>
        <div class="product product-7">
          <figure class="product-media">
            <span class="product-label label-new">New</span>
            <a href="product.html">
              <img src="{{ asset('assets/images/products/product-4.jpg') }}" alt="Product image"
                class="product-image">
            </a>

            <div class="product-action-vertical">
              <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
              <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick
                  view</span></a>
              <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
            </div>

            <div class="product-action">
              <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
            </div>
          </figure>

          <div class="product-body">
            <div class="product-cat">
              <a href="#">Women</a>
            </div>
            <h3 class="product-title"><a href="product.html">Brown paperbag waist <br>pencil skirt</a></h3>

            <div class="product-price">
              $60.00
            </div>
            <div class="ratings-container">
              <div class="ratings">
                <div class="ratings-val" style="width: 20%;"></div>
              </div>
              <span class="ratings-text">( 2 Reviews )</span>
            </div>
          </div>
        </div>
        <div class="product product-7">
          <figure class="product-media">
            <span class="product-label label-new">New</span>
            <a href="product.html">
              <img src="{{ asset('assets/images/products/product-4.jpg') }}" alt="Product image"
                class="product-image">
            </a>

            <div class="product-action-vertical">
              <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
              <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick
                  view</span></a>
              <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
            </div>

            <div class="product-action">
              <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
            </div>
          </figure>

          <div class="product-body">
            <div class="product-cat">
              <a href="#">Women</a>
            </div>
            <h3 class="product-title"><a href="product.html">Brown paperbag waist <br>pencil skirt</a></h3>

            <div class="product-price">
              $60.00
            </div>
            <div class="ratings-container">
              <div class="ratings">
                <div class="ratings-val" style="width: 20%;"></div>
              </div>
              <span class="ratings-text">( 2 Reviews )</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
