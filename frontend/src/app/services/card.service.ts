import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';
import { ICard } from '../interfaces/card';


@Injectable({
  providedIn: 'root'
})
export class CardService {


  constructor(private httpClient: HttpClient) { }

  url = "https://c11-08-m-php-angular-production.up.railway.app/api/teachers"
  //ver cards por id
  public verCards(): Observable<ICard[]> {
    return this.httpClient.get<ICard[]>(this.url);
  }
  
  

}

