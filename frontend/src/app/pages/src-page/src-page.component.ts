import { Component, OnInit } from '@angular/core';
import { faGraduationCap, faLocationDot } from '@fortawesome/free-solid-svg-icons';
import { Router, ActivatedRoute } from '@angular/router';
@Component({
  selector: 'app-src-page',
  templateUrl: './src-page.component.html',
  styleUrls: ['./src-page.component.css']
})
export class SrcPageComponent implements OnInit {
  elegir: string = "Cualquiera";
  precio:string = 'Cualquiera';
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

seleccionarProvincia(prov: string) {
  this.provincia = prov;
}

  disponibilidad: string = 'Cualquier';
  faGraduationCap = faGraduationCap;
  faLocationDot = faLocationDot;
  
  constructor(private route: ActivatedRoute) {}
  ngOnInit(): void {
    if ( this.route.snapshot.queryParams['seleccion'] != 'Quiero aprender') {
      this.elegir = this.route.snapshot.queryParams['seleccion'] 
    } 
    
  }


   
}


