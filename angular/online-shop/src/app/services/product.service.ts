import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root',
})
export class ProductService {
  constructor(private httpClient: HttpClient) {}

  getFeatured() {
    return this.httpClient.get('http://localhost:5000/api/products/getfeatured');
  }
}
