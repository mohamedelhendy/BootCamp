import { Component } from '@angular/core';
import { Product } from 'src/app/interfaces/product';
import { ProductService } from 'src/app/services/product.service';

@Component({
  selector: 'app-shop-details',
  templateUrl: './shop-details.component.html',
  styleUrls: ['./shop-details.component.css']
})
export class ShopDetailsComponent {
    constructor(public productService:ProductService){}
    product :Product ={id:1,name:"product-1",price:1100,image:"assets/img/product-1.jpg",discount: 0.15,rating:3,rating_count:99}
 
 }

