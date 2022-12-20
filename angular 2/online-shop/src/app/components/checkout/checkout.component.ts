import { Component } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { Cart } from 'src/app/cart';
import { CartLine } from 'src/app/interfaces/cart-line';
import { AddOrderService } from 'src/app/services/add-order.service';
import { AuthService } from 'src/app/services/auth.service';
import { StorageService } from 'src/app/services/storage.service';

@Component({
  selector: 'app-checkout',
  templateUrl: './checkout.component.html',
  styleUrls: ['./checkout.component.css'],
})
export class CheckoutComponent {
  cartLines: CartLine[] = [];
  login:any="";
  constructor(private storageService: StorageService,private cart:Cart,private authService: AuthService
    , private addOrderService:AddOrderService) {
    this.cartLines = storageService.getCartLines();
    this.login = this.authService.getLoginData();
  }
  getTotal(): number {
    return this.cart.getTotal();
  }
  getSubTotal(): number {
    return this.cart.getSubTotal();
  }
  getShipping(): number {
    return this.cart.getShipping();
  }
  todayDate : Date = new Date();

  getOrderDetails(){
    let details  =[];
    for(let i=0; i<this.cartLines.length;i++){
      details .push({
        "product_id": this.cartLines[i].product._id,
        "price": this.cartLines[i].product.price,
        "qty": this.cartLines[i].quantity
    })
    }
    return details;
  }

  addOrderForm = new FormGroup({
    first_name: new FormControl('', [Validators.required]),
    last_name: new FormControl('', [Validators.required]),
    email: new FormControl('', [Validators.required, Validators.email]),
    mobile_number: new FormControl('', [Validators.required]),
    address1: new FormControl('', [Validators.required]),
    address2: new FormControl('', [Validators.required]),
    country: new FormControl('', [Validators.required]),
    city: new FormControl('', [Validators.required]),
    state: new FormControl('', [Validators.required]),
    zip_code: new FormControl('', [Validators.required])
  });

  getData(){
    let order ={
      "sub_total_price": this.getSubTotal(),
      "shipping": this.getShipping(),
      "total_price": this.getTotal(),
      "user_id": this.login._id,
      "order_date":this.todayDate,
      "order_details": this.getOrderDetails(),
      "shipping_info": this.addOrderForm.value
    }
    return order;
  }
  addOrder(){
    if (this.addOrderForm.valid) {
      this.addOrderService.addOrder(this.getData()).subscribe({
       next: (data: any) => {
        alert("order added successfully");
        },
        error: any => {
          alert('error please sign in again');
        }
    });
  }
  }
}
