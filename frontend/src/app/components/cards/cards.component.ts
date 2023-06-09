import { Teacher } from './../../interfaces/teacher';
import { Component, OnInit, Input, SimpleChanges, OnChanges } from '@angular/core';
import { Router } from '@angular/router';
import { faLocationDot, faStar } from '@fortawesome/free-solid-svg-icons';

@Component({
  selector: 'app-cards',
  templateUrl: './cards.component.html',
  styleUrls: ['./cards.component.css']
})
export class CardsComponent implements OnInit, OnChanges {

  faStar = faStar;
  faLocationDot = faLocationDot;

  @Input() teachers: Teacher[] = [];
  public page!: number;
  filteredTeachers: Teacher[] = []; // Nueva propiedad para almacenar la lista de profesores filtrada

  constructor(private router :Router) {}

  ngOnInit(): void {
    // Inicialmente, ambas listas serán iguales
    this.filteredTeachers = this.teachers;
  }

  ngOnChanges(changes: SimpleChanges): void {
    if (changes['teachers'] && changes['teachers'].currentValue) {
      this.filteredTeachers = changes['teachers'].currentValue;
    }
  }
  
  contactar(teacher: Teacher) {
    this.router.navigate(['/perfil'], {
      queryParams: { id: teacher.id,
         name: teacher.name,
          email: teacher.email,
           total_students: teacher.total_students,
            total_reviews: teacher.total_reviews,
             city_name: teacher.city_name,
              province_name: teacher.province_name,
               photo: teacher.photo,
                user_id: teacher.user_id,
                average: teacher.average  },
      queryParamsHandling: 'merge',
      replaceUrl: true
    });
  }

  truncateText(text: string, maxLength: number): string {
    if (text.length > maxLength) {
      return text.substring(0, maxLength) + '...';
    }
    return text;
  }
}
