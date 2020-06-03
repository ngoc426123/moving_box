$(document).ready(() => {
  $(window).on(`load`, () => {
    $('.gridMasonry').masonry({
      columnWidth: '.colHeight',
      itemSelector: '.col',
      percentPosition: true,
    });
    $('.gridMasonry a').fancybox();
  });
});