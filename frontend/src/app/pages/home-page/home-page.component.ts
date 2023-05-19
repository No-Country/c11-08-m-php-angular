import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { faGraduationCap, faLocationDot } from '@fortawesome/free-solid-svg-icons';

@Component({
  selector: 'app-home-page',
  templateUrl: './home-page.component.html',
  styleUrls: ['./home-page.component.css']
})
export class HomePageComponent {
  selectedOption: string = 'Quiero aprender';
  faGraduationCap = faGraduationCap;
  faLocationDot = faLocationDot;
  constructor(private router:Router){

  }

  mandar(selectedOption:string){
    this.router.navigate(['/src'],{queryParams:{seleccion:selectedOption}});
  }
}
