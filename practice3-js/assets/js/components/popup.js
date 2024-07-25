(function () {
  "use strict";

  const $ = document.querySelector.bind(document);
  const $$ = document.querySelectorAll.bind(document);

  HTMLElement.prototype.fadeOut = function () {
    this.style.animation = "fadeOut 0.3s ease-in-out forwards";
    setTimeout(() => {
      this.classList.add("d-none");
      this.style.animation = "fadeIn 0.3s ease-in-out forwards";
    }, 300);
  };

  const popupDialogList = [...$$(".popup .popup-dialog")];
  if (popupDialogList) {
    popupDialogList.forEach((el) => {
      const popupClose = el.querySelector(".icon-close");
      popupClose.onclick = () => el.closest("div.popup").fadeOut();
    });
  }

})();