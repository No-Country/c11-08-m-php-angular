import { FilterTeacher } from './../interfaces/filterTeacher';
import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { environment } from 'src/environments/environment.development';
import { Teacher } from '../interfaces/teacher';
import { map } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class TeacherService {

  constructor(private http: HttpClient) { }
  private apiUrl = environment.URL;


  getfilterTeachers(filterTeacher: FilterTeacher): Observable<Teacher[]> {
    console.log(filterTeacher, 'filterteacher')//el filtro del backend no funciona
    filterTeacher.city = "";
    return this.http.post<any>(`${this.apiUrl}/api/teachers/search`, filterTeacher).pipe(
      map(response => response.data)
    );
    
  }

  getTeachers(): Observable<Teacher[]> {
    return this.http.get<any>(`${this.apiUrl}/api/teachers`).pipe(
      map(response => response.data)
    );
  }


  //   map(response => {
  //     const data = response.data; // Accede al objeto 'data' dentro de la respuesta
  //     if (Array.isArray(data)) {
  //       return data.filter(item => item instanceof Teacher) as Teacher[]; // Filtra y transforma los objetos al tipo 'Teacher'
  //     } else {
  //       throw new Error('La respuesta no tiene una estructura válida.');
  //     }
  //   })
  // );
}

  // getTeacherById(id: number): Observable<Teacher> {
  //   return this.http.get<Teacher>(`${this.apiUrl}/teachers/${id}`);
  // }

  // createTeacher(teacher: Teacher): Observable<Teacher> {
  //   return this.http.post<Teacher>(`${this.apiUrl}/teachers`, teacher);
  // }

  // updateTeacher(id: number, teacher: Teacher): Observable<Teacher> {
  //   return this.http.put<Teacher>(`${this.apiUrl}/teachers/${id}`, teacher);
  // }

  // deleteTeacher(id: number): Observable<void> {
  //   return this.http.delete<void>(`${this.apiUrl}/teachers/${id}`);
  // }

