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
  provincia:string = 'Cualquiera'
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


