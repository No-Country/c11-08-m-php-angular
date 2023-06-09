
import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable, tap } from 'rxjs';
import { environment } from 'src/environments/environment.development';
import { Subjects } from '../interfaces/subjects';
import { City } from '../interfaces/city';
import { ProvincesCity } from '../interfaces/provincesCity';

@Injectable({
  providedIn: 'root'
})
export class CityService {

  constructor(private http:HttpClient) { }
  private apiUrl = environment.URL;

  getCitys(id: number): Observable<City[]> {
    return this.http.get<City[]>(`${this.apiUrl}/api/cities/province/${id}`);
  }


  getProvinceCityByQuery(query:string): Observable<ProvincesCity[]>{
    return this.http.get<ProvincesCity[]>(`${this.apiUrl}/api/cities/name/${query}`);
  }

}
