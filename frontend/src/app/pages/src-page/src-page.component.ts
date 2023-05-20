import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { faGraduationCap, faLocationDot } from '@fortawesome/free-solid-svg-icons';
import { map } from 'rxjs';

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

  constructor(private route: ActivatedRoute) {}

  ngOnInit() {
    this.route.queryParams.pipe(
      map(params => params['seleccion'])
    ).subscribe(seleccion => {
      if (seleccion) {
        this.programacion = seleccion.replace('Aprende', '').trim();
      }
    });
  }

}
