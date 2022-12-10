import { Component, Input } from '@angular/core';
import { Product } from 'src/app/interfaces/product';

@Component({
  selector: 'app-product',
  templateUrl: './product.component.html',
  styleUrls: ['./product.component.css']
})
export class ProductComponent {
  @Input() product:Product ={} as Product; 
  addSingleProductToCart(product: any){
    console.log(product);
  }
}
