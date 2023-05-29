import { Component, OnInit } from '@angular/core';
import { faLocationDot, faStar } from '@fortawesome/free-solid-svg-icons';
import { INewCard } from 'src/app/interfaces/card';
import { CardService } from 'src/app/services/card.service';


@Component({
  selector: 'app-cards',
  templateUrl: './cards.component.html',
  styleUrls: ['./cards.component.css']
})
export class CardsComponent implements OnInit {
  faStar = faStar;
  faLocationDot = faLocationDot;
  cardList: INewCard[] = [];

  constructor(private cardService: CardService) { }

  ngOnInit(): void {
    this.getAllCards()
  }
  getAllCards(): void { 
    this.cardService.GetCards()
    .subscribe((data: INewCard[]) => { 
      this.cardList = data; 
    }) 
    }
}
