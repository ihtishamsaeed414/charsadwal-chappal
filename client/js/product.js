"use strick";

const mainImage = document.querySelector(".main-img");
const smallImage = document.querySelectorAll(".small-img");

console.log(mainImage);
console.log(smallImage);

smallImage.forEach((img) =>
  img.addEventListener("click", function () {
    mainImage.src = img.src;
  })
);

// ///////////////////////////////////////////////////
// changing quantity of product

const btnIncrement = document.querySelector(".btn-incr");
const btnDecrement = document.querySelector(".btn-decr");
const quantity = document.querySelector("#input-quantity");

let q = 1;

const increment = function () {
  q++;
  Number((quantity.value = q));
};

const decrement = function () {
  if (q === 1) return;
  q--;
  Number((quantity.value = q));
};

btnIncrement.addEventListener("click", function () {
  increment();
});

btnDecrement.addEventListener("click", function () {
  decrement();
});

// /////////////////////////////////////////////////////////
// click on product
const card = document.querySelectorAll(".card");

card.forEach((c) =>
  c.addEventListener("click", function () {
    window.open("product.html", "_self");
  })
);
