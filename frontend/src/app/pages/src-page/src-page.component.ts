import { Component } from '@angular/core';
import { faGraduationCap, faLocationDot } from '@fortawesome/free-solid-svg-icons';

@Component({
  selector: 'app-src-page',
  templateUrl: './src-page.component.html',
  styleUrls: ['./src-page.component.css']
})
export class SrcPageComponent {
  selectedOption: string = 'Quiero aprender';
  faGraduationCap = faGraduationCap;
  faLocationDot = faLocationDot;
}
