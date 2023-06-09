import { Teacher } from './../../interfaces/teacher';
import { Component, OnInit, Input, SimpleChanges, OnChanges } from '@angular/core';
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

  constructor() { }

  ngOnInit(): void {
    // Inicialmente, ambas listas serán iguales
    this.filteredTeachers = this.teachers;
  }

  ngOnChanges(changes: SimpleChanges): void {
    if (changes['teachers'] && changes['teachers'].currentValue) {
      this.filteredTeachers = changes['teachers'].currentValue;
    }
  }


  truncateText(text: string, maxLength: number): string {
    if (text.length > maxLength) {
      return text.substring(0, maxLength) + '...';
    }
    return text;
  }
}
