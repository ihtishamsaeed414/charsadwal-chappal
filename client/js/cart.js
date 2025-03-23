"use strick";
// REMOVING CART ITEMS
const cartItem = document.querySelectorAll(".cart-item");
const cartRemove = document.querySelectorAll(".cart-remove-icon");

for (let i = 0; i < cartRemove.length; i++) {
  cartRemove[i].addEventListener("click", function () {
    cartItem[i].classList.add("hidden");
  });
}

// /////////////////////////////////////////////////////////

// CHANGING QUANTITY AND TOTAL AMOUNT

const price = document.querySelectorAll(".price");
const totalPrice = document.querySelectorAll(".total-price");
const quantity = document.querySelectorAll("#input-quantity");
const btnIncrement = document.querySelectorAll(".btn-incr");
const btnDecrement = document.querySelectorAll(".btn-decr");

console.log(quantity);

let tPrice = [];

let qArray = [];
let q = 1;

for (let i = 0; i < cartItem.length; i++) {
  qArray.push(q);
  tPrice.push(price.value);
  totalPrice[i].textContent = price[i].textContent;
}

console.log(qArray);

const increment = function (p, tp, quantity, i) {
  qArray[i]++;
  quantity.value = qArray[i];

  tp.textContent = Number(p.textContent * qArray[i]);
};

const decrement = function (p, tp, quantity, i) {
  if (qArray[i] === 1) return;
  qArray[i]--;
  quantity.value = qArray[i];
  tp.textContent = Number(p.textContent * qArray[i]);
};

for (let i = 0; i < quantity.length; i++) {
  btnIncrement[i].addEventListener("click", function () {
    increment(price[i], totalPrice[i], quantity[i], i);
  });
  btnDecrement[i].addEventListener("click", function () {
    decrement(price[i], totalPrice[i], quantity[i], i);
  });
}

// quantity.addEventListener("change", function () {
//   tp.textContent = Number(totalPrice.textContent * qArray[i]);
// });
