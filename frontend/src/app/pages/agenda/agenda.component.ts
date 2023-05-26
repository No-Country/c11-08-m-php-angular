import { Component, Input } from '@angular/core';
import { faStar } from '@fortawesome/free-regular-svg-icons';
import { faStar as StarSolid} from '@fortawesome/free-solid-svg-icons'
import { faAngleRight, faLocationDot, faStarHalf, faUser } from '@fortawesome/free-solid-svg-icons';

@Component({
  selector: 'app-agenda',
  templateUrl: './agenda.component.html',
  styleUrls: ['./agenda.component.css']
})

export class AgendaComponent {
faAngleRight = faAngleRight
faLocationDot = faLocationDot;
faUser = faUser;
faStar = faStar;
faStarSolid = StarSolid;

profesor = 'Esteban gonzales'

rating = 3;



ngOnInit() {

}

}
