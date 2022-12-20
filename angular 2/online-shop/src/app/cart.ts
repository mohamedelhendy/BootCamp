import { CartLine } from "./interfaces/cart-line";
import { StorageService } from 'src/app/services/storage.service';
import { Injectable } from "@angular/core";
@Injectable({
    providedIn: 'root'
  })
export class Cart  {
    constructor(private storageService:StorageService){

    }
    cartLines: CartLine[]=this.storageService.getCartLines();
    getTotal(): number {
        return this.getShipping() + this.getSubTotal();
      }
      getSubTotal(): number {
        return this.cartLines
          .map((x) => x.price * x.quantity)
          .reduce((a, v) => (a += v), 0);
      }
      getShipping(): number {
        return (
          this.cartLines.map((x) => x.quantity).reduce((a, v) => (a += v), 0) * 2
        );
      }
}
