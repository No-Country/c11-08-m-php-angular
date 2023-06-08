import { Teacher } from './../../interfaces/teacher';
import { Component, OnInit, Input } from '@angular/core';
import { faLocationDot, faStar } from '@fortawesome/free-solid-svg-icons';

@Component({
  selector: 'app-cards',
  templateUrl: './cards.component.html',
  styleUrls: ['./cards.component.css']
})
export class CardsComponent implements OnInit {

  faStar = faStar;
  faLocationDot = faLocationDot;

  @Input() teachers: Teacher[] = [];
  public page!: number;
  filteredTeachers: Teacher[] = []; // Nueva propiedad para almacenar la lista de profesores filtrada

  constructor(
  ) { }

  ngOnInit(): void {
  }

  truncateText(text: string, maxLength: number): string {
    if (text.length > maxLength) {
      return text.substring(0, maxLength) + '...';
    }
    return text;
  }
}
