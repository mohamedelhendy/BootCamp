import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { enviroment } from 'src/enviroment/enviroment';
import { Product } from '../interfaces/product';

@Injectable({
  providedIn: 'root',
})
export class ProductService {
  cartProducts :Product[] =JSON.parse(localStorage.getItem("Cartproducts") ?? "[]");
  likedProducts :Product[] =JSON.parse(localStorage.getItem("likedProducts") ?? "[]");
  constructor(private httpClient: HttpClient) {}

  getFeatured() {
    return this.httpClient.get(`${enviroment.apiUrl}api/products/getfeatured`);
  }
  getRecent() {
    return this.httpClient.get(`${enviroment.apiUrl}api/products/getrecent`);
  }
  addProduct(product:Product){
    this.cartProducts.push(product);
    localStorage.setItem("Cartproducts", JSON.stringify(this.cartProducts));
  }
  addLike(product:Product){
    this.likedProducts.push(product);
    localStorage.setItem("likedProducts", JSON.stringify(this.likedProducts));
  }
}
