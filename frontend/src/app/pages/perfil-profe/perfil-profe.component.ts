import { CARD_LIST } from './../../mock/card.mock';
import { CardService } from './../../services/card.service';
import { ICard } from 'src/app/interfaces/card';

import { Component,Output,EventEmitter} from '@angular/core';


import { faAngleRight, faUser, faLocationDot,faStar,faAngleLeft} from '@fortawesome/free-solid-svg-icons';

@Component({
  selector: 'app-perfil-profe',
  templateUrl: './perfil-profe.component.html',
  styleUrls: ['./perfil-profe.component.css']
})

export class PerfilProfeComponent {

@Output() estiloAplicado = new EventEmitter<boolean>();
faAngleRight= faAngleRight;
faAngleLeft = faAngleLeft;
faLocationDot = faLocationDot;
faUser = faUser;
faStar = faStar;


tdColor = 'black';
style: any;


cambiarColorTd(event: Event): void {
  const td = event.target as HTMLElement;
  const colors = ['black', 'gray', 'white'];
  const currentIndex = colors.indexOf(td.style.color);
  const nextIndex = (currentIndex + 1) % colors.length;
  const color = colors[nextIndex];
  td.style.color = color;
}

cardList: ICard[] = CARD_LIST;
}
