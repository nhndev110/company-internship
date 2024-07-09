window.addEventListener("DOMContentLoaded", function () {
  const imgList = [...document.querySelectorAll(".list-img img")];
  const imgPreview = document.querySelector(".preview-img img");
  let currentActiveImg = imgList[0];

  imgList.forEach((el) => {
    el.onclick = (ev) => {
      ev.target.classList.add("active");
      imgPreview.src = ev.target.src;
      currentActiveImg.classList.remove("active");
      currentActiveImg = ev.target;
    };
  });

  const colorList = [...this.document.querySelectorAll(".show-color")];
  let currentActiveColor = colorList[0];

  colorList.forEach((el) => {
    el.onclick = (ev) => {
      ev.target.innerHTML = `
        <ion-icon name="checkmark-outline"></ion-icon>
      `;
      currentActiveColor.innerHTML = "";
      currentActiveColor = ev.target;
    };
  });
});
