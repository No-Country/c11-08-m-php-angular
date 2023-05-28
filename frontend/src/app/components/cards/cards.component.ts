import { Component, OnInit } from '@angular/core';
import { faLocationDot, faStar } from '@fortawesome/free-solid-svg-icons';
import { ICard } from 'src/app/interfaces/card';
import { CardService } from 'src/app/services/card.service';


@Component({
  selector: 'app-cards',
  templateUrl: './cards.component.html',
  styleUrls: ['./cards.component.css']
})
export class CardsComponent implements OnInit {
  faStar = faStar;
  faLocationDot = faLocationDot;
  cardList: ICard[] = [];

  constructor(private cardService: CardService) { }

  ngOnInit(): void {
    this.getAllCards()
  }
  getAllCards(): void { 
    this.cardService.verCards()
    .subscribe((data: ICard[]) => { 
      this.cardList = data; 
    }) 
    }
}
