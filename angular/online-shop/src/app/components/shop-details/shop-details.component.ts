import { Component } from '@angular/core';
import { Product } from 'src/app/interfaces/product';

@Component({
  selector: 'app-shop-details',
  templateUrl: './shop-details.component.html',
  styleUrls: ['./shop-details.component.css']
})
export class ShopDetailsComponent {
 product :Product ={id:1,name:"product-1",price:1100,image:"assets/img/product-1.jpg",discount: 0.15,rating:3,rating_count:99}

 ngOnInit(): void {
  /* $('.related-carousel').owlCarousel({
        loop: true,
        margin: 29,
        nav: false,
        autoplay: true,
        smartSpeed: 1000,
        responsive: {
            0:{
                items:1
            },
            576:{
                items:2
            },
            768:{
                items:3
            },
            992:{
                items:4
            }
        }
      */  };
 }

