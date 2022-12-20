import { Injectable } from '@angular/core';
import { HttpClient ,HttpHeaders} from '@angular/common/http';
import { environment } from 'src/environment/environment';
import { AuthService } from './auth.service';
import { ThisReceiver } from '@angular/compiler';
@Injectable({
  providedIn: 'root'
})
export class AddOrderService {

  constructor(private httpClient: HttpClient , private authService:AuthService) { }
  getheader(){
    return new HttpHeaders({'Content-Type':'application/json; charset=utf-8','x-access-token': this.authService.getToken()})
  }
  addOrder(data:any){
    console.log(data)
    return this.httpClient.post(`${environment.apiUrl}orders`,data, {
      headers:this.getheader()
    });
  }
}
