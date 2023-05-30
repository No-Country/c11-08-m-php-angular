import { Teacher } from './../../interfaces/teacher';
import { TeacherService } from './../../services/teacher.service';
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

  @Input() teachers: Teacher[]=[];
  public page!: number;

  constructor(
  ){}

  ngOnInit(): void{
  }
}
