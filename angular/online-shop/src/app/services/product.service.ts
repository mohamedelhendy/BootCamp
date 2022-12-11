import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { enviroment } from 'src/enviroment/enviroment';
import { CartLine } from '../interfaces/cart-line';
import { Product } from '../interfaces/product';

@Injectable({
  providedIn: 'root',
})
export class ProductService {
  cartLines : CartLine[] = JSON.parse(localStorage.getItem("CartLines") ?? "[]");
  likedProducts :Product[] =JSON.parse(localStorage.getItem("likedProducts") ?? "[]");
  constructor(private httpClient: HttpClient) {}

  getSubTotal(){
    if (this.cartLines.length > 0) {
      return this.cartLines.map((p) => p.product.price * p.quantity).reduce((a, e) => (a += e));
    } else {return 0;}};
  getShipping(){
      return this.cartLines.length * 10;
    };
  getTotal () {
      return this.getShipping() + this.getSubTotal();}

  update(){
    localStorage.setItem("CartLines", JSON.stringify(this.cartLines));
    this.getSubTotal();
    this.getShipping();
    this.getTotal();

  }
  getFeatured() {
    return this.httpClient.get(`${enviroment.apiUrl}api/products/getfeatured`);
  }
  getRecent() {
    return this.httpClient.get(`${enviroment.apiUrl}api/products/getrecent`);
  }
  addProduct(product:Product){
    let ind : number = this.cartLines.findIndex((x) => x.product === product);
    console.log(ind);
    if(ind < 0){
      this.cartLines.push({product,quantity:1});
    }else{this.incQuantity(product);}
    console.log("hi")
    localStorage.setItem("CartLines", JSON.stringify(this.cartLines));
  }
  incQuantity(product:Product){
    let ind : number = this.cartLines.findIndex((x) => x.product === product);
    this.cartLines[ind].quantity++;
    localStorage.setItem("CartLines", JSON.stringify(this.cartLines));
  }
  decQuantity(product:Product){
    let ind : number = this.cartLines.findIndex((x) => x.product === product);
    if(this.cartLines[ind].quantity>1){
      this.cartLines[ind].quantity--;
    }
    localStorage.setItem("CartLines", JSON.stringify(this.cartLines));
  }
  remove(product:Product){
    let ind : number = this.cartLines.findIndex((x) => x.product === product);
    this.cartLines.splice(ind,1);
    localStorage.setItem("CartLines", JSON.stringify(this.cartLines));
  }
  addLike(product:Product){
    this.likedProducts.push(product);
    localStorage.setItem("likedProducts", JSON.stringify(this.likedProducts));
  }
}
