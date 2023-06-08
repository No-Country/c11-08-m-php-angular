import { Subjects } from './../../interfaces/subjects';
import { SubjectsService } from './../../services/subjects.service';
import { Component, HostListener, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { faGraduationCap, faLocationDot } from '@fortawesome/free-solid-svg-icons';
import { trigger, transition, animate, style, keyframes } from '@angular/animations';
import { interval } from 'rxjs';
import { faStar as StarSolid} from '@fortawesome/free-solid-svg-icons'
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

  selectedOption: Subjects | null = null;
  listSubjects: Subjects[] = [] ;
  filteredSubjects: Subjects[] = [];
  searchText: string = '';
  inputText: string = '';

  faStarSolid = StarSolid;
  faLocationDot = faLocationDot; // borrar
  faGraduationCap = faGraduationCap;

  constructor(
    private router: Router,
    private subjectsService: SubjectsService
 
  ) { }

  

  ngOnInit() {
    interval(3000).subscribe(() => {
      this.changeText();
    });
    this.changeText();

    this.subjectsService.getSubjects().subscribe(
      res => {
        this.listSubjects = res;
        this.filteredSubjects = res;
      },
      err => console.log(err)
    );
  }

  //inicio animacion
  // @HostListener('window:scroll', [])
  currentTextIndex = 0;
  textAnimationState: string | undefined;
  animationInProgress = false;

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

  seleccionarOpcion(subject?: Subjects) {
    if (subject) {
      this.selectedOption = subject;
      this.searchText = 'Aprende: ' + subject.name;
    } else {
      if (this.selectedOption) {
        this.router.navigate(['/src'], {
          queryParams: { seleValue: this.selectedOption.name, seleId: this.selectedOption.id.toString() }
        });
      } else {
        alert('Debe seleccionar una opción');
      }
    }
  }
  

  filterSubjects() {
    this.filteredSubjects = this.listSubjects.filter(subject =>
      subject.name.toLowerCase().includes(this.searchText.toLowerCase())
    );
  }

  
}
