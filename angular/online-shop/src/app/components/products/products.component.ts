import { HttpClient } from '@angular/common/http';
import { Component, Input, OnInit } from '@angular/core';
import { Product } from 'src/app/interfaces/product';
import { ProductService } from 'src/app/services/product.service';
import { enviroment } from 'src/enviroment/enviroment';

@Component({
  selector: 'app-products',
  templateUrl: './products.component.html',
  styleUrls: ['./products.component.css']
})
export class ProductsComponent  implements OnInit{
  @Input() title:string='';
  @Input() type:string='';
  Products :Product [] =[];
  constructor(private productService:ProductService){}

ngOnInit(): void {
  this.type=='Featured'?
    this.productService.getFeatured().subscribe((data:any)=>{
      console.log(data);
        this.Products = data.data;
    })
  :
    this.productService.getRecent().subscribe((data:any)=>{
      console.log(data);
        this.Products = data.data;
    })
  }


}
