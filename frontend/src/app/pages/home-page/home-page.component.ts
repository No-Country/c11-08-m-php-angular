import { Component } from '@angular/core';
import { faGraduationCap,faLocationDot } from '@fortawesome/free-solid-svg-icons';

@Component({
  selector: 'app-home-page',
  templateUrl: './home-page.component.html',
  styleUrls: ['./home-page.component.css']
})
export class HomePageComponent {
  selectedOption: string = 'Quiero aprender';
  faGraduationCap = faGraduationCap;
  faLocationDot = faLocationDot;
}
