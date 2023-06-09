import { HttpClient, HttpResponse } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { BehaviorSubject, map, } from 'rxjs';
import { environment } from 'src/environments/environment';
import { RegisterData } from '../interfaces/registerData';
import { LoginData } from '../interfaces/loginData';


@Injectable({
  providedIn: 'root'
})
export class AuthService {

  apiUrl = environment.URL;
  isLoggedIn: BehaviorSubject<boolean> = new BehaviorSubject<boolean>(false);
  currentUser: BehaviorSubject<any> = new BehaviorSubject<any>(null);

  constructor(private http: HttpClient) {
    console.log("El servicio de autenticación está corriendo");
    this.checkSession();
  }

  private checkSession() {
    const token = window.localStorage.getItem('token');
    if (token) {
      this.isLoggedIn.next(true);
      const user = window.localStorage.getItem('currentUser');
      if (user) {
        const parsedUser = JSON.parse(user);
        this.currentUser.next(parsedUser);
      }
    }
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
          const token = bearerToken.replace('Bearer ', '');
          localStorage.setItem('token', token);
          this.isLoggedIn.next(true);
          this.currentUser.next(body.user);
          console.log(this.isLoggedIn);
          return body;
        }
      }),
    );
  }

  getToken() {
    const token = window.localStorage.getItem('token') ?? '';
    return token
  }

  register(creds: RegisterData) {
    return this.http.post(`${this.apiUrl}/api/register`, creds, {
      observe: 'response'
    }).pipe(
      map((response: HttpResponse<any>) => {
        console.log('Register response:', response);
        const body = response.body;
        const bearerToken = body.token;
        if (bearerToken) {
          const token = bearerToken.replace('Bearer ', '');
          localStorage.setItem('token', token);
          this.isLoggedIn.next(true);
          this.currentUser.next(body.user);
          console.log(this.isLoggedIn);
          return body;
        }
      }),
    );
  }
}



