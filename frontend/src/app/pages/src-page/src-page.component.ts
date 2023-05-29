import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { faGraduationCap, faLocationDot, faCaretDown } from '@fortawesome/free-solid-svg-icons';
import { map } from 'rxjs';
import { CardService } from 'src/app/services/card.service';
import { INewCard } from 'src/app/interfaces/card';

@Component({
  selector: 'app-src-page',
  templateUrl: './src-page.component.html',
  styleUrls: ['./src-page.component.css']
})
export class SrcPageComponent implements OnInit{
  elegir= "";
  precio: string = 'Cualquiera';
  turno: string = 'Cualquiera';
  cards: INewCard[] = []
  provinciasArgentina: string[] = [
    'Buenos Aires',
    'Catamarca',
    'Chaco',
    'Chubut',
    'Córdoba',
    'Corrientes',
    'Entre Ríos',
    'Formosa',
    'Jujuy',
    'La Pampa',
    'La Rioja',
    'Mendoza',
    'Misiones',
    'Neuquén',
    'Río Negro',
    'Salta',
    'San Juan',
    'San Luis',
    'Santa Cruz',
    'Santa Fe',
    'Santiago del Estero',
    'Tierra del Fuego, Antártida e Islas del Atlántico Sur',
    'Tucumán'
  ];

  provincia: string = 'Cualquiera';

  busqueda(valor: Event){
    this.elegir = (<HTMLInputElement>event?.target).value;

  } 

  seleccionarProvincia(prov: string) {
    this.provincia = prov;
  }

  disponibilidad: string = 'Cualquiera';
  faGraduationCap = faGraduationCap;
  faLocationDot = faLocationDot;
  faCaretDown = faCaretDown

  constructor(private route: ActivatedRoute, private cService: CardService) { }
  ngOnInit(): void {
      this.elegir = this.route.snapshot.queryParams['seleccion']


  }

  cargarPersona(): void{
    this.cService.GetCards().subscribe(
      db => {
        this.cards = db;
      }
    )
  }


}


