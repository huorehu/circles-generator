const imageGenerator = document.getElementById('image-generator');

const NUMBER_REG_EXP = /^[1-9]\d{0,5}$/;

const inputs = [
    {
        name: 'width',
        element: document.getElementById('img-width'),
        focusOutDone: false,
        correct: false
    },
    {
        name: 'height',
        element: document.getElementById('img-height'),
        focusOutDone: false,
        correct: false
    },
    {
        name: 'radius',
        element: document.getElementById('circle-radius'),
        focusOutDone: false,
        correct: false
    },
    {
        name: 'amount-circles',
        element: document.getElementById('amount-circles'),
        focusOutDone: false,
        correct: false
    }
];

inputs.forEach(input => {
    addInputEvent(input);
    addFocusOutDoneEvent(input);
});

imageGenerator.addEventListener('submit', e => {
    e.preventDefault();

    if (!isAllFieldsCorrect()) {
        return;
    }

    imageGenerator.submit();
});

function addInputEvent(input) {
    input.element.addEventListener('input', e => {
        const correctNumber = NUMBER_REG_EXP.test(input.element.value);
        const currentElement = e.currentTarget;

        if ((input.focusOutDone && !correctNumber)) {
            showError(currentElement, input);
        } else if (correctNumber) {
            removeError(currentElement, input);
        }

    });
}

function addFocusOutDoneEvent(input) {
    input.element.addEventListener('focusout', () => input.focusOutDone = true);
}

function showError(input, correct) {
    input.classList.add('error');
    correct.correct = false;
}

function removeError(input, correct) {
    input.classList.remove('error');
    correct.correct = true;
}

function isAllFieldsCorrect() {
    let correct = true;
    let width = 0;
    let height = 0;
    let radius = 0;

    inputs.forEach(input => {
        if (!input.correct) {
            correct = false;
            showError(input.element, input.correct);
        }

        switch (input.name) {
            case 'width':
                width = input.element.value;
                break;
            case 'height':
                height = input.element.value;
                break;
            case 'radius':
                radius = input.element.value;
        }
    });

    inputs.forEach(input => {
        switch (input.name) {
            case 'width':
                if (width / 2 < radius) {
                    showError(input.element, input.correct);
                    correct = false;
                }

                break;
            case 'height':
                if (height / 2 < radius) {
                    showError(input.element, input.correct);
                    correct = false;
                }
        }
    });

    return correct;
}
