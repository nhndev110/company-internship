const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

(function () {
  "use strict";

  const btnDonateList = [...$$(".btn-donate")];
  const popupDonationForm = $("#popupDonationForm");
  btnDonateList.forEach((el) => {
    el.onclick = () => {
      popupDonationForm.classList.remove("d-none");
    };
  });

  switchPaymentPopupDonation();

  slider();
})();

function slider() {
  const btnPrevSlider = $(".btn-prev-slider");
  const btnNextSlider = $(".btn-next-slider");
  const sliderInner = $(".slider-inner");
  const slideItemList = [...$$(".slider-item")];
  const slideItemListLen = slideItemList.length;
  let currentIndex = 0;
  let left = 0;

  btnNextSlider.onclick = () => {
    if (currentIndex >= slideItemListLen - 2) return;

    const screenWidth = document.body.clientWidth
    const widthLastTwoSlide =
      slideItemList[slideItemListLen - 1].offsetWidth +
      slideItemList[slideItemListLen - 2].offsetWidth

    const marginLeftSlideItemCurrent = parseFloat(window.getComputedStyle(slideItemList[1]).marginLeft)
    left += slideItemList[currentIndex].offsetWidth + marginLeftSlideItemCurrent;
    if (currentIndex == slideItemListLen - 3 && widthLastTwoSlide < screenWidth) {
      left -= screenWidth - widthLastTwoSlide - marginLeftSlideItemCurrent;
    }
    ++currentIndex;

    sliderInner.style.left = `-${left}px`;
  };

  btnPrevSlider.onclick = () => {
    if (currentIndex > 0) {
      left -= slideItemList[currentIndex].offsetWidth + 40;
      if (left <= 0) {
        left = 0;
      }
      sliderInner.style.left = `-${left}px`;
      --currentIndex;
    }
  };
}

function switchPaymentPopupDonation() {
  const nodePaymentToggleContent = $(".payment-toggle-content");
  const paymentMethods = [
    ...$$(".payment-methods input[name='paymentMethod']"),
  ];

  paymentMethods.forEach((el) => {
    el.onchange = (ev) => {
      if (ev.target.value == 1) {
        nodePaymentToggleContent.innerHTML = `
          <div class="col-md-6">
            <label for="inputName" class="form-label">
              Name
              <span class="text-danger">*</span>
            </label>
            <input
              type="text"
              class="form-control"
              id="inputName"
            />
          </div>
          <div class="col-md-6">
            <label
              for="inputCreditCardNumber"
              class="form-label"
            >
              Credit Card Number
              <span class="text-danger">*</span>
            </label>
            <input
              type="text"
              class="form-control"
              id="inputCreditCardNumber"
            />
          </div>
          <div class="col-md-6">
            <label
              for="inputSecurityCode"
              class="form-label"
            >
              Security Code
              <span class="text-danger">*</span>
            </label>
            <input
              type="text"
              class="form-control"
              id="inputSecurityCode"
            />
          </div>
          <div class="col-md-6">
            <label
              for="inputCardExpiration"
              class="form-label"
            >
              Card Expiration
              <span class="text-danger">*</span>
            </label>
            <input
              type="text"
              class="form-control"
              id="inputCardExpiration"
            />
          </div>
        `;
      } else if (ev.target.value == 2) {
        nodePaymentToggleContent.innerHTML = `
          <div class="alert alert-primary" role="alert">
            Please click one of the PayPal options to complete payment and <span class="badge text-bg-primary">submit</span> the form.
          </div>
        `;
      } else {
        nodePaymentToggleContent.innerHTML = "";
      }
    };
  });
}
