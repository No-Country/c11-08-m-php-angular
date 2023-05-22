import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { faGraduationCap, faLocationDot } from '@fortawesome/free-solid-svg-icons';
import { map } from 'rxjs';
import { ICard } from 'src/app/interfaces/card';
import { CardService } from 'src/app/services/card.service';

@Component({
  selector: 'app-src-page',
  templateUrl: './src-page.component.html',
  styleUrls: ['./src-page.component.css']
})
export class SrcPageComponent implements OnInit{
  selectedOption: string = 'Quiero aprender';
  faGraduationCap = faGraduationCap;
  faLocationDot = faLocationDot;
  programacion: string = '';
  cardList: ICard[] = []
  constructor(private route: ActivatedRoute, private cardService: CardService) {}

  ngOnInit(): void{
    this.cardList = this.cardService.cardList;
    this.route.queryParams.pipe(
      map(params => params['seleccion'])
    ).subscribe(seleccion => {
      if (seleccion) {
        this.programacion = seleccion.replace('Aprende', '').trim();
      }
    });
  }

}
