import { AfterViewInit, Component, OnInit } from '@angular/core';
import { faCheck } from '@fortawesome/free-solid-svg-icons';


@Component({
  selector: 'app-cards',
  templateUrl: './cards.component.html',
  styleUrls: ['./cards.component.css']
})
export class CardsComponent implements AfterViewInit {
  faCheck = faCheck;

  ngAfterViewInit() {
    const iconElement = document.getElementById('checkIcon');
    const circleElement = document.getElementById('circleAnima');
    circleElement?.classList.add('icon-circle');
    // Reiniciar la animación
    setTimeout(() => {
      iconElement?.classList.add('text-success');
      circleElement?.classList.remove('icon-circle');
      void circleElement?.offsetWidth;
      iconElement?.classList.add('fa-3x')
      // circleElement?.classList.add('icon-circle'); TODO:crear una clase para sacar el borde del circulo y poner el cirulo de otro color
    }, 3000,);

  }

}
