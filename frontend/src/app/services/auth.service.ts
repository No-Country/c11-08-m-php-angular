import { HttpClient, HttpResponse } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { BehaviorSubject, catchError, map, of } from 'rxjs';
import { environment } from 'src/environments/environment';
import { RegisterData } from '../interfaces/registerData';
import { LoginData } from '../interfaces/loginData';

@Injectable({
  providedIn: 'root'
})
export class AuthService {

  apiUrl = environment.URL;
  isLoggedIn: BehaviorSubject<boolean> = new BehaviorSubject<boolean>(false);
  
  constructor(private http: HttpClient) { }


  Login(creds: LoginData) {
    return this.http.post(`${this.apiUrl}/api/login`, creds, {
       observe: 'response' 
      }).pipe(map((response: HttpResponse<any>)=> {
        const body = response.body;
        const bearerToken = body.token
        if(bearerToken){
        const token = bearerToken.replace('Bearer ','');
        sessionStorage.setItem('token', token);
        this.isLoggedIn.next(true)
        return body;}
      })
    );
  }

  getToken() {
    const token = sessionStorage.getItem('token');
    return token;
  }

  register(user: RegisterData) {
    return this.http.post(`${this.apiUrl}/api/register`, user);
  }


}
