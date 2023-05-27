import { Injectable } from '@angular/core';
import { ICard } from 'src/app/interfaces/card';
import { CARD_LIST } from '../mock/card.mock';

@Injectable({
  providedIn: 'root'
})
export class CardService {
  


  cardList: ICard[] = CARD_LIST;

  constructor() { }


}
