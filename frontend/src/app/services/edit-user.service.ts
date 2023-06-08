import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { environment } from 'src/environments/environment.development';
import { EditUser } from '../interfaces/edit-user';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class EditUserService {

  constructor(private http: HttpClient) { }
  private apiUrl = environment.URL;

  
  updateTeacher(userId:number, user: EditUser): Observable<any> {
    return this.http.put<any>(`${this.apiUrl}/api/users/${userId}`, user);
  }

}
