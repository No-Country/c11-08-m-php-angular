
import { Component,EventEmitter,Renderer2, Input, OnInit} from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { faAngleRight, faUser, faLocationDot,faStar,faAngleLeft, faStar as StarSolid} from '@fortawesome/free-solid-svg-icons';



@Component({
  selector: 'app-perfil-profe',
  templateUrl: './perfil-profe.component.html',

  styleUrls: ['./perfil-profe.component.css']
})

export class PerfilProfeComponent implements OnInit{


isClicked :boolean = false;
faStarSolid = StarSolid;
faAngleRight= faAngleRight;
faAngleLeft = faAngleLeft;
faLocationDot = faLocationDot;
faUser = faUser;
faStar = faStar;


  constructor(private renderer: Renderer2,
    private route: ActivatedRoute,
    private router: Router,
              ) {}
    id: number = 0;
    name:string = '';
    email:string = '';
    total_students: number = 0;
    total_reviews:number = 0;
    city_name: string = '';
    province_name:string = '';
    photo:string = '';
    user_id:number = 0;
    rating = 4.5;
   
  ngOnInit(): void {
      this.route.queryParams.subscribe(params=>{
        this.id = params['id'];
        this.name = params['name']
        this.email = params['email'];
        this.total_students = params['total_students']
        this.total_reviews = params['total_reviews'];
        this.city_name = params['city_name'];
        this.province_name = params['province_name']
        this.photo = params['photo'];
        this.user_id = params['user_id'];
        this.rating = params['average']; 
      })
  }

  contactar() {
    this.router.navigate(['/schedule'], {
      queryParams: {
        id: this.id,
        name: this.name,
        total_students: this.total_students,
        total_reviews: this.total_reviews,
        city_name: this.city_name,
        province_name: this.province_name,
        photo: this.photo,
        user_id: this.user_id,
        average: this.rating
      }
    });
  }
  

    //EVENTO DE CLICK EN TABLA
    cambiarColor(event: MouseEvent) {
      if (this.isClicked) {
        this.renderer.setStyle(event.target, 'color', 'gray');
      } else {
       this.renderer.setStyle(event.target, 'color', '');
     }
     this.isClicked = !this.isClicked;
    }

      mostrarMenu( boolean = false ){
      const menu = document.querySelector("#myMenu") as HTMLElement;
      const button = document.querySelector("button") as HTMLButtonElement;
      const showText = "Mostrar Menú";
      const hideText = "Ocultar Menú";

      menu.style.display = (menu.style.display === "none") ? "block" : "none";
      button.innerHTML = (menu.style.display === "none") ? showText : hideText;
    }

  }


