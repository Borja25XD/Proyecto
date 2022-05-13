let filterAll = document.querySelector('.li-all');
let filterAccesories = document.querySelector('.li-accesories');
let filterBalls = document.querySelector('.li-balls');
let filterClothes = document.querySelector('.li-clothes');
let filterPadelbat = document.querySelector('.li-padelbat');
let filterPadelbatbag = document.querySelector('.li-padelbatbag');
let filterSportshoes = document.querySelector('.li-sportshoes');

let cards = document.getElementsByClassName('item-card');


filterAll.addEventListener('click', function () {
    [...cards].forEach(card => {
        if (card.classList.contains('hidden')) {
            card.classList.remove('hidden');
            card.classList.add('show');
        }
    })
});

filterAccesories.addEventListener('click', function () {
    [...cards].forEach(card => {
        if (card.classList.contains('Accesories')) {
            card.classList.remove('hidden');
            card.classList.add('show');
        } else {
            card.classList.remove('show');
            card.classList.add('hidden');
        }
    })
});

filterBalls.addEventListener('click', function () {
    [...cards].forEach(card => {
        if (card.classList.contains('Balls')) {
            card.classList.remove('hidden');
            card.classList.add('show');
        } else {
            card.classList.remove('show');
            card.classList.add('hidden');
        }
    })
});

filterClothes.addEventListener('click', function () {
    [...cards].forEach(card => {
        if (card.classList.contains('Clothes')) {
            card.classList.remove('hidden');
            card.classList.add('show');
        } else {
            card.classList.remove('show');
            card.classList.add('hidden');
        }
    })
});

filterPadelbat.addEventListener('click', function () {
    [...cards].forEach(card => {
        if (card.classList.contains('Padelbat')) {
            card.classList.remove('hidden');
            card.classList.add('show');
        } else {
            card.classList.remove('show');
            card.classList.add('hidden');
        }
    })
});

filterPadelbatbag.addEventListener('click', function () {
    [...cards].forEach(card => {
        if (card.classList.contains('Padelbatbag')) {
            card.classList.remove('hidden');
            card.classList.add('show');
        } else {
            card.classList.remove('show');
            card.classList.add('hidden');
        }
    })
});

filterSportshoes.addEventListener('click', function () {
    [...cards].forEach(card => {
        if (card.classList.contains('Sportshoes')) {
            card.classList.remove('hidden');
            card.classList.add('show');
        } else {
            card.classList.remove('show');
            card.classList.add('hidden');
        }
    })
});