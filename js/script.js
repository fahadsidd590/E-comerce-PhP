$("#search-icon").click(function () {
  $(".nav").toggleClass("search");
  $(".nav").toggleClass("no-search");
  $(".search-input").toggleClass("search-active");
});

$('.menu-toggle').click(function () {
  $(".nav").toggleClass("mobile-nav");
  $(this).toggleClass("is-active");
});
function showproduct(n) {
  let elements = document.querySelectorAll(".pro");
  let elements1 = document.querySelectorAll(".products");
  elements1.forEach(element => {
    element.classList.add('notshow');
  });
  elements.forEach(element => {
    element.classList.remove('active');
  });
  elements1[n].classList.remove('notshow');
  elements[n].classList.add('active');
}
function addcart(data) {
  let products = [];
  if (localStorage.getItem('products')) {
    products = JSON.parse(localStorage.getItem('products'));
  }
  products.push({ 'productId': data });
  localStorage.setItem('products', JSON.stringify(products));
  // console.log(localStorage.getItem('products'))
  alert("Item added to cart");
}
function addchart() {
  let products = localStorage.getItem('products');
  console.log(products)
  if(products!=null){
  let bc = products.split(',')
  let num = bc.length;
  let a, b, c, tr, num1, num2, total = 0;
  let m = document.querySelector("#total");
  let n = document.querySelector('.tbody1');

  fetch('./csvjson.json').then(response => {
    return response.json();
  }).then(data => {
    // console.log("hhekrh")
    for (let i = 0; i < num; i++) {
      a = bc[i].split(':');
      b = a[1].split('}')
      c = b[0];
      num1 = data[c]['Only 39.99'];
      num1 = num1.split('Only');
      num2 = Number(num1[1]);
      total = num2 + total;
      // console.log(total)
      tr = `<tr>
    <th scope="row">${i + 1}</th>
    <td><img class= "img-fluid img" src="${data[c]['./images/items/hoodies/hoodie (1).jpg']}"></td>
    <td>${data[c]['UCLan Hoodie']}</td>
    <td>${data[c]['Only 39.99']}</td>
  </tr>`;
      n.innerHTML += tr;

    }
    n.innerHTML += `<tr id="total">
    <th colspan="3">Total:</th>
    
    <td>$ ${total.toFixed(2)}</td>
  </tr>`;
  }).catch(err => {
    alert("no data found");
  });}else{
    let m1 = document.querySelector(".fb");
    let pro= document.querySelector(".pro1");
    let sho=`<div><p>There are no item in your shopping chart.please select product from <a href="./products.php">products.php </a> </p></div>`; 
    m1.innerHTML += sho;
    pro.style.display="none";
  }
}
function show() {
  let card = document.querySelector(".card2");
  card.style.display = "block"
  let text = document.querySelectorAll('.text')
  if (text[0].style.color == 'green' && text[1].style.color == 'green' && text[2].style.color == 'green' && text[3].style.color == 'green') {
    // console.log("yes");
    card.style.display = "none"
  }
  else {
    card.style.display = "block"
  }

}
function validate() {
  let pass = document.querySelector("#exampleFormControlInput3");
  let text = document.querySelectorAll('.text');
  let icon = document.querySelectorAll('.icon');
  let card = document.querySelector(".card2");
  let re = /[A-Z]/gm;
  let re1 = /[a-z]/gm;
  let re2 = /[0-9]/gm;
  let found = pass.value.match(re);
  let found1 = pass.value.match(re1);
  let found2 = pass.value.match(re2);
  if (pass.value.length >= 8) {
    text[3].style.color = 'green';
    icon[3].classList.remove('fa-times');
    icon[3].classList.add('fa-check');
  }
  else {
    text[3].style.color = 'red';
    icon[3].classList.remove('fa-check');
    icon[3].classList.add('fa-times');
  }
  if (found != null) {
    text[1].style.color = 'green';
    icon[1].classList.remove('fa-times');
    icon[1].classList.add('fa-check');
  } else {
    text[1].style.color = 'red';
    icon[1].classList.remove('fa-check');
    icon[1].classList.add('fa-times');
  }
  if (found1 != null) {
    text[0].style.color = 'green';
    icon[0].classList.remove('fa-times');
    icon[0].classList.add('fa-check');
  } else {
    text[0].style.color = 'red';
    icon[0].classList.remove('fa-check');
    icon[0].classList.add('fa-times');
  }
  if (found2 != null) {
    text[2].style.color = 'green';
    icon[2].classList.remove('fa-times');
    icon[2].classList.add('fa-check');
  } else {
    text[2].style.color = 'red';
    icon[2].classList.remove('fa-check');
    icon[2].classList.add('fa-times');
  }
  if (text[0].style.color == 'green' && text[1].style.color == 'green' && text[2].style.color == 'green' && text[3].style.color == 'green') {
    // console.log("yes");
    card.style.display = "none"
  }
  else {
    card.style.display = "block"
  }
}
function passvalidate() {
  let pass1 = document.querySelector('#exampleFormControlInput3');
  let pass2 = document.querySelector('#exampleFormControlInput4');
  if (pass1.value == pass2.value) {
  }
  else {
    alert('Password doesnot match');
    pass2.value = "";
  }
}

function deletechart() {
alert("you cart is check out");
  window.localStorage.clear();
  window.location.reload(true);
}
function myFunction() {
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  ul = document.querySelector(".two");
  // console.log(ul);
  li = ul.getElementsByClassName("cards1");
  // console.log(li);
  for (i = 0; i < li.length; i++) {

      a = li[i].getElementsByClassName("card-title")[0];
      txtValue = a.textContent || a.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
          li[i].style.display = "block";
      } else {
          li[i].style.display = "none";
      }
  }
}