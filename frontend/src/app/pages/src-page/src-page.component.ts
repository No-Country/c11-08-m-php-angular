import { Component, OnInit } from '@angular/core';
import { faGraduationCap, faLocationDot } from '@fortawesome/free-solid-svg-icons';
import { Router, ActivatedRoute } from '@angular/router';
@Component({
  selector: 'app-src-page',
  templateUrl: './src-page.component.html',
  styleUrls: ['./src-page.component.css']
})
export class SrcPageComponent implements OnInit {
  elegir!: string;
  faGraduationCap = faGraduationCap;
  faLocationDot = faLocationDot;
  
  constructor(private route: ActivatedRoute) {}
  ngOnInit(): void {
    this.elegir = this.route.snapshot.queryParams['seleccion'] 
    
  }


   
}


