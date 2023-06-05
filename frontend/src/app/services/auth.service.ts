import { HttpClient, HttpResponse } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { BehaviorSubject, catchError, map, of, throwError } from 'rxjs';
import { environment } from 'src/environments/environment';
import { RegisterData } from '../interfaces/registerData';
import { LoginData } from '../interfaces/loginData';
import { error } from 'jquery';

@Injectable({
  providedIn: 'root'
})
export class AuthService {

  apiUrl = environment.URL;
  isLoggedIn:boolean = false;

  constructor(private http: HttpClient) { 
    const token = this.getToken();
    console.log("El servicio de autenticacion esta corriendo");
    this.isLoggedIn=(true);
  
  }

  Login(creds: LoginData) {
    return this.http.post(`${this.apiUrl}/api/login`, creds, {
      observe: 'response' 
    }).pipe(
      map((response: HttpResponse<any>) => {
        console.log('Login response:', response);
        const body = response.body;
        const bearerToken = body.token;
        if (bearerToken) {
          const token = bearerToken.replace('Bearer ','');
          sessionStorage.setItem('token', token);
          this.isLoggedIn=(true);
          console.log(this.isLoggedIn)
          return body;
        }
      }),
    );
  }

  verifyToken(token: string) {
    const body = { token };
    return this.http.post(`${this.apiUrl}/verify`, body);
  }

  getToken() {
    const token = sessionStorage.getItem('token');
    return token;
  }
  
  register(user: RegisterData) {
    return this.http.post(`${this.apiUrl}/api/register`, user);
  }


}
