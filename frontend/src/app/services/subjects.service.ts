
import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { environment } from 'src/environments/environment.development';
import { Subjects } from '../interfaces/subjects';

@Injectable({
  providedIn: 'root'
})
export class SubjectsService {

  constructor(private http:HttpClient) { }
  private apiUrl = environment.URL;

  getSubjects(): Observable<Subjects[]> {
    return this.http.get<Subjects[]>(`${this.apiUrl}/api/subjects`);
  }
}
