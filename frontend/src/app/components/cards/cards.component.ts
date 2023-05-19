import {Component} from '@angular/core';
import { faLocationDot, faStar } from '@fortawesome/free-solid-svg-icons';



@Component({
  selector: 'app-cards',
  templateUrl: './cards.component.html',
  styleUrls: ['./cards.component.css']
})
export class CardsComponent {
faStar = faStar;
faLocationDot = faLocationDot;
}
