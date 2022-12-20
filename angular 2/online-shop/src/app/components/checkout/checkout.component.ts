import { Component } from '@angular/core';
import { Cart } from 'src/app/cart';
import { CartLine } from 'src/app/interfaces/cart-line';
import { StorageService } from 'src/app/services/storage.service';

@Component({
  selector: 'app-checkout',
  templateUrl: './checkout.component.html',
  styleUrls: ['./checkout.component.css'],
})
export class CheckoutComponent {
  constructor(private storageService: StorageService,private cart:Cart) {
    this.cartLines = storageService.getCartLines();
  }

  cartLines: CartLine[] = [];

  getTotal(): number {
    return this.cart.getTotal();
  }
  getSubTotal(): number {
    return this.cart.getSubTotal();
  }
  getShipping(): number {
    return this.cart.getShipping();
  }
}
