import { Component } from '@angular/core';
import { faSquareFacebook, faSquareInstagram } from '@fortawesome/free-brands-svg-icons';

@Component({
  selector: 'app-footer',
  templateUrl: './footer.component.html',
  styleUrls: ['./footer.component.css']
})
export class FooterComponent {
  faSquareFacebook = faSquareFacebook;
  faSquareInstagram = faSquareInstagram;
}
