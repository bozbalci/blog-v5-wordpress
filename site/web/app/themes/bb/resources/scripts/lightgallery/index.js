import lightGallery from 'lightgallery';

function registerSingleImageLightGallery(element) {
  const options = {
    speed: 500,
    enableDrag: false,
    counter: false,
  };

  lightGallery(element, options);
}

window.onload = () => {
  registerSingleImageLightGallery(document.getElementById('lg-single'));
};
