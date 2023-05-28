import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';
import { Provinces } from '../interfaces/provinces';


@Injectable({
  providedIn: 'root'
})
export class CardService {


  constructor(private httpClient: HttpClient) { }

  url = "https://c11-08-m-php-angular-production.up.railway.app/api/provinces"
  //ver cards por id
  public verCards(): Observable<Provinces[]> {
    return this.httpClient.get<Provinces[]>(this.url);
  }
  
  

}