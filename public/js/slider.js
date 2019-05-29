let images;

$.ajax({
    method: 'GET',
    url: 'handler.php',
    data: {
        form: 'images'
    },
    async: false
}).done(data => {
    images = data;
});

const RIGHT = 39;
const LEFT = 37;
const CURRENT_IMAGE_CLASS = 'current';

let currentImgNumber = 0;
const $sliderCurrent = $('.slider-current');
const $sliderPreviews = $('.slider-previews');

initSlider();
$('html').on('keydown', showSelectedPicture);
$($sliderPreviews.children()).on('click', showCurrentImgEvn);

/* Initializes slider */
function initSlider() {
    $sliderPreviews.addClass('slider-indicators');

    const result = images.reduce((result, current, index) => result +
        `<li class="${index === 0 ? CURRENT_IMAGE_CLASS : ''}">
            <img alt=${index} src=img/${current} width="60" height="60">
        </li>`,
        '');

    $sliderPreviews.append(result);
}

/* Shows next/previous picture depending which arrow-key was pressed */
function showSelectedPicture(e) {
    const oldImgNumber = currentImgNumber;
    const amountImages = images.length;

    /* change current image number */
    switch (e.keyCode) {
        case RIGHT:
            currentImgNumber = ++currentImgNumber % amountImages;
            break;
        case LEFT:
            currentImgNumber = (currentImgNumber + amountImages - 1) % amountImages;
    }

    showCurrentImg(currentImgNumber, oldImgNumber);
}

/* Shows selected picture */
function showCurrentImgEvn(e) {
    const oldImgNumber = currentImgNumber;

    currentImgNumber = +$(e.currentTarget).children().attr('alt');
    showCurrentImg(currentImgNumber, oldImgNumber);

}

/* Removes old image and adds selected */
function showCurrentImg(currentImgNumber, oldImgNumber) {
    const $listPreviews = $sliderPreviews.children();
    const $img = $sliderCurrent.children();

    $img.attr('src', `img/${images[currentImgNumber]}`);
    $img.attr('alt', `${currentImgNumber}`);
    $img.attr('width', '500');
    $img.attr('height', '500');
    $($listPreviews[oldImgNumber]).removeClass(CURRENT_IMAGE_CLASS);
    $($listPreviews[currentImgNumber]).addClass(CURRENT_IMAGE_CLASS);
}
