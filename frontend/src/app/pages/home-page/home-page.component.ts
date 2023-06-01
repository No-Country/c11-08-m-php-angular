import { Component, HostListener, OnInit} from '@angular/core';
import { Router } from '@angular/router';
import { faGraduationCap, faLocationDot } from '@fortawesome/free-solid-svg-icons';
import { trigger, transition, animate, style, keyframes } from '@angular/animations';
import { interval } from 'rxjs';


@Component({
  selector: 'app-home-page',
  templateUrl: './home-page.component.html',
  styleUrls: ['./home-page.component.css'],
  animations: [
    trigger('textAnimation', [
      transition('* => *', animate('1000ms linear', keyframes([
        style({ opacity: 0, transform: 'translateX(100%)', offset: 0 }),
        style({ opacity: 1, transform: 'translateX(50%)', offset: 0.5 }),
        style({ opacity: 1, transform: 'translateX(0)', offset: 1 }),
      ]))),
    ]),
    trigger('imageAnimation', [
      transition(':enter', [
        style({ transform: 'translateX(100%)' }),
        animate('800ms ease-out', style({ transform: 'translateX(0)' }))
      ])
    ]),
    trigger('container', [
      transition(':enter', [
        style({ transform: 'translatey(100%)' }),
        animate('800ms ease-out', style({ transform: 'translateX(0)' }))
      ])
    ])
  ]
})

export class HomePageComponent implements OnInit {
  selectedOption: string = '';
  faGraduationCap = faGraduationCap;
  faLocationDot = faLocationDot;
  textList = ['Programacion', 'Matematicas', 'Fisica', 'Quimica'];
  currentTextIndex = 0;
  textAnimationState: string | undefined;

  animationInProgress = false;
  constructor(private router: Router){}

// @HostListener('window:scroll', [])




  ngOnInit() {
    interval(3000).subscribe(() => {
      this.changeText();
    });
   
  }

  

  changeText() {
    if (!this.animationInProgress) {
      this.animationInProgress = true;
      setTimeout(() => {
        this.currentTextIndex = (this.currentTextIndex + 1) % this.textList.length;
        setTimeout(() => {
          this.animationInProgress = false;
        }, 500);
      }, 500);
    }
  }

  seleccionarOpcion(opcion: string) {
    if (opcion !== '') {
      this.router.navigate(['/src'], { queryParams: { seleccion: opcion } });
    } else{
      alert('Debe ingresar una opcion')
    }
  }
  
}
