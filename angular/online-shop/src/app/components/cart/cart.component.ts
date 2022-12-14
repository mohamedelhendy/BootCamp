import { Component } from '@angular/core';
import { CartLine } from 'src/app/interfaces/cart-line';
import { ProductService } from 'src/app/services/product.service';

@Component({
  selector: 'app-cart',
  templateUrl: './cart.component.html',
  styleUrls: ['./cart.component.css']
})
export class CartComponent {
  constructor(public productService:ProductService){}
cartLines : CartLine[] = this.productService.cartLines;
}
