import { Subjects } from './../../interfaces/subjects';
import { SubjectsService } from './../../services/subjects.service';
import { Component, HostListener, OnInit } from '@angular/core';
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

  selectedOption: string = ''; // borrar
  faLocationDot = faLocationDot; // borrar
  faGraduationCap = faGraduationCap;

  constructor(
    private router: Router,
    private subjectsService: SubjectsService
 
  ) { }

  listSubjects: Subjects[] = [];

  ngOnInit() {
    interval(3000).subscribe(() => {
      this.changeText();
    });
    this.changeText();

    this.subjectsService.getSubjects().subscribe(
      res => {
        this.listSubjects = res;
      },
      err => console.log(err)
    );
  }

  //inicio animacion
  @HostListener('window:scroll', [])
  currentTextIndex = 0;
  textAnimationState: string | undefined;
  animationInProgress = false;


// @HostListener('window:scroll', [])





  

  changeText() {
    interval(3000).subscribe(() => {
      if (!this.animationInProgress) {
        this.animationInProgress = true;
        setTimeout(() => {
          this.currentTextIndex = (this.currentTextIndex + 1) % this.listSubjects.length;
          setTimeout(() => {
            this.animationInProgress = false;
          }, 500);
        }, 500);
      }
    });
  }
  //fin animacion

  seleccionarOpcion() {
    const selectSubjects = document.getElementById('selectSubjects') as HTMLSelectElement;
    const selectedOption = selectSubjects.options[selectSubjects.selectedIndex];
    const selectedText = selectedOption ? selectedOption.textContent?.trim() : "";

    if ( selectSubjects.value !== "" ) {
      this.router.navigate(['/src'], { queryParams: { seleValue: selectedText, seleId: selectSubjects.value } });
    } else {
      alert('Debe ingresar una opcion');
    }
  }
}
