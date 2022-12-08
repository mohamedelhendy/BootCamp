const getData= async ()=>{
let data = await fetch(`http://localhost:5000/api/products/getFeatured`)
let res = await data.json();
return res.data;
}


const setFeatured =async ()=>{
let data =await getData();
for(let i=0;i<data.length;i++){
    document.getElementById("featured").innerHTML += 
    `<div class="col-lg-3 col-md-4 col-sm-6 pb-1">
    <div class="product-item bg-light mb-4">
      <div class="product-img position-relative overflow-hidden">
        <img class="img-fluid w-100" src="${data[i].image}" alt="" />
        <div class="product-action">
          <a
            class="btn btn-outline-dark btn-square"href="#" onclick="addSingleProductToCart({id:${data[i].id},productName:"${data[i].name}",price:${data[i].price}})"
            ><i class="fa fa-shopping-cart"></i
          ></a>
          <a class="btn btn-outline-dark btn-square" href="#"
            ><i class="far fa-heart"></i
          ></a>
          <a class="btn btn-outline-dark btn-square" href="#"
            ><i class="fa fa-sync-alt"></i
          ></a>
          <a class="btn btn-outline-dark btn-square" href="#"
            ><i class="fa fa-search"></i
          ></a>
        </div>
      </div>
      <div class="text-center py-4">
        <a class="h6 text-decoration-none text-truncate" href=""
          >${data[i].name}</a
        >
        <div
          class="d-flex align-items-center justify-content-center mt-2"
        >
          <h5>$${data[i].price*(1-data[i].discount)}</h5>
          <h6 class="text-muted ml-2"><del>${data[i].price}</del></h6>
        </div>
        <div
          class="d-flex align-items-center justify-content-center mb-1"
        >
          <small class="fa fa-star text-primary mr-1"></small>
          <small class="fa fa-star text-primary mr-1"></small>
          <small class="fa fa-star text-primary mr-1"></small>
          <small class="fa fa-star text-primary mr-1"></small>
          <small class="fa fa-star text-primary mr-1"></small>
          <small>(${data[i].rating_count})</small>
        </div>
      </div>
    </div>
  </div> 
  `
}
}
setFeatured();


