import { ProvincesCity } from './../interfaces/provincesCity';

import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { environment } from 'src/environments/environment.development';

@Injectable({
  providedIn: 'root'
})
export class ProvincesService {

  constructor(private http:HttpClient) { }
  private apiUrl = environment.URL;

  getProvinces(): Observable<ProvincesCity[]> {
    return this.http.get<ProvincesCity[]>(`${this.apiUrl}/api/provinces`);
  }
}
