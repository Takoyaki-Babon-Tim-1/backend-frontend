const swiper = new Swiper(".swiper", {
    // Optional parameters
    direction: "horizontal",
    spaceBetween: 16,
    slidesPerView: "auto",
    slidesOffsetBefore: 20,
    slidesOffsetAfter: 20,
});



// image modal in profile
function openImageModal(imageSrc) {
    const modal = document.getElementById("imageModal");
    const zoomedImage = document.getElementById("zoomedImage");

    zoomedImage.src = imageSrc;
    modal.classList.add("opacity-100", "pointer-events-auto");

    document.body.style.overflow = "hidden";
}

function closeImageModal() {
    const modal = document.getElementById("imageModal");
    modal.classList.remove("opacity-100", "pointer-events-auto");

    document.body.style.overflow = "auto";
}

document.getElementById("imageModal").addEventListener("click", function (e) {
    if (e.target === this) {
        closeImageModal();
    }
});

// modal onboarding
function closeOnboarding() {
    document.getElementById('onboarding').style.display = 'none';
  }