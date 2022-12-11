import { Component } from '@angular/core';
import { CartLine } from 'src/app/interfaces/cart-line';
import { Product } from 'src/app/interfaces/product';
import { ProductService } from 'src/app/services/product.service';

@Component({
  selector: 'app-cart-table',
  templateUrl: './cart-table.component.html',
  styleUrls: ['./cart-table.component.css']
})
export class CartTableComponent {
  constructor(public productService:ProductService){}
cartLines : CartLine[] = this.productService.cartLines;
}
