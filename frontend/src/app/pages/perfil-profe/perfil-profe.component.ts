
import { Component,EventEmitter,Renderer2, Input} from '@angular/core';
import { faAngleRight, faUser, faLocationDot,faStar,faAngleLeft} from '@fortawesome/free-solid-svg-icons';



@Component({
  selector: 'app-perfil-profe',
  templateUrl: './perfil-profe.component.html',

  styleUrls: ['./perfil-profe.component.css']
})

export class PerfilProfeComponent {


isClicked :boolean = false;

faAngleRight= faAngleRight;
faAngleLeft = faAngleLeft;
faLocationDot = faLocationDot;
faUser = faUser;
faStar = faStar;

  constructor(private renderer: Renderer2,

              ) {}

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


