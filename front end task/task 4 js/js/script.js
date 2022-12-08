class OrderProduct {
  id;
  productName;
  price;
  quantity;
  image;
  constructor(product) {
    this.id=product.id;
    this.productName = product.productName;
    this.price = product.price;
    this.quantity = product.quantity;
    this.image=product.productName;
  }
  incQuantity = ()=>{this.quantity++;}
  decQuantity = ()=>{if(this.quantity>1)this.quantity--;}
}

class Cart {
  products = [];
  constructor() {
    this.products=[];
  }
  get shipping (){
    return this.products.length * 10;
  };

  get subTotal (){
    if (this.products.length > 0) {
      return this.products.map((p) => p.price * p.quantity).reduce((a, e) => (a += e));
    } else {return 0;}};

  get total () {
    this.shipping + this.subTotal;}

  decQuantity = (i) => {
    this.products[i].decQuantity();
    this.saveChanges();
    this.setproducts();
  };
  incQuantity = (i) => {
    this.products[i].incQuantity();
    this.saveChanges();
    this.setproducts();
  };

  remove = (i) => {
    this.products.splice(i, 1);
    this.saveChanges();
    this.setproducts();
  };
  addProduct(product) {
    let orderProduct = new OrderProduct(product);
    this.products.push(orderProduct);
  }
  
  saveChanges() {
    const products = [];
    this.products.forEach((d) => {
        products.push(d);
    });
    localStorage.setItem("products", JSON.stringify(products));
  }
  setproducts = () => {
    console.log(this.products)
   document.getElementById("products").innerHTML = "";
   if (this.products.length > 0) {
     this.products.forEach((p, i) => {
       document.getElementById("products").innerHTML += setHTMLRow(p, i);
     });
   }
   document.getElementById("shipping").innerHTML = `$${this.shipping}`;
   document.getElementById("sub-total").innerHTML = `$${this.subTotal}`;
   document.getElementById("total").innerHTML = `$${this.shipping+this.subTotal}`;
  };
}

let productTable = document.getElementById("products");


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
  <button type="button" class="btn btn-sm btn-primary btn-minus" onclick="cart.decQuantity(${i});">
  <i class="fa fa-minus"></i>
  </button>
  </div>
  <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="${
    p.quantity
  }">
  <div class="input-group-btn">
  <button type="button" class="btn btn-sm btn-primary btn-plus" onclick="cart.incQuantity(${i});">
  <i class="fa fa-plus"></i>
  </button>
  </div>
  </div>
  </td>
  <td class="align-middle">$${p.price * p.quantity}</td>
  <td class="align-middle"><button class="btn btn-sm btn-danger" type="button" onclick="cart.remove(${i});cart.saveChanges();"><i class="fa fa-times"></i></button></td>
  </tr>`;
};

let cart = new Cart([]);
const products = JSON.parse(localStorage.getItem("products") ?? "[]");
products.forEach((x) => {
  cart.addProduct(x);
});
cart.setproducts();

const loginToken=async()=>{
  let login = await fetch(`http://localhost:5000/api/users/login`,{
      method: 'POST',
      headers: {
          'Content-Type': 'application/json'},
      body : JSON.stringify({"email":"ramymibrahim@yahoo.com","password":"123456"})     
  })  
  
  let res = await login.json();
  return res.token;
  }

  //localStorage.setItem("token", JSON.stringify(token));
  const getorderDetails=()=>{
    let res=[];
   for(let i=0;i<cart.products.length;i++){
      res.push({
        "product_id": cart.products[i].id,
        "price": cart.products[i].price,
        "qty": cart.products[i].quantity
      })
    } return res
  }
  let date= new Date();
  const order=async()=>{
    console.log(getorderDetails()[1])
    let token =await loginToken();
  let addOrder = await fetch(`http://localhost:5000/api/orders`,{
      method: 'POST',
      headers: {
          'Content-Type': 'application/json',
          'x-access-token': token
      },
      body:JSON.stringify({
        "sub_total_price": cart.subTotal,
        "shipping": cart.shipping,
        "total_price": cart.subTotal+cart.shipping,
        "user_id": "6346ac23bb862e01fe4b6535",
        "order_date": date,
        "order_details": getorderDetails(),
    "shipping_info": {
        "first_name": "Ramy",
        "last_name": "Ibrahim",
        "email": "ramymibrahim@yahoo.com",
        "mobile_number": "01092812848",
        "address1": "20 M A",
        "address2": "",
        "country": "Egypt",
        "city": "Cairo",
        "state": "Zamalek",
        "zip_code": "11211"
    }
  })
  })
  let data =await addOrder.json()
  console.log(data)
}

order();
