const products = [];
let button = document.getElementById("add");
let productTable = document.getElementById("products");

const getShipping = () => {
  return products.length * 10;
};

const getSubTotal = () => {
  if (products.length > 0) {
    return products.map((p) => p.price * p.quantity).reduce((a, e) => (a += e));
  } else {
    return 0;
  }
};

const getTotal = () => getShipping() + getSubTotal();

const decQuantity = (i) => {
  if (products[i].quantity > 1) products[i].quantity--;
  setproducts();
};
const incQuantity = (i) => {
  products[i].quantity++;
  setproducts();
};

const remove = (i) => {
  products.splice(i, 1);
  setproducts();
};

const setproducts = () => {
  document.getElementById("products").innerHTML = "";
 if(products.length>0){
  products.forEach((p, i) => {
    document.getElementById("products").innerHTML += setHTMLRow(p, i);
  });}
  document.getElementById("shipping").innerHTML = `$${getShipping()}`;
  document.getElementById("sub-total").innerHTML = `$${getSubTotal()}`;
  document.getElementById("total").innerHTML = `$${getTotal()}`;
};

const setHTMLRow = (p, i) => {
  return `
  <tr>
  <td class="align-middle"><img src="img/${
    p.productName
  }.jpg" alt="" style="width: 50px;"> ${p.productName}</td>
  <td class="align-middle">$${p.price}</td>
  <td class="align-middle">
  <div class="input-group quantity mx-auto" style="width: 100px;">
  <div class="input-group-btn">
  <button type="button" class="btn btn-sm btn-primary btn-minus" onclick="decQuantity(${i})">
  <i class="fa fa-minus"></i>
  </button>
  </div>
  <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="${
    p.quantity
  }">
  <div class="input-group-btn">
  <button type="button" class="btn btn-sm btn-primary btn-plus" onclick="incQuantity(${i})">
  <i class="fa fa-plus"></i>
  </button>
  </div>
  </div>
  </td>
  <td class="align-middle">$${p.price * p.quantity}</td>
  <td class="align-middle"><button class="btn btn-sm btn-danger" type="button" onclick="remove(${i})"><i class="fa fa-times"></i></button></td>
  </tr>`;
};
function  addProduct(){
  console.log("hi");
  let productName = document.getElementById("product-name").value;
  let price = document.getElementById("price").value;
  let quantity = document.getElementById("quantity").value;
  const p = { productName, price, quantity };
  products.push(p);
  setproducts();
};


button.addEventListener("click",  addProduct); 

