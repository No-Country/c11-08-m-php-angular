import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';
import { Teacher } from '../interfaces/teacher';


@Injectable({
  providedIn: 'root'
})
export class CardService {


  constructor(private httpClient: HttpClient) { }

  url = "https://c11-08-m-php-angular-production.up.railway.app/api/teachers"
  //ver cards por id
  public GetCards(): Observable<Teacher[]> {
    return this.httpClient.get<Teacher[]>(this.url);
  }
}