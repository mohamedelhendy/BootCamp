import { Component } from '@angular/core';
import { Product } from 'src/app/interfaces/product';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent {
  products :Product[] =[
    {id:1,name:"product-1",price:1100,imageUrl:"assets/img/product-1.jpg",discount: 0.15,rating:3,ratingCount:99}
  ]


}
