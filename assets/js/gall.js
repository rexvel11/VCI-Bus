const filterItem = document.querySelector(".items");
const filterImg = document.querySelectorAll(".gallery .image");
const searchBar = document.getElementById("searchBar");

window.onload = () => {
  // Category filtering logic
  filterItem.onclick = (selectedItem) => {
    if (selectedItem.target.classList.contains("item")) {
      filterItem.querySelector(".active").classList.remove("active");
      selectedItem.target.classList.add("active");
      let filterName = selectedItem.target
        .getAttribute("data-name")
        .toLowerCase();
      filterGallery(filterName);
    }
  };

  // Search bar event listener
  searchBar.addEventListener("input", function () {
    const searchValue = searchBar.value.toLowerCase();
    filterGallery(searchValue);
  });

  // Preview logic for images
  for (let i = 0; i < filterImg.length; i++) {
    filterImg[i].setAttribute("onclick", "preview(this)");
  }
};

// Function to filter the gallery based on either search input or category selection
function filterGallery(filterText) {
  filterImg.forEach((image) => {
    let filterName = image.getAttribute("data-name").toLowerCase();

    // Check if the filter matches the image category or if it's an empty filter (for all items)
    if (
      filterName.includes(filterText) ||
      filterText === "" ||
      filterText === "all"
    ) {
      image.classList.remove("hide");
      image.classList.add("show");
    } else {
      image.classList.add("hide");
      image.classList.remove("show");
    }
  });
}

// Preview logic for displaying a larger image
const previewBox = document.querySelector(".preview-box"),
  categoryName = previewBox.querySelector(".title p"),
  previewImg = previewBox.querySelector("img"),
  closeIcon = previewBox.querySelector(".icon"),
  shadow = document.querySelector(".shadow");

function preview(element) {
  document.querySelector("body").style.overflow = "hidden";
  let selectedPrevImg = element.querySelector("img").src;
  previewImg.src = selectedPrevImg;
  previewBox.classList.add("show");
  shadow.classList.add("show");

  closeIcon.onclick = () => {
    previewBox.classList.remove("show");
    shadow.classList.remove("show");
    document.querySelector("body").style.overflow = "auto";
  };
}
