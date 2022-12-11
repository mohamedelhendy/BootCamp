import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { enviroment } from 'src/enviroment/enviroment';
import { Product } from '../interfaces/product';

@Injectable({
  providedIn: 'root',
})
export class ProductService {
  cartProducts :Product[] =[];
  likedProducts :Product[] =[];
  constructor(private httpClient: HttpClient) {}

  getFeatured() {
    return this.httpClient.get(`${enviroment.apiUrl}api/products/getfeatured`);
  }
  getRecent() {
    return this.httpClient.get(`${enviroment.apiUrl}api/products/getrecent`);
  }
  addProduct(product:Product){
    this.cartProducts.push(product);
  }
  addLike(product:Product){
    this.likedProducts.push(product);
  }
}
