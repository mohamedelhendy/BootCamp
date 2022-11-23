let button= document.getElementById("add");
let products= document.getElementById("products");
button.addEventListener("click",()=>{
    let productName= document.getElementById("product-name").value;
    let price= document.getElementById("price").value;
    let quantity= document.getElementById("quantity").value;
    products.innerHTML+=`<tr><td>${productName}</td><td>${price}</td><td>${quantity}</td></tr>`
});
