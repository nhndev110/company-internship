window.addEventListener("DOMContentLoaded", function () {
  handleSelectImg();

  handleSelectColor();

  handleShowMoreDescription();

  handleAddToBag();
});

const handleSelectImg = () => {
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
};

const handleSelectColor = () => {
  const colorList = [...document.querySelectorAll(".show-color")];
  let currentActiveColor = colorList[0];

  colorList.forEach((el) => {
    el.onclick = (ev) => {
      ev.target.innerHTML = `
        <box-icon name='check' color='#ffffff' ></box-icon>
      `;
      currentActiveColor.innerHTML = "";
      currentActiveColor = ev.target;
    };
  });
};

const handleShowMoreDescription = () => {
  const btnShowMore = document.querySelector(".product-description .show-more");

  btnShowMore.onclick = (ev) => {
    const nodeDescription = document.querySelector(".product-description");

    ev.target.remove();
    nodeDescription.append(
      "Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo hic ab ex temporibus provident, voluptates dolor accusantium iusto cumque vero distinctio voluptate maiores, consectetur corporis voluptas laboriosam. Facere, mollitia velit."
    );
  };
};

const handleAddToBag = () => {
  const btnAddToBag = document.querySelector(".btn-add-to-bag");
  const toastContainer = document.querySelector(".toast-container");

  const handleShowToast = ({ status, title, desc, duration }) => {
    const listIcon = {
      success: "<box-icon name='check-circle' color='#44c021'></box-icon>",
      warning: "<box-icon name='error' color='#d4de21'></box-icon>",
    };

    const nodeToast = document.createElement("div");
    nodeToast.classList.add("toast", `toast-${status}`);
    nodeToast.innerHTML = `
      <div class="toast-icon">
        ${listIcon[status]}
      </div>
      <div class="toast-content">
        <h2 class="toast-title">${title}</h2>
        <p class="toast-desc">${desc}</p>
      </div>
      <box-icon class="toast-close" name="x"></box-icon>
    `;
    nodeToast.style.animation = "slideInRight 0.3s ease-in-out";

    toastContainer.append(nodeToast);
    const toastClose = nodeToast.querySelector(".toast-close");

    toastClose.onclick = () => {
      nodeToast.remove();
    };

    setTimeout(() => {
      nodeToast.style.animation = "fadeOut 0.3s ease-in-out forwards";
      setTimeout(() => {
        nodeToast.remove();
      }, 300);
    }, duration * 1000);
  };

  btnAddToBag.onclick = () => {
    handleShowToast({
      status: "success",
      title: "Thành Công",
      desc: "Bạn đã thêm sản phẩm vào giỏ hàng",
      duration: 3,
    });
  };
};
